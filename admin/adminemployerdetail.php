<?php ob_start(); ?>
<?php

session_start();

if (!isset($_SESSION['username'])) 
{
	header('Location:index.php');
}
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Employer Detail</title>
<link rel="stylesheet" type="text/css" media="screen" href="css/maincss.css">
</head>

<body>

<div id="centered"><!-- Centered-->
<div align="right" style="color:#045"><a href="admindashboard.php" style="color:#045">Welcome <b style='color:#933'><?php  if (isset($_SESSION['username'])) echo $_SESSION['username']; ?></b></a>  , <a href="logout.php" style="color:#045">Logout</a></div>
	
	<?php include("header.html"); ?>
    
	<div class="content"><!-- Content-->
  	<div style="width:100%"><!--Width-->
        	
      <!--FIRST COLUMN-->
      <div style="float:left; width:30%; background-color:#FFF;">
      	<div style="padding:10px; min-height:680px; background-color:#CCC">
        	<table border="0" cellpadding="0" cellspacing="0">
            <tr>
            	<td><label style="font-size:14px; font-weight:bold; cursor:pointer" onClick="">Users Detail</label></td>
            </tr>
            <tr>
               	<td>
                <ul>
                    <li><a href="adminuserdetail.php" style="font-size:12px; font-weight:bold; cursor:pointer">Job Seeker Detail</a></li>
                    <li><a href="adminemployerdetail.php" style="font-size:12px; font-weight:bold; cursor:pointer" onClick="">Employer Detail</a></li>
		     <li><a href="admincountuser.php" style="font-size:12px; font-weight:bold; cursor:pointer;">Web Visitor Counter</a></li>
                </ul>
               </td>
            </tr>
            </tr>
                  <tr>
            	<td><label style="font-size:14px; font-weight:bold; cursor:pointer" onClick=""><br/>Page Content Change</label></td>
            </tr>
            <tr>
                <td>
					<ul>
						<li><a href="adminhomeedit.php" style="font-size:12px; font-weight:bold; cursor:pointer;">Home Page</a></li>
						<li><a href="admincontactusedit.php" style="font-size:12px; font-weight:bold; cursor:pointer" onClick="">Contact Us</a></li>
						<li><a href="adminaboutusedit.php" style="font-size:12px; font-weight:bold; cursor:pointer" onClick="">About Us</a></li>
					</ul>
                </td>
            </tr> 
            <tr>
              <td>
            	 <li><a href="adminsentmessage.php" style="font-size:12px; font-weight:bold; cursor:pointer">Sent Message</a></li>
                 </td>
            </tr>
            <tr>
           
             <td>
            	 <li><a href="admintrash.php" style="font-size:12px; font-weight:bold; cursor:pointer">Trash</a></li>
                 </td>
            </tr>
              <td>
            	 <li><a href="admininbox.php" style="font-size:12px; font-weight:bold; cursor:pointer">Inbox</a></li>
                 </td>
            </tr>
            <tr>
            </table>
      	</div>
      </div>
      <!--FIRST COLUMN-->
      
      <!--SECOND COLUMN-->
      <div style="float:left; width:70%; background-color:#FFF">
      	<div style="padding:10px">
	      <h2>Employer Details</h2>
             <hr size="1" color="#069"  align="center">
		   <?php
          	include("./Class_Database.php");
			$db= new database();
			//$db->setup("kaushal", "kaushal", "localhost", "jobportaldb");		
		  
			$query="Select * from users where type_user='Employer'";
			$res=$db->send_sql($query);
			
				
			//If Education Detail is available show them in one table.
			if (mysql_num_rows($res)>0)
			{
				echo"<table width='100%' cellpadding='2' cellspacing='0' border='0' style='font-family:Verdana, Geneva, sans-serif; font-size:12px'>";
          		echo"<tr style='background-color:#045; color:#FFF' >";
                echo"<th width='12%'>User Name</th>";
                echo"<th width='15%'>Email</th>";
                echo"<th width='12%'>Registered On</th>";
				echo"<th width='5%'>Action</th>";
				echo"<th width='12%'>Status</th>";
				echo"<th width='3%'>Send Message</th>";                
               	echo"</tr>";
				
				while ($row = mysql_fetch_array($res))
				{
				$type_user=stripslashes($row["type_user"]);		
				$id_user=stripslashes($row["id_user"]);	
				$name_user=stripslashes($row["name_user"]);
				$block_status = stripslashes($row["blockuser"]);
					if ($block_status == 1)
					{
						$aa=0;
					$status = "<font color='#FF0000'>Blocked</font>";
					}
					else
					{
						$aa=1;
					$status = "<font color='#006600'>Active</font>";
					}
				$email_user=stripslashes($row["email_user"]);
				$createdon=stripslashes($row["createdon"]);
				$updatedon=stripslashes($row["updatedon"]);
				
				$_SESSION['type_user']=$type_user;
						
				echo "\t\t\t\t<td width='12%'align='center'>$name_user</td>\n";
				echo "\t\t\t\t<td width='15%'align='center'>$email_user</td>\n";
				echo "\t\t\t\t<td width='12%'align='center'>$createdon</td>\n";
				echo "\t\t\t<form action='adminblockunblockemployer.php?id=$id_user' method='post'>\n";
					echo "<input type='hidden' name='block_status' value='";
					if(isset($aa))
					{
						echo "$aa' />";
					}
					
					echo "\t\t\t\t<td width='3%' align='center'><input type='submit' name='deletemessage' style='border:none;  cursor:pointer;  background:none;";   
					if ($block_status == 1)
					{ 
					echo "background-image:url(Images/ok.png); width:24px; height:24px' value='' /></td>\n";
					}
					else
					{
					echo "background-image:url(Images/no.png); width:24px; height:24px' value='' /></td>\n";
					}
					echo "\t\t\t</form>\n";
				echo "\t\t\t\t<td width='12%'align='center'>$status</td>\n";
				echo "\t\t\t\t<td width='3%' align='center'><a href='adminsendmessage.php?id=$id_user'><img src='Images/sendmsg.png' alt='D' /></a></td>\n";
				echo "\t\t\t</tr>\n";
 				}
			}
			// If Education Detail is not filled by the job seeker.
			else
			{
				echo "<div align='center'>";
				echo "<a href='admindashboard.php'>Not Available</a>";
				echo "</div>";
			}
		  
          ?>
          </table>
          
      	</div>
      </div>
        <!--SECOND COLUMN-->
        
    </div> <!--Width-->   
    </div><!-- Content-->
        
</div><!-- Centered-->





</body>
</html>