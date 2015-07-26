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
<title >View Profile - Job Seeker</title>
<link rel="stylesheet" type="text/css" media="screen" href="css/maincss.css">
</head>

<body>

<div id="centered"><!-- Centered-->
<div align="right" style="color:#045"><a href="jsdashboard.php" style="color:#045">Welcome <b style='color:#933'><?php  if (isset($_SESSION['username'])) echo $_SESSION['username']; ?></b></a>  , <a href="logout.php" style="color:#045">Logout</a></div>
	
	<?php include("header.html"); 
	include("jsjobsearchbar.php");?>
    
	<div class="content"><!-- Content-->
  	<div style="width:100%"><!--Width-->
        	
      <!--FIRST COLUMN-->
<div style="float:left; width:30%; background-color:#FFF;">
      	<div style="padding:10px; min-height:680px; background-color:#CCC">
        	<table border="0" cellpadding="0" cellspacing="0">
            <tr>
            	<td><label style="font-size:14px; font-weight:bold; cursor:pointer; float:left" onClick="">Profile</label></td>
            </tr>
            <tr>
                <td>
                <ul style="text-align:left">
                    <li style="margin:0px"><a href="jspersonalinfo.php" style="font-size:12px; font-weight:bold; cursor:pointer">Personal</a></li>
                    <li><a href="jseducation.php" style="font-size:12px; font-weight:bold; cursor:pointer" onClick="">Education</a></li>
                    <li><a href="jscertificate.php" style="font-size:12px; font-weight:bold; cursor:pointer" onClick="">Certification</a></li>
                   <li><a href="jsexperience.php" style="font-size:12px; font-weight:bold; cursor:pointer" onClick="">Experience</a></li>
                            <li><a href="jsskill.php" style="font-size:12px; font-weight:bold; cursor:pointer" onClick="">Professional Detail</a></li>
                </ul>
                </td>
            </tr>
            
            <tr>
            	<td><label style="font-size:14px; font-weight:bold; cursor:pointer" onClick="">Resumes/Cover Letters</label></td>
            </tr>
            <tr>
            	<td>
                <ul  style="text-align:left">
                    <li style="margin:0px;"><a href="jsresume.php" style="font-size:12px; font-weight:bold; cursor:pointer" >Upload Resumes</a></li>
                    <li><a href="jscoverletter.php" style="font-size:12px; font-weight:bold; cursor:pointer" onClick="">Upload Cover Letters</a></li>
                    <li><a href="jscreateresume.php" style="font-size:12px; font-weight:bold; cursor:pointer" onClick="">Create Resume</a></li>
                     <li><a href="jscreatecoverletter.php" style="font-size:12px; font-weight:bold; cursor:pointer" onClick="">Create Cover Letters</a></li>
                </ul>
            
            	</td>
            </tr>
            <tr>
            	<td><label style="font-size:14px; font-weight:bold; cursor:pointer; float:left">Find Jobs</label></td>
            </tr>
            <tr>
            	<td>
                <ul style="text-align:left">
                <li style="margin:0px;"><a href="jsadvancedsearch.php" style="font-size:12px; font-weight:bold; cursor:pointer;" onClick="">Advanced Search</a></li>
                
                </ul>
            
            	</td>
            </tr>
            <tr>
            	<td><label style="font-size:14px; font-weight:bold; cursor:pointer; float:left"><a href="jsviewprofile.php">View Profile</a></label></td>
            </tr>
            <tr>
            	<td><label style="font-size:14px; font-weight:bold; cursor:pointer; float:left">
                <a href="jsviewsavedsearch.php"><br/>View Saved Search</a></label></td>
            </tr>
             <tr>
            	<td><label style="font-size:14px; font-weight:bold; cursor:pointer; float:left">
                <a href="jsinbox.php"><br/>Inbox</a></label></td>
            </tr>
             <tr>
            	<td><label style="font-size:14px; font-weight:bold; cursor:pointer; float:left">
                <a href="jssentmessage.php"><br/>Sent Message</a></label></td>
            </tr>
             <tr>
            	<td><label style="font-size:14px; font-weight:bold; cursor:pointer; float:left">
                <a href="jstrash.php"><br/>Trash</a></label></td>
            </tr>
             
            </table>
      	</div>
      </div>
	  <!--FIRST COLUMN-->
      
      <!--SECOND COLUMN-->
      
      
      
       <!--Experience Details-->
      
          
           <div style="float:left; width:70%; background-color:#FFF">
      	<div style="padding:10px">
	     
           <hr size="1" color="#069"  align="center">
	         <h2>Message Details</h2>
             <hr size="1" color="#069"  align="center">
             <br/>
		   		   <?php
		   include("./Class_Database.php");
