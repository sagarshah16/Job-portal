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
      	<div style="padding:10px; min-height:1150px; background-color:#CCC">
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
            	<td><label style="font-size:14px; font-weight:bold; cursor:pointer; color:#333; float:left"><a href="jsviewprofile.php">View Profile</a></label></td>
            </tr>
            <tr>
            	<td><label style="font-size:14px; font-weight:bold; cursor:pointer; float:left">
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
	     
           <hr size="1" color="#069"  align="center">
	         <h2>Personal Information</h2>
             <hr size="1" color="#069"  align="center">
             <br/>
           <?php
          	include("./Class_Database.php");
			$db= new database();
			//$db->setup("kaushal", "kaushal", "localhost", "jobportaldb");	
		  	$id_user=$_SESSION["userid"];
			
			$query="Select * from js_personalinfo where id_user=$id_user"; 
			$res=$db->send_sql($query);
			
			//If Personal Detail is available show them in one table.
			if (mysql_num_rows($res)>0)
			{
				while ($row = mysql_fetch_array($res))
				{
					$firstname=stripslashes($row['fname']);
					$lastname=stripslashes($row['lname']); 
					$address1=stripslashes($row['address1']);
					$address2=stripslashes($row['address2']);
					$city=stripslashes($row['city']);
					$state=stripslashes($row['state']);
					$zip=stripslashes($row['Zip']);
					$country=stripslashes($row['country']);
					$email=stripslashes($row['email']);
					$mphone=stripslashes($row['primarycontact_js']);
					$contactp=stripslashes($row['contactpreference_js']);
					$workauthorization=stripslashes($row['workauthorization']);
					$year=stripslashes($row['birthyear_js']);
					$month=stripslashes($row['birthmonth_js']);
					$day=stripslashes($row['birthday_js']);
					$gender=stripslashes($row['gender_js']);
					$ethnicity=stripslashes($row['ethnicity_js']);
					$Blood_group=stripslashes($row['bloodgroup_js']);
										
					echo "\t\t\t<form action='jspersonalinfo.php' method='post'>\n";
					echo "<table width='70%' cellpadding='3' cellspacing='0' border='0' style='font-family:Verdana, Geneva, sans-serif; font-size:12px' >";
					echo "\t\t\t\t<tr align='left'><th width='32%' style='background-color:#045; color:#FFF'>First Name:</th><td width='50%' style='background-color:#CCC'>$firstname</td></tr>\n";
					echo "\t\t\t\t<tr align='left' ><th width='25%'  style='background-color:#045; color:#FFF'>Last Name:</th><td width='25%' style='background-color:#CCC'>$lastname</td></tr>\n";
					echo "\t\t\t\t<tr align='left'><th width='25%'  style='background-color:#045; color:#FFF'>Address1:</th><td width='25%' style='background-color:#CCC'>$address1</td></tr>\n";
					echo "\t\t\t\t<tr align='left'><th width='25%'  style='background-color:#045; color:#FFF'>Address2:</th><td width='25%' style='background-color:#CCC'>$address2</td></tr>\n";
					echo "\t\t\t\t<tr align='left'><th width='25%'  style='background-color:#045; color:#FFF'>City:</th><td width='25%' style='background-color:#CCC'>$city</td></tr>\n";
					echo "\t\t\t\t<tr align='left'><th width='25%'  style='background-color:#045; color:#FFF'>State:</th><td width='25%' style='background-color:#CCC'>$state</td></tr>\n";
					echo "\t\t\t\t<tr align='left'><th width='25%'  style='background-color:#045; color:#FFF'>Zipcode:</th><td width='25%' style='background-color:#CCC'>$zip</td></tr>\n";
					echo "\t\t\t\t<tr align='left'><th width='25%'  style='background-color:#045; color:#FFF'>Country:</th><td width='25%' style='background-color:#CCC'>$country</td></tr>\n";
					echo "\t\t\t\t<tr align='left'><th width='25%'  style='background-color:#045; color:#FFF'>Email Address:</th><td width='25%' style='background-color:#CCC'>$email</td></tr>\n";
					echo "\t\t\t\t<tr align='left'><th width='25%'  style='background-color:#045; color:#FFF'>Mobile Phone:</th><td width='25%' style='background-color:#CCC'>$mphone</td></tr>\n";
					echo "\t\t\t\t<tr align='left'><th width='25%'  style='background-color:#045; color:#FFF'>Contact Preference:</th><td width='25%' style='background-color:#CCC'>$contactp</td></tr>\n";
					echo "\t\t\t\t<tr align='left'><th width='25%'  style='background-color:#045; color:#FFF'>Work Authorization:</th><td width='25%' style='background-color:#CCC'>$workauthorization</td></tr>\n";
					echo "\t\t\t\t<tr align='left'><th width='25%'  style='background-color:#045; color:#FFF'>Birthdate:</th><td width='25%' style='background-color:#CCC'> $month"; if($month != "") echo "-"; echo " $day";  if($day != "") echo "-"; echo "$year"; echo "</td></tr>\n";
					echo "\t\t\t\t<tr align='left'><th width='25%'  style='background-color:#045; color:#FFF'>Gender:</th><td width='25%' style='background-color:#CCC'>$gender</td></tr>\n";
					echo "\t\t\t\t<tr align='left'><th width='25%'  style='background-color:#045; color:#FFF'>Ethnicity:</th><td width='25%' style='background-color:#CCC'>$ethnicity</td></tr>\n";
					echo "\t\t\t\t<tr align='left'><th width='25%'  style='background-color:#045; color:#FFF'>Blood Group:</th><td width='25%' style='background-color:#CCC'>$Blood_group</td></tr>\n";
					echo "\t\t\t\t<tr align='left' style='background-color:#AAA; color:#FFF'><td width='25%' style='background-color:#AAA; color:#FFF'></td><td width='25%' align='right'><a href='jspersonalinfo.php' style='text-decoration:none; color:#FFF ' >Edit</a><input type='submit' name='edit' style='border:none; cursor:pointer; margin:0px; background:none;  background-image:url(Images/edit.png); width:16px; height:16px' value=''></input></td></tr>\n";
					echo "\t\t\t</form>\n";
					echo "</table>";
				}
			}

			
			// If Personal Detail is not filled by the job seeker.
			else
			{
				
			}
		  
          ?>
      
        <!--Education Details-->
      <br />
        
           <hr size="1" color="#069"  align="center">
	         <h2>Education Details</h2>
             
		  <?php
          	$db= new database();
			//$db->setup("kaushal", "kaushal", "localhost", "jobportaldb");	
		  	$id_user=$_SESSION["userid"];
			$query="Select * from js_edu where id_user=$id_user";
			$res=$db->send_sql($query);
			
			//If Education Detail is available show them in one table.
			if (mysql_num_rows($res)>0)
			{
				echo "<table width='100%' cellpadding='2' cellspacing='0' border='0' style='font-family:Verdana, Geneva, sans-serif; font-size:12px'>";
					echo "<tr style='background-color:#045; color:#FFF' >";
					echo "<th width='3%'></th>";
					echo "<th width='3%'></th>";
					echo "<th width='25%'>Degree</th>";
					echo "<th width='27%'>Field</th>"; 
					echo "<th width='10%'>GPA</th>"; 
					echo "<th width='15%'>Completed In</th>";
					echo "<th width='27%'>Institute</th>";
					echo "</tr>";
					
				while ($row = mysql_fetch_array($res))
				{
					$edu_id=stripslashes($row["edu_id"]);
					$degree=stripslashes($row["edu_degreename"]);
					$field=stripslashes($row["edu_studyname"]);
					$edu_gpa=stripslashes($row["edu_gpa"]);
					$endmonth=stripslashes($row["edu_enddate"]);
					$endyear=stripslashes($row["edu_endyear"]);
					if ($endmonth!="" && $endyear!="")
						$completedin=$endmonth . "-" . $endyear;
					else
						$completedin="";
					$institute=stripslashes($row["edu_institutename"]);
					
					
					
					echo "\t\t\t<form action='jseducation.php' method='post'>\n";
					echo "<input type='hidden' name='edu_id' value='$edu_id' />";
					echo "\t\t\t<tr style='background-color:#CCC'>\n";
					echo "\t\t\t\t<td width='3%'><input type='submit' name='edit' style='border:none; cursor:pointer; margin:0px; background:none; background-image:url(Images/edit.png); width:16px; height:16px' value='' /></td>\n";
					echo "\t\t\t\t<td width='3%'><a href='jsdelete.php?id=$edu_id&profile=educational'><img src='Images/delete.png' alt='D' /></a></td>\n";
					echo "\t\t\t\t<td width='25%' align='center'>$degree</td>\n";
					echo "\t\t\t\t<td width='27%' align='center'>$field</td>\n";
					echo "\t\t\t\t<td width='10%' align='center'>$edu_gpa</td>\n";
					echo "\t\t\t\t<td width='15%' align='center'>$completedin</td>\n";
					echo "\t\t\t\t<td width='27%' align='center'>$institute</td>\n";
					echo "\t\t\t</tr>\n";
 					echo "\t\t\t</form>\n";
					
				}
				echo "\t\t\t</table>";
			}
			// If Education Detail is not filled by the job seeker.
			else
			{
				echo "<div align='center'>";
				echo "<a href='jseducation.php'>Add Education Details</a>";
				echo "</div>";
			}
		  
          ?>
                   
		<br />
        <hr size="1" color="#069"  align="center">
               
           
       <!--Certification Details-->
      
           <h2>Certification Details</h2>
           
		   <?php
          	$db= new database();
			//$db->setup("kaushal", "kaushal", "localhost", "jobportaldb");	
		  	$id_user=$_SESSION["userid"];
			$query="Select * from js_certification where id_user=$id_user";
			$res=$db->send_sql($query);
			
			//If Certification Detail is available show them in one table.
			if (mysql_num_rows($res)>0)
			{
				echo "<table width='100%' cellpadding='2' cellspacing='0' border='0' style='font-family:Verdana, Geneva, sans-serif; font-size:12px'>";
					echo "<tr style='background-color:#045; color:#FFF' >";
					echo "<th width='3%'></th>";
					echo "<th width='3%'></th>";
					echo "<th width='25%'>Certification Name</th>";
					echo "<th width='27%'>Date of Receipt</th>";
					echo "<th width='15%'>Institution Name</th>";
					echo "</tr>";
				
				while ($row = mysql_fetch_array($res))
				{
					$certi_id=stripslashes($row["certi_id"]);
					$ctf_name=stripslashes($row["ctf_name"]);
					$ctf_month=stripslashes($row["ctf_month"]);
					$ctf_year=stripslashes($row["ctf_year"]);
					if ($ctf_month!="" && $ctf_year!="")
						$completedin=$ctf_month . "-" . $ctf_year;
					else
						$completedin="";
					$ctf_institutename=stripslashes($row["ctf_institutename"]);
					
					
					echo "\t\t\t<form action='jscertificate.php' method='post'>\n";
					echo "<input type='hidden' name='certi_id' value='$certi_id' />";
					echo "\t\t\t<tr style='background-color:#CCC'>\n";
					echo "\t\t\t\t<td width='3%'><input type='submit' name='edit' style='border:none; cursor:pointer; margin:0px; background:none; background-image:url(Images/edit.png); width:16px; height:16px' value='' /></td>\n";
					echo "\t\t\t\t<td width='3%'><a href='jsdelete.php?id=$certi_id&profile=certification'><img src='Images/delete.png' alt='D' /></a></td>\n";
					echo "\t\t\t\t<td width='25%' align='center'>$ctf_name</td>\n";
					echo "\t\t\t\t<td width='27%' align='center'>$completedin</td>\n";
					echo "\t\t\t\t<td width='15%' align='center'>$ctf_institutename</td>\n";
					echo "\t\t\t</tr>\n";
					echo "\t\t\t</form>\n";
					
					
				}
				
				echo "</table>";
			}
			// If Certification Detail is not filled by the job seeker.
			else
			{
				echo "<div align='center'>";
				echo "<a href='jscertificate.php'>Add Certification Details</a>";
				echo "</div>";
			}
		  
          ?>
                    
		<br />
		<hr size="1" color="#069"  align="center">
      
       <!--Experience Details-->
      
           <h2>Experience Details</h2>
           
		   <?php
          	$db= new database();
			//$db->setup("kaushal", "kaushal", "localhost", "jobportaldb");	
		  	$id_user=$_SESSION["userid"];
			$query="Select * from js_experience where id_user=$id_user";
			$res=$db->send_sql($query);
			
			//If Experience Detail is available show them in one table.
			if (mysql_num_rows($res)>0)
			{
				echo"<table width='100%' cellpadding='2' cellspacing='0' border='0' style='font-family:Verdana, Geneva, sans-serif; font-size:12px'>";
					echo"<tr style='background-color:#045; color:#FFF' >";
					echo"<th width='3%'></th>";
					echo"<th width='3%'></th>";
					echo"<th width='25%'>Job Title</th>";
					echo"<th width='27%'>Company Name</th>";
					echo"<th width='15%'>Location</th>";
					echo"</tr>";
				
				while ($row = mysql_fetch_array($res))
				{
					$exp_id=stripslashes($row["exp_id"]);
					$exp_title=stripslashes($row["exp_title"]);
					$exp_name=stripslashes($row["exp_name"]);
					$exp_location=stripslashes($row["exp_location"]);
												
					
					echo "\t\t\t<form action='jsexperience.php' method='post'>\n";
					echo "<input type='hidden' name='exp_id' value='$exp_id' />";
					echo "\t\t\t<tr style='background-color:#CCC'>\n";
					echo "\t\t\t\t<td width='3%'><input type='submit' name='edit' style='border:none; cursor:pointer; margin:0px; background:none; background-image:url(Images/edit.png); width:16px; height:16px' value='' /></td>\n";
					echo "\t\t\t\t<td width='3%'><a href='jsdelete.php?id=$exp_id&profile=experience'><img src='Images/delete.png' alt='D' /></a></td>\n";
					echo "\t\t\t\t<td width='25%' align='center'>$exp_title</td>\n";
					echo "\t\t\t\t<td width='27%' align='center'>$exp_name</td>\n";
					echo "\t\t\t\t<td width='15%' align='center'>$exp_location</td>\n";
					echo "\t\t\t</tr>\n";
					echo "\t\t\t</form>\n";
				
					
				}
				
					echo"</table>";
			}
			// If Experience Detail is not filled by the job seeker.
			else
			{
				echo "<div align='center'>";
				echo "<a href='jsexperience.php'>Add Experience Details</a>";
				echo "</div>";
			}
		  
          ?>
                    
		<br />
        <hr size="1" color="#069"  align="center">
		  
      <!--Professional Detail Details-->
      
           <h2>Professional Detail Details</h2>
           
		   <?php
          	$db= new database();
			//$db->setup("kaushal", "kaushal", "localhost", "jobportaldb");	
		  	$id_user=$_SESSION["userid"];
			$query="Select * from js_skill where id_user=$id_user";
			$res=$db->send_sql($query);
			
			//If Professional Detail Detail is available show them in one table.
			if (mysql_num_rows($res)>0)
			{
				echo"<table width='100%' cellpadding='2' cellspacing='0' border='0' style='font-family:Verdana, Geneva, sans-serif; font-size:12px'>";
					echo"<tr style='background-color:#045; color:#FFF' >";
					echo"<th width='3%'></th>";
					echo"<th width='3%'></th>";
					echo"<th width='25%'>Skill</th>";
					echo"<th width='15%'>Total Experience</th>";					
					echo"</tr>";
				
				while ($row = mysql_fetch_array($res))
				{
					$skill_id=stripslashes($row["skill_id"]);
					$skill_name=stripslashes($row["skill_name"]);
					$skill_year=stripslashes($row["skill_year"]);
					if ($skill_year!="")
						$experience=$skill_year . "\tYear";
					
						
						
					
					echo "\t\t\t<form action='jsskill.php' method='post'>\n";
					echo "<input type='hidden' name='skill_id' value='$skill_id' />";
					echo "\t\t\t<tr style='background-color:#CCC'>\n";
					echo "\t\t\t\t<td width='3%'><input type='submit' name='edit' style='border:none; cursor:pointer; margin:0px; background:none; background-image:url(Images/edit.png); width:16px; height:16px' value='' /></td>\n";
					echo "\t\t\t\t<td width='3%'><a href='jsdelete.php?id=$skill_id&profile=skill'><img src='Images/delete.png' alt='D' /></a></td>\n";
					echo "\t\t\t\t<td width='25%' align='center'>$skill_name</td>\n";
					echo "\t\t\t\t<td width='15%' align='center'>$experience</td>\n";
					echo "\t\t\t</tr>\n";
					echo "\t\t\t</form>\n";
					
					
				}
				
				echo "</table>";
			}
			// If Professional Detail Detail is not filled by the job seeker.
			else
			{
				echo "<div align='center'>";
				echo "<a href='jsskill.php'>Add Professional Detail Details</a>";
				echo "</div>";
			}
		  
          ?>
         
		<br>
		<hr size="1" color="#069"  align="center">
        <h2>Resumes</h2>
          <?php
		  	$query="Select * from js_files where id_user=$id_user and path_file like '%Resume%' ";
			$res=$db->send_sql($query);
			
			//If Resumes Detail is available show them in one table.
			if (mysql_num_rows($res)>0)
			{
				while ($row = mysql_fetch_array($res))
				{
					$id_file=stripslashes($row["id_file"]);
					echo "<table width='100%' cellpadding='2' cellspacing='0' border='0' style='font-family:Verdana, Geneva, sans-serif; font-size:12px'>";
					echo "<tr style='background-color:#CCC' >";
					echo "<td width=17px>";
					echo "<a href='jsdelete.php?id=$id_file&profile=resume'><img src='Images/delete.png'></a>";
					echo "</td>";
					echo "<td>";
					echo "<a href='download.php?file=" . stripslashes($row["path_file"]) . "'>" . stripslashes($row["title_file"]) . "</a><br />";
					echo "</td>";
					echo "</table>";
					
				}
			}
		  ?>
          <br />
          <hr size="1" color="#069"  align="center">
          
          <h2>Cover Letters</h2>
          <?php
		  	$query="Select * from js_files where id_user=$id_user and path_file like '%Cover%' ";
			$res=$db->send_sql($query);
			
			//If Cover Letters Detail is available show them in one table.
			if (mysql_num_rows($res)>0)
			{
				while ($row = mysql_fetch_array($res))
				{
					$id_file=stripslashes($row["id_file"]);
					echo "<table width='100%' cellpadding='2' cellspacing='0' border='0' style='font-family:Verdana, Geneva, sans-serif; font-size:12px'>";
					echo "<tr style='background-color:#CCC' >";
					echo "<td width=17px>";
					echo "<a href='jsdelete.php?id=$id_file&profile=coverletter'><img src='Images/delete.png'></a>";
					echo "</td>";
					echo "<td>";
					echo "<a href='download.php?file=" . stripslashes($row["path_file"]) . "'> " .  stripslashes($row["title_file"]) . "</a><br />";
					echo "</td>";
					echo "</table>";
					
				}
			}
		  ?>
          
      	</div>
      </div>
      
        <!--SECOND COLUMN-->
        
    </div> <!--Width-->   
    </div><!-- Content-->
        
</div><!-- Centered-->




</body>
</html>