<?php ob_start(); ?>
<?php

session_start();

if (!isset($_SESSION['username'])) 
	{
		header('Location:index.php');
	}
	//echo $_POST['sent'];
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Admin View Message</title>
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
            <tr>
             <td>
            	 <li><a href="admininbox.php" style="font-size:12px; font-weight:bold; cursor:pointer">Inbox</a></li>
                 </td>
            </tr>
            
            </table>
      	</div>
      </div>
      <!--FIRST COLUMN-->
      
      <!--SECOND COLUMN-->
           <div style="float:left; width:70%; background-color:#FFF">
      	<div style="padding:10px">
	       <hr size="1" color="#069"  align="center">
	         <h2>Message Details</h2>
             <hr size="1" color="#069"  align="center">
             <br/>
		   <?php
		    include ("./Class_Database.php");
          	$db= new database();
			//$db->setup("kaushal", "kaushal", "localhost", "jobportaldb");		
		  	$id_message=$_GET["id"];
			//echo $id_message;
			$query="Select * from admin_message where id_message= $id_message";
			//echo $query;
			$res=$db->send_sql($query);
			
			//If Experience Detail is available show them in one table.
			if (mysql_num_rows($res)>0)
			{
				while ($row = mysql_fetch_array($res))
				{
					$from_user=stripslashes($row["from_user"]);
					$to_user=stripslashes($row["to_user"]);
					$subject_user=stripslashes($row["subject_user"]);
					$senton=stripslashes($row["senton"]);
					$id_message=stripslashes($row["id_message"]);
					$body_user=stripslashes($row["body_user"]);
					//echo $id_user;
				}
			}
			
				unset($res);
				$query="Select * from users where email_user='$from_user'";
					//echo $query;
					$res=$db->send_sql($query);
					
					if (mysql_num_rows($res)>0)
					{
					while ($row = mysql_fetch_array($res))
					{
					$id_user=stripslashes($row["id_user"]);
					}
					}
					else
					{
						
					}
					echo"<table width='100%' cellpadding='2' cellspacing='0' border='0' style='font-family:Verdana, Geneva, sans-serif; font-size:12px'>";					
				echo "\t\t\t<form action='adminviewmessageinbox.php' method='post'>\n";
				echo "<table width='70%' cellpadding='3' cellspacing='0' border='0' style='font-family:Verdana, Geneva, sans-serif; font-size:12px' >";
				echo "\t\t\t\t<tr align='left'><th width='32%' style='background-color:#045; color:#FFF'>From:</th><td width='50%' style='background-color:#CCC'>$from_user</td></tr>\n";
				echo "\t\t\t\t<tr align='left' ><th width='25%'  style='background-color:#045; color:#FFF'>To:</th><td width='25%' style='background-color:#CCC'>$to_user</td></tr>\n";
				echo "\t\t\t\t<tr align='left'><th width='25%'  style='background-color:#045; color:#FFF'>Received On:</th><td width='25%' style='background-color:#CCC'>$senton</td></tr>\n";
				echo "\t\t\t\t<tr align='left'><th width='25%'  style='background-color:#045; color:#FFF'>Subject:</th><td width='25%' style='background-color:#CCC'>$subject_user</td></tr>\n";
				echo "\t\t\t\t<tr align='left'><th width='25%'  style='background-color:#045; color:#FFF'>Message:</th><td width='25%' style='background-color:#CCC'><br/>$body_user</td></tr>\n";
				echo "\t\t\t\t<tr align='left'><th width='25%'  style='background-color:#045; color:#FFF'></th><td width='25%' style='background-color:#CCC'>&nbsp;</td></tr>\n";
				echo "\t\t\t\t<tr align='left'><th width='25%'  style='background-color:#045; color:#FFF'></th>"; 
				if(isset($_POST['sent']) && ($_POST['sent']== "sent"))
				{
					echo "<td width='25%' style='background-color:#CCC; '><a onClick='javascript:history.back();' class='button' style='border:none; cursor:pointer; padding:5px;  float:right; '>Back</a> </td> ";
				}
				else
				{
				echo "<td width='25%' style='background-color:#CCC; '><a href='adminsendmessage.php?id=$id_user' class='button' style='border:none; cursor:pointer; padding:5px;  float:right; '>Reply</a> <a class='button' style='border:none; cursor:pointer; padding:5px;  float:right;' onClick='javascript:history.back();'>Back</a></td> ";
				
				}
				echo " </tr>";
				echo "\t\t\t</form>\n";
				echo "</table>";
				
          ?>
      	</div>
      </div>
        <!--SECOND COLUMN-->
    </div> <!--Width-->   
    </div><!-- Content-->
</div><!-- Centered-->
</body>
</html>