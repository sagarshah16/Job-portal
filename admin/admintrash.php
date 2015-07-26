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
<title>Trash</title>
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
      
       <!--Inbox-->
            <div style="float:left; width:70%; background-color:#FFF">
      	<div style="padding:10px">
	     
           <hr size="1" color="#069"  align="center">
	         <h2>Trash Message</h2>
             <hr size="1" color="#069"  align="center">
             <br/>
		   <?php
		   include("./Class_Database.php");
$db= new database();
//$db->setup("kaushal", "kaushal", "localhost", "jobportaldb");	
$user=$_SESSION['username'];
$query="select * from admin where username='$user'";
//echo $query;
$res=$db->send_sql($query);	
if (mysql_num_rows($res)>0)
			{
				while ($row = mysql_fetch_array($res))
				{
				$from=stripslashes($row["email"]);
				//echo $from;
				}
			}
			
			if(isset($res))
			{
				unset($res);
			}
			
			//$username = $_SESSION['username'];

			
			$query="Select * from admin_message where (from_user='$from'and is_deletesent=1) or (to_user='$from' and is_delete=1)";
			//echo $query;
			$res=$db->send_sql($query);	
			
			//If Experience Detail is available show them in one table.
			if (mysql_num_rows($res)>0)
			{
				echo "<table width='100%' cellpadding='2' cellspacing='0' border='0' style='font-family:Verdana, Geneva, sans-serif; font-size:12px'>";
					echo"<tr style='background-color:#045; color:#FFF' >";
					echo "<th width='3%'></th>";
					echo"<th width='25%'>From</th>";
					echo"<th width='25%'>To</th>";
					echo"<th width='27%'>Subject</th>";
					echo"<th width='15%'>Date</th>";
					echo"</tr>";
				
				while ($row = mysql_fetch_array($res))
				{
					$to_user=stripslashes($row["to_user"]);
					$from_user=stripslashes($row["from_user"]);
					$subject_user=stripslashes($row["subject_user"]);
					$senton=stripslashes($row["senton"]);
					$id_message=stripslashes($row["id_message"]);
					
					echo "\t\t\t<form action='adminviewmessageinbox.php?id=$id_message' method='post'>\n";
					echo "<input type='hidden' name='id_message' value='$id_message' />";
					echo "<input type='hidden' name='sent' value='sent' />";
					echo "\t\t\t<tr style='background-color:#CCC'>\n";
					echo "\t\t\t\t<td width='3%'><input type='submit' name='viewtrashmessage' style='border:none;  cursor:pointer;  background:none; background-image:url(Images/message.png); width:26px; height:26px' value='' /></td>\n";
					echo "\t\t\t\t<td width='25%' align='center'>$from_user</td>\n";
					echo"<th width='25%'>$to_user</th>";
					echo "\t\t\t\t<td width='27%' align='center'>$subject_user</td>\n";
					echo "\t\t\t\t<td width='15%' align='center'>$senton</td>\n";
					echo "\t\t\t</tr>\n";
					echo "\t\t\t</form>\n";
					}
				echo"</table>";
			}
			// If Experience Detail is not filled by the job seeker.
			else
			{
				echo "<div align='center'>";
				echo "<font color='#FF0000'>No Message</font> ";
				echo "</div>";
			}
		  
          ?>
                  
		<br />
        <hr size="1" color="#069"  align="center">
		  
      	</div>
      </div>
      
        <!--SECOND COLUMN-->
        
    </div> <!--Width-->   
    </div><!-- Content-->
        
</div><!-- Centered-->




</body>
</html>