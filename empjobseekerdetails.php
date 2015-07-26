<?php ob_start(); ?>
<?php

session_start();

if ((!isset($_SESSION['username'])) && (!isset($_SESSION['userid'])))
{
	header('Location:index.php?profile=EMP');
}
$userid=$_SESSION['userid'];
if(isset($_GET['id_js']) && $_GET['id_js']!="")
{
	$id_jobseeker=$_GET['id_js'];	
}
else
{
	//header("location:jsjobsearch.php");
}
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Employer - Job Seeker Search</title>
<link rel="stylesheet" type="text/css" media="screen" href="css/maincss.css">
</head>

<body>

<div id="centered"><!-- Centered-->
<div align="right" style="color:#045"><a href="jsdashboard.php" style="color:#045">Welcome <b style='color:#933'><?php  if (isset($_SESSION['username'])) echo $_SESSION['username']; ?></b></a>  , <a href="logout.php" style="color:#045">Logout</a></div>
	<?php include("header.html"); 
	include("empjobsearchbar.php");
	?>
    
    
   <div class="content"><!-- Content-->
  	<div style="width:100%"><!--Width-->
        	
       <!--FIRST COLUMN-->
      <div style="float:left; width:30%; background-color:#FFF;">
      	<div style="padding:10px; min-height:680px; background-color:#CCC">
        	<table border="0" cellpadding="0" cellspacing="0">
            <tr>
            	<td><label style="font-size:14px; font-weight:bold; cursor:pointer" onClick="">Employer Profile</label></td>
            </tr>
            <tr>
               	<td>
                <ul>
                    
		     <li><a href="emppersonalinfo.php" style="font-size:12px; font-weight:bold; cursor:pointer" onClick="">Company Information</a></li>
		    		 <li><a href="empjobdetail.php" style="font-size:12px; font-weight:bold; cursor:pointer" onClick="">Post New Job</a></li>
	
		
                </ul>
               </td>
	</tr>
				 <tr>
            	<td><label style="font-size:14px; font-weight:bold; cursor:pointer; color:#000;float:left">Find Jobs</label></td>
            </tr>
            <tr>
            	<td>
                <ul style="text-align:left">
                <li style="margin:0px;"><a href="empadvancedsearch.php" style="font-size:12px; font-weight:bold; cursor:pointer;" onClick="">Advanced Search</a></li>
                </ul>
              	</td>
            </tr>
            <tr>
           		<td><label style="font-size:13px; font-weight:bold; cursor:pointer; color:#000;"><a href="empviewprofile.php">View Company Information</a></label></td>
      			 </tr>
				<tr>
            	<td><label style="font-size:13px; font-weight:bold; cursor:pointer"><a href="empviewjobdetail.php"></br>View Posted Job</a></label></td>
                </tr>
          		 
            <tr>
           		
      			 </tr>
                 <tr>
           		<td><label style="font-size:13px; font-weight:bold; cursor:pointer; color:#000;"><a href="empjobapplications.php"></br>View Job Applications</a></label></td>
      			 </tr>
            
           <tr>
            	<td><label style="font-size:14px; font-weight:bold; cursor:pointer; float:left">
                <a href="empinbox.php"><br/>Inbox</a></label></td>
            </tr>
             <tr>
            	<td><label style="font-size:14px; font-weight:bold; cursor:pointer; float:left">
                <a href="empsentmessage.php"><br/>Sent Message</a></label></td>
            </tr>
             <tr>
            	<td><label style="font-size:14px; font-weight:bold; cursor:pointer; float:left">
                <a href="emptrash.php"><br/>Trash</a></label></td>
            </tr>
            </table>
      	</div>
      </div>
      <!--FIRST COLUMN-->
      
      <!--SECOND COLUMN-->
      <div style="float:left; width:70%; background-color:#FFF">
      	<div style="padding:15px">
	      
          <!-- Job Seeker Description -->
          <?php
		  	$id_user=$_SESSION['userid'];
			include ("./Class_Database.php");
			$db= new database();
			//$db->setup("root", "", "localhost", "jobportaldb");
			$query="Select * from emp_personalinfo where id_user=$userid";
			$res=$db->send_sql($query);
			if(mysql_num_rows($res)>0)
			{
				while($row=mysql_fetch_array($res))
				{
					if(stripslashes($row['email'])!="") $empemail=stripslashes($row['email']); else $empemail="";
				}
			}
			
			unset($res);
			
			$query="Select * from js_personalinfo jp where jp.id_js=$id_jobseeker";
			$res=$db->send_sql($query);
			
			if(mysql_num_rows($res)>0)
			{
				echo "<table style='font-size:12px; background-color:#EFEFEF' cellspacing='5px' width=100%>";
				while($row=mysql_fetch_array($res))
				{
					if(stripslashes($row['fname'])!="") $fname=stripslashes($row['fname']); else $fname="";
					if(stripslashes($row['lname'])!="") $lname=stripslashes($row['lname']); else $lname="";
					if(stripslashes($row['primarycontact_js'])!="") $primarycontact_js=stripslashes($row['primarycontact_js']); else $primarycontact_js="";
					if(stripslashes($row['email'])!="") $email=stripslashes($row['email']); else $email="";
					if(stripslashes($row['lname'])!="") $lname=stripslashes($row['lname']); else $lname="";
					if(stripslashes($row['city'])!="") $city=stripslashes($row['city']); else $city="";
					if(stripslashes($row['state'])!="") $state=stripslashes($row['state']); else $state="";
					if(stripslashes($row['Zip'])!="") $zip=stripslashes($row['Zip']); else $zip="";
				}
										
				echo "<tr><th align='right' style='width:150px'>Name:</th><td>" . $fname."\t". $lname . "</td></tr>";
				echo "<tr><th align='right' style='width:150px'>Phone Number:</th><td>" . $primarycontact_js."</td></tr>";
				echo "<tr><th align='right' style='width:150px'>Email Address:</th><td>" . $email . "</td></tr>";
				echo "<tr><th align='right' style='width:150px'>Current Location:</th><td>" . $city.",\t". $state.",\t". $zip. "</td></tr>";
				echo "<tr><th align='right' valign:'top'style='width:150px'>Education Detail: </th></tr>";
				
				
				unset($res);
				$query="Select * from js_edu jsedu where jsedu.id_js=$id_jobseeker";
				$res=$db->send_sql($query);
				
				while($row=mysql_fetch_array($res))
				{
					if(stripslashes($row['edu_degreename'])!="") $edu_degreename=stripslashes($row['edu_degreename']); else $edu_degreename="";
					if(stripslashes($row['edu_studyname'])!="") $edu_studyname=stripslashes($row['edu_studyname']); else $edu_studyname="";
					if(stripslashes($row['edu_institutename'])!="") $edu_institutename=stripslashes($row['edu_institutename']); else $edu_institutename="";
					if(stripslashes($row['edu_city'])!="") $edu_city=stripslashes($row['edu_city']); else $edu_city="";
					if(stripslashes($row['edu_state'])!="") $edu_state=stripslashes($row['edu_state']); else $edu_state="";
					if(stripslashes($row['edu_startdate'])!="") $edu_startdate=stripslashes($row['edu_startdate']); else $edu_startdate="";
					if(stripslashes($row['edu_startyear'])!="") $edu_startyear=stripslashes($row['edu_startyear']); else $edu_startyear="";
					if(stripslashes($row['edu_enddate'])!="") $edu_enddate=stripslashes($row['edu_enddate']); else $edu_enddate="";
					if(stripslashes($row['edu_endyear'])!="") $edu_endyear=stripslashes($row['edu_endyear']); else $edu_endyear="";
					if(stripslashes($row['edu_gpa'])!="") $edu_gpa=stripslashes($row['edu_gpa']); else $edu_gpa="";
					if(stripslashes($row['edu_summary'])!="") $edu_summary=stripslashes($row['edu_summary']); else $edu_summary="";
					echo"<tr><th></th><td><b>". $edu_institutename."</b>, ".$edu_city.", ".$edu_state."</td></tr><tr><th></th><td>".$edu_degreename." in ".$edu_studyname." - ".$edu_startdate." ".$edu_startyear." to ".$edu_enddate." ".$edu_endyear.", <b>GPA:<b>".$edu_gpa."\n</td></tr><tr><th></th><td>".$edu_summary."</td></tr>";
					
				}
				
				echo "<tr><th align='right' valign:'top'style='width:150px'>Certification Detail: </th></tr>";
				
				unset($res);
				$query="Select * from js_certification jscer where jscer.id_js=$id_jobseeker";
				$res=$db->send_sql($query);
				
				while($row=mysql_fetch_array($res))
				{
					if(stripslashes($row['ctf_name'])!="") $ctf_name=stripslashes($row['ctf_name']); else $ctf_name="";
					if(stripslashes($row['ctf_month'])!="") $ctf_month=stripslashes($row['ctf_month']); else $ctf_month="";
					if(stripslashes($row['ctf_year'])!="") $ctf_year=stripslashes($row['ctf_year']); else $ctf_year="";
					if(stripslashes($row['ctf_institutename'])!="") $ctf_institutename=stripslashes($row['ctf_institutename']); else $ctf_institutename="";
					if(stripslashes($row['ctf_summary'])!="") $ctf_summary=stripslashes($row['ctf_summary']); else $ctf_summary="";
					
					echo"<tr><th></th><td><b>". $ctf_name."</b>, ".$ctf_institutename." - ".$ctf_month." to ".$ctf_year."\n</td></tr><tr><th></th><td>".$ctf_summary."</td></tr>";
					
				}
				
				echo "<tr><th align='right' valign:'top'style='width:150px'>Experience Detail: </th></tr>";
				
				
				unset($res);
				$query="Select * from js_experience jsexp where jsexp.id_js=$id_jobseeker";
				$res=$db->send_sql($query);
				
				while($row=mysql_fetch_array($res))
				{
					if(stripslashes($row['exp_title'])!="") $exp_title=stripslashes($row['exp_title']); else $exp_title="";
					if(stripslashes($row['exp_name'])!="") $exp_name=stripslashes($row['exp_name']); else $exp_name="";
					if(stripslashes($row['exp_industry'])!="") $exp_industry=stripslashes($row['exp_industry']); else $exp_industry="";
					if(stripslashes($row['exp_city'])!="") $exp_city=stripslashes($row['exp_city']); else $exp_city="";
					if(stripslashes($row['exp_location'])!="") $exp_location=stripslashes($row['exp_location']); else $exp_location="";
					if(stripslashes($row['exp_zipcode'])!="") $exp_zipcode=stripslashes($row['exp_zipcode']); else $exp_zipcode="";
					if(stripslashes($row['exp_country'])!="") $exp_country=stripslashes($row['exp_country']); else $exp_country="";
					if(stripslashes($row['exp_startmonth'])!="") $exp_startmonth=stripslashes($row['exp_startmonth']); else $exp_startmonth="";
					if(stripslashes($row['exp_startyear'])!="") $exp_startyear=stripslashes($row['exp_startyear']); else $exp_startyear="";
					if(stripslashes($row['exp_endmonth'])!="") $exp_endmonth=stripslashes($row['exp_endmonth']); else $exp_endmonth="";
					if(stripslashes($row['exp_endyear'])!="") $exp_endyear=stripslashes($row['exp_endyear']); else $exp_endyear="";
					if(stripslashes($row['exp_description'])!="") $exp_description=stripslashes($row['exp_description']); else $exp_description="";
					echo"<tr><th></th><td><b>". $exp_title."</b>, ".$exp_industry.", ".$exp_industry." - ".$exp_startmonth." ".$exp_startyear." to ".$exp_endmonth." ".$exp_endyear."</td></tr><tr><th></th><td>".$exp_description."</td></tr>";
					
				}
				
				echo "</table>";
			
			}
		  ?>
          <!-- Job Description -->
		   <?php
		   $_SESSION['to_user']=$empemail;
			$_SESSION['from_user']=$email;
		  	echo "<table style='background-color:#CCC' width=100% border='0'>";
				echo "<tr>";
				echo "<td align='right' id='button' style='height:45px'>";
				echo "\t\t<form action='empsendmessage.php' method='post' name='sendmessage'>\n";
				
				echo "\t\t\t<input type='submit' name='sendmessage' value='Send Message' class='button' />\n";
               	echo "<input type='button' class='button' onclick='javascript:history.back();' value='Back' />";
				 echo "\t\t</form>";
			echo "</td>";
			echo "</tr>";
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