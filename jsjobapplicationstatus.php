<?php ob_start(); ?>
<?php
date_default_timezone_set('America/New_York');
session_start();

if (!isset($_SESSION['username'])) 
	{
		header('Location:index.php');
	}
	
	$id=$_SESSION['userid'];
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Jobseeker Dashboard</title>
<link rel="stylesheet" type="text/css" media="screen" href="css/maincss.css">
</head>

<body>

<div id="centered"><!-- Centered-->
<div align="right" style="color:#045"><a href="" style="color:#045">Welcome <b style='color:#933'><?php  if (isset($_SESSION['username'])) echo $_SESSION['username']; ?></b></a>  , <a href="logout.php" style="color:#045">Logout</a></div>
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
      	<div style="padding:10px">
	         <?php
			 
				include("./Class_Database.php");
				$db= new database();
				//$db->setup("kaushal", "kaushal", "localhost", "jobportaldb");	
				$query="Select * from users where id_user=$id";
				$res=$db->send_sql($query);	
				if (mysql_num_rows($res)>0)
				{
				while ($row = mysql_fetch_array($res))
				{
				$from_user=stripslashes($row["email_user"]);
				}
				}
				
				
				$id_user=$_SESSION["userid"];
				$query="Select * from js_jobapplicationdetails jj,emp_jobdetails ej,emp_personalinfo ep where 
				jj.id_job=ej.id_job and ej.id_emp=ep.id_emp and jj.id_user=$id_user"; 
				//echo $query;
				$res=$db->send_sql($query);
				
				echo "<table width='100%' cellpadding='2' cellspacing='0' border='0' style='font-family:Verdana, Geneva, sans-serif; font-size:12px'>\n";
				if (mysql_num_rows($res)>0)
				{
					echo "<tr style='background-color:#045; color:#FFF' >\n";
					echo "<th></th>\n";
					echo "<th width='20%'>Job Title</th>\n";
					echo "<th width='20%'>Employer</th>\n";
					echo "<th width='20%'>Job Location</th>\n";
					echo "<th width='20%'>Appl. Date</th>\n";
					echo "<th></th>\n";
					echo "</tr>\n";
					
					while ($row = mysql_fetch_array($res))
					{
			 			$job_title=stripslashes($row['title']);
						$to_user=stripslashes($row['email']);
						$employer=stripslashes($row['companyname']);
						$location="";
						$_SESSION['to_user']=$from_user;
						$_SESSION['from_user']=$to_user;
						if (stripslashes($row['city'])!="")
							$location .=stripslashes($row['city']);
						if (stripslashes($row['state'])!="")
							$location .=", " . stripslashes($row['state']);
						
						if (stripslashes($row['application_status'])==0)
							$application_status="Pending";
						else if (stripslashes($row['application_status'])==1)
							$application_status="Reviewed";
						else if (stripslashes($row['application_status'])==2)
							$application_status="Rejected";
							
						$application_date=date("m/d/y",strtotime(stripslashes($row['application_date'])));
						
						echo "<tr>\n";
						if ($application_status=="Pending")
						{
							echo "<td width='10px' align='center'><img src='images/pending.gif' width='20px' height='20px' alt='Pending' /></td>\n";
						}
						else if($application_status=="Reviewed")
							echo "<td width='10px' align='center'><img src='images/review.png' width='20px' height='20px' alt='Reviewed' /></td>\n";
						else if($application_status=="Rejected")
							echo "<td width='10px' align='center'><img src='images/delete.png' width='20px' height='20px' alt='Rejected' /></td>\n";
							
						echo "<td width='20%' align='center'>" . $job_title . "</td>\n";
						echo "<td width='20%' align='center'>" . $employer . "</td>\n";
						echo "<td width='20%' align='center'>" . $location . "</td>\n";
						echo "<td width='20%' align='center'>" . $application_date . "</td>\n";
						
						echo "<td><a href='jssendmessage.php'><img src='Images/sendmsg.png' alt='Send Message' /></a></td>";
						echo "</tr>\n";
						
					}
				}
				else
				{
					echo "<tr>\n";
					echo "<td align='center'><b style='color:red'>You Have not applied for any jobs yet!</b></td>";
					echo "</tr>\n";	
				}
				echo "</table>" . "<br>\n";
			 
			 ?>
      	</div>
      </div>
        <!--SECOND COLUMN-->
            
    </div> <!--Width-->   
    </div><!-- Content-->
        
</div><!-- Centered-->





</body>
</html>