$db= new database();
//$db->setup("kaushal", "kaushal", "localhost", "jobportaldb");	
$username=$_SESSION['username'];
$query="select * from users where name_user='$username'";
//echo $query;
$res=$db->send_sql($query);	
if (mysql_num_rows($res)>0)
			{
				while ($row = mysql_fetch_array($res))
				{
				$to= stripslashes($row["email_user"]);
				//echo $from;
				}
			}
			
			if(isset($res))
			{
				unset($res);
			}
			
			//$username = $_SESSION['username'];

			
			$query="Select * from admin_message where to_user='$to' and is_delete=0";
			//echo $query;
			$res=$db->send_sql($query);	
			
			//If Experience Detail is available show them in one table.
			if (mysql_num_rows($res)>0)
			{
				echo "<table width='100%' cellpadding='2' cellspacing='0' border='0' style='font-family:Verdana, Geneva, sans-serif; font-size:12px'>";
					echo"<tr style='background-color:#045; color:#FFF' >";
					echo "<th width='4%'>Read</th>";
					echo "<th width='4%'>Delete</th>";
					echo"<th width='5%'>Action</th>";
					echo"<th width='5%'>Status</th>";
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
					$block_messagestatus = stripslashes($row["blockmessage"]);
					if ($block_messagestatus == 1)
					{
						$aa=0;
					$status = "<font color='#FF0000'>Blocked</font>";
					}
					else
					{
						$aa=1;
					$status = "<font color='#006600'>Active</font>";
					}
					
					
					echo "\t\t\t<form action='jsviewmessageinbox.php?id=$id_message' method='post'>\n";
					echo "\t\t\t<tr style='background-color:#CCC'>\n";
					echo "\t\t\t\t<td width='4%'><input type='submit' name='edit' style='border:none;  cursor:pointer;  background:none; background-image:url(Images/message.png); width:26px; height:26px' value='' /></td>\n";
					echo "\t\t\t</form>\n";
					echo "\t\t\t<form action='jsmessagedeleteinbox.php?id=$id_message' method='post'>\n";
					echo "<input type='hidden' name='inbox' value='inbox' />";
					echo "\t\t\t\t<td width='4%' align='center'><input type='submit' name='deletemessage' style='border:none;  cursor:pointer;  background:none; background-image:url(Images/delete.png); width:16px; height:16px' value='' /></td>\n";
					echo "\t\t\t</form>\n";
					echo "\t\t\t<form action='jsmessageblockunblockusers.php?id=$id_message' method='post'>\n";
					echo "<input type='hidden' name='block_messagestatus' value='";
					if(isset($aa))
					{
						echo "$aa' />";
					}
					
					echo "\t\t\t\t<td width='3%' align='center'><input type='submit' name='deletemessage' style='border:none;  cursor:pointer;  background:none;";   
					if ($block_messagestatus == 1)
					{ 
					echo "background-image:url(Images/no.png); width:24px; height:24px' value='' /></td>\n";
					}
					else
					{
					echo "background-image:url(Images/ok.png); width:24px; height:24px' value='' /></td>\n";
					}
					echo "\t\t\t</form>\n";
					echo "\t\t\t\t<td width='12%'align='center'>$status</td>\n";
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