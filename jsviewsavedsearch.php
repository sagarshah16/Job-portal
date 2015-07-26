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
<title >View Saved Search - Job Seeker</title>
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
            	<td><label style="font-size:14px; font-weight:bold; color:#333; cursor:pointer; float:left">
                <a href="jsviewsavedsearch.php"><br/>View Saved Search</a></label></td>
            </tr>
              <tr>
            	<td><label style="font-size:14px; font-weight:bold; cursor:pointer; float:left; color:#333">
                <a href="jsjobapplicationstatus.php"><br/>Application Status</a></label></td>
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
      
       <!--Personal Details-->
         <div style="float:left; width:70%; background-color:#FFF">
      	<div style="padding:10px">
	     
                               
		<br />
        <hr size="1" color="#069"  align="center">
		<h2>Saved Search</h2>
        <hr size="1" color="#069"  align="center">   
		   <?php
		   include("./Class_Database.php");
          	$db= new database();
			//$db->setup("kaushal", "kaushal", "localhost", "jobportaldb");	
		  	$id_user=$_SESSION["userid"];
			$query="Select id_search,name_search from  js_savesearchdetails where id_user=$id_user";
			$res=$db->send_sql($query);
			
			//If Professional Detail Detail is available show them in one table.
			if (mysql_num_rows($res)>0)
			{
				echo"<table width='500px' cellpadding='2' cellspacing='0' border='0' style='font-family:Verdana, Geneva, sans-serif; font-size:12px'>";
					echo"<tr style='background-color:#045; color:#FFF' >";
					echo"<th width='16px'></th>";
					echo"<th width='16px'></th>";
					echo"<th>Search Name</th>";					
					echo"</tr>";
				
				while ($row = mysql_fetch_array($res))
				{
					$search_id=stripslashes($row["id_search"]);
					$search_name=stripslashes($row["name_search"]);
					echo "\t\t\t<form action='jsadvancedsearch.php' method='post'>\n";
					echo "<input type='hidden' name='search_id' value='$search_id' />";
					echo "\t\t\t<tr style='background-color:#CCC'>\n";
					
					echo "\t\t\t\t<td><input type='submit' name='edit' style='border:none; cursor:pointer; margin:0px; background:none; background-image:url(Images/edit.png); width:16px; height:16px' value='' /></td>\n";
					
					echo "\t\t\t\t<td><a href='jsdelete.php?id=$search_id&profile=savedsearch'><img src='Images/delete.png' alt='D' /></a></td>\n";
					echo "\t\t\t\t<td align='center'>$search_name</td>\n";
					
					echo "\t\t\t</tr>\n";
					echo "\t\t\t</form>\n";
					
				}
				
				echo "</table>";
			}
			
          ?>
         
		<br>
      	</div>
      </div>
      
        <!--SECOND COLUMN-->
        
    </div> <!--Width-->   
    </div><!-- Content-->
        
</div><!-- Centered-->




</body>
</html>