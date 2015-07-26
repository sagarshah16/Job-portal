<?php ob_start(); ?>
<?php

session_start();

if ((!isset($_SESSION['username'])) && (!isset($_SESSION['userid'])))
{
	header('Location:index.php');
}
if(isset($_GET['j_id']) && $_GET['j_id']!="")
{
	$id_job=$_GET['j_id'];	
}
else
{
	//header("location:jsjobsearch.php");
}
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Job Seeker - Job Search</title>
<link rel="stylesheet" type="text/css" media="screen" href="css/maincss.css">
<script type="text/javascript">
function ApplyForJob(id_user,id_job)
{
	var path_resume=""; 
	if(document.getElementById("resume"))
		path_resume=document.getElementById("resume").value;
	var path_cover="";
	if(document.getElementById("coverletter"))
		path_cover=document.getElementById("coverletter").value;

	//alert(id_job);
	//alert(id_user + " " + id_job + " " + path_resume + " " + path_cover);
	if (window.XMLHttpRequest)
	  {// code for IE7+, Firefox, Chrome, Opera, Safari
	  xmlhttp=new XMLHttpRequest();
	  }
	else
	  {// code for IE6, IE5
	  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	  }
	xmlhttp.onreadystatechange=function()
	  {
	  if (xmlhttp.readyState==4 && xmlhttp.status==200)
		{
			var response = xmlhttp.responseText;
			document.getElementById("button").innerHTML="";
			document.getElementById("button").innerHTML="<?php echo "<a class='button' href='". $_SERVER['HTTP_REFERER'] ."'>Back</a>"; ?>";
			document.getElementById("message").innerHTML= "<b style='color:blue'>" + response + "</b>";
		}
	  }
	xmlhttp.open("GET","jsapplyforjob.php?user_id="+id_user+"&job_id="+id_job+"&path_resume="+path_resume+"&path_cover="+path_cover,true);
	xmlhttp.send();
}
</script>
</head>

<body>

<div id="centered"><!-- Centered-->
<div align="right" style="color:#045"><a href="jsdashboard.php" style="color:#045">Welcome <b style='color:#933'><?php  if (isset($_SESSION['username'])) echo $_SESSION['username']; ?></b></a>  , <a href="logout.php" style="color:#045">Logout</a></div>
	<?php include("header.html"); 
	include("jsjobsearchbar.php");
	?>
    
    
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
                    <li style="margin:0px"><a href="jspersonalinfo.php" style="font-size:12px; font-weight:bold; cursor:pointer" id="li">Personal</a></li>
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
      <div style="float:left; width:70%; background-color:#FFF">
      	<div style="padding:15px">
	      
          <!-- Job Description -->
          <?php
		  	$id_user=$_SESSION['userid'];
			include ("./Class_Database.php");
			$db= new database();
			//$db->setup("root", "", "localhost", "jobportaldb");
			
			//Check if this user has alreay applied for this job or not!
			$query="Select * from js_jobapplicationdetails where id_job=$id_job and id_user=$id_user";
			$res=$db->send_sql($query);
			//echo $query;
			if(mysql_num_rows($res)>0)
			{	
				$status_application="Applied";
			}
			
			unset($res);
			$query="Select ej.* from emp_personalinfo ep,emp_jobdetails ej where ep.id_emp=ej.id_emp and ej.id_job=$id_job";
			$res=$db->send_sql($query);
			if(mysql_num_rows($res)>0)
			{
				echo "<table style='font-size:12px; background-color:#EFEFEF' cellspacing='5px' width=100%>";
				while($row=mysql_fetch_array($res))
				{
					if(stripslashes($row['title'])!="") $job_title=stripslashes($row['title']); else $job_title="";
					if(stripslashes($row['jobfunction'])!="") $job_function=stripslashes($row['jobfunction']); else $job_function="";
					if(stripslashes($row['industry'])!="") $job_industry=stripslashes($row['industry']); else $job_industry="";
					if(stripslashes($row['postiontype'])!="") $positiontype=stripslashes($row['postiontype']); else $positiontype="";
					if(stripslashes($row['jobdescription'])!="") $jobdescription=stripslashes($row['jobdescription']); else $jobdescription="";
					if(stripslashes($row['qualificationdesc'])!="") $qualificationdesc=stripslashes($row['qualificationdesc']); else $qualificationdesc="";
					if(stripslashes($row['SalaryRange'])!="") $salaryrange=stripslashes($row['SalaryRange']); else $salaryrange="";
					if(stripslashes($row['city'])!="") $city=stripslashes($row['city']); else $city="";
					if(stripslashes($row['state'])!="") $state=stripslashes($row['state']); else $state="";
					if(stripslashes($row['zip'])!="") $zip=stripslashes($row['zip']); else $zip="";
					if(stripslashes($row['dcprofiledesciprion'])!="") $dcprofiledesc=stripslashes($row['dcprofiledesciprion']); else $dcprofiledesc="";
					if(stripslashes($row['dcqualificationdesc'])!="") $dcqualificationdesc=stripslashes($row['dcqualificationdesc']); else $dcqualificationdesc="";
					if(stripslashes($row['experiencerequirement'])!="") $experiencerequirement=stripslashes($row['experiencerequirement']); else $experiencerequirement="";
					
					if($city!="")
						$location= $city;
					else
						$location="";
					
					if($state!="")
					{
						if($location=="")
							$location=$state;
						else
							$location .= ", " . $state;	
					}
					
					if($zip!="")
					{
						if($location=="")
							$location=$state;
						else
							$location.= " " . $zip;	
					}
										
					echo "<tr><th align='right' style='width:150px'>Title:</th><td>" . $job_title . "</td></tr>";
					echo "<tr><th align='right'>Job Function:</th><td> " . $job_function . "</td></tr>";
					echo "<tr><th align='right'>Industry:</th><td> " . $job_industry . "</td></tr>";
					echo "<tr><th align='right'>Position Type:</th><td> " . $positiontype . "</td></tr>";	
					echo "<tr><th align='right' style='vertical-align:top'>Job Description:</th><td> " . $jobdescription . "</td></tr>";	
					echo "<tr><th align='right' style='vertical-align:top'>Qualification Desc:</th><td> " . $qualificationdesc . "</td></tr>";	
					echo "<tr><th align='right'>Salary:</th><td> " . $salaryrange . "</td></tr>";
					echo "<tr><th align='right'>Job Location:</th><td> " . $location . "</td></tr>";	
					echo "<tr><th align='right'>Desired Profile:</th><td> " . $dcprofiledesc . "</td></tr>";
					echo "<tr><th align='right'>Desired Qualification:</th><td> " . $dcqualificationdesc . "</td></tr>";	
					echo "<tr><th align='right'>Minimum Exp. Reqd:</th><td> " . $experiencerequirement . " Years</td></tr>";	
				}
				echo "</table>";
			}
		  ?>
          <!-- Job Description -->
		  
		  <!-- Resume, Cover Letter Selection -->
		  <?php
		  	echo "<table style='background-color:#CCC' width=100% border='0'>";
				echo "<tr>";
			$query="Select * from js_files where id_user=$id_user and (type_file='R' Or type_file='C')";
			$res=$db->send_sql($query);
			if(mysql_num_rows($res)>0)
			{
				while($row=mysql_fetch_array($res))
				{
					if (stripslashes($row['type_file'])=="R")
					{
						$resume[]=stripslashes($row['path_file']);
						$resumetitle[]=stripslashes($row['title_file']);
					}
					else if (stripslashes($row['type_file'])=="C")
					{
						$coverletter[]=stripslashes($row['path_file']);
						$coverlettertitle[]=stripslashes($row['title_file']);
					}
				}
				
				
				echo "<td width='280px'>";
				if (!(isset($status_application) && $status_application=="Applied"))
				{
				
					if(isset($resume)){
					echo "<select name='resume' id='resume'>";
					echo "<option value='Select Resume'>Select Resume</option>";
					
					for($i=0;$i<count($resume);$i++)
					{
						echo "<option value='" . $resume[$i] . "'>" . $resumetitle[$i] . "</option>";
					}
					
					echo "</select>";
					}
					
					if(isset($coverletter)){
					echo "<select name='coverletter' id='coverletter'>";
					echo "<option value='Select Cover Letter'>Select Cover Letter</option>";
					for($i=0;$i<count($coverletter);$i++)
					{
						echo "<option value='" . $coverletter[$i] . "'>" . $coverlettertitle[$i] . "</option>";
					}
					
					echo "</select>";
					}
				}
				echo "</td>";
				
			}
			echo "<td id='message' style='font-size:12px' align='left'></td>";
			echo "<td align='right' id='button' style='height:45px'>";
			
			if (!(isset($status_application) && $status_application=="Applied"))
			{
				echo "<input type='button' class='button' name='apply' value='Apply' onClick='ApplyForJob(" . $id_user . "," . $id_job . ");' />";
			}
			else
			{
				echo "<b style='color:green; font-size:12px' >Already Applied!                    </b>";	
			}
			
			echo "<input type='button' class='button' onclick='javascript:history.back();' value='Back'/>";
			echo "</td>";
			echo "</tr>";
			echo "</table>";
		  ?>
          <!-- Resume, Cover Letter Selection -->
          
      	</div>
      </div>
        <!--SECOND COLUMN-->
            
    </div> <!--Width-->   
    </div><!-- Content-->
        
</div><!-- Centered-->
</body>
</html>
<?php
function superExplode ($str, $sep)
{
	$i = 0;
	$arr[$i++] = strtok($str, $sep);
	while ($token = strtok($sep))
	$arr[$i++] = $token;
	return $arr;
}
?>