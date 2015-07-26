<?php ob_start(); ?>
<?php

session_start();

if (!isset($_SESSION['username'])) 
	{
		header('Location:index.php?profile=EMP');
	}
//include("Combo_Values.php");

$id=$_SESSION['userid'];


?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Employer - Job Applications</title>
<link rel="stylesheet" type="text/css" media="screen" href="css/maincss.css">

<script type="text/javascript">
</script>


</head>

<body>

<div id="centered"><!-- Centered-->
<div align="right" style="color:#045"><a href="" style="color:#045">Welcome <b style='color:#933'><?php  if (isset($_SESSION['username'])) echo $_SESSION['username']; ?></b></a>  , <a href="logout.php" style="color:#045">Logout</a></div>
	
	<?php include("header.html"); 
	include("empjobsearchbar.php");?>
    
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
                    
		     <li><a href="emppersonalinfo.php" style="font-size:12px; font-weight:bold;  cursor:pointer" onClick="">Company Information</a></li>
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
                <a href="emptrash.php"><br/>Trash</a></label></td>
            </tr>
            </table>
      	</div>
      </div>
      <!--FIRST COLUMN-->
      
      <!--SECOND COLUMN-->
      <div style="float:left; width:70%; background-color:#FFF">
      	<div style="padding:10px">
        	
            <hr size="1" color="#069"  align="center">
	        <h2>Job Applications</h2>
            <hr size="1" color="#069"  align="center">
             
            <form name="jobapplications" action="empjobapplications.php" method="post">
            <select name="jobs" id="jobs">
            <option value="">Select Job</option>
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
				$query="Select * from emp_jobdetails where id_user=$id_user";
				if(isset($res))
				unset($res);
				else
				$res="";
				$res=$db->send_sql($query);
				if (mysql_num_rows($res)>0)
				{
					if(isset($_POST['jobs']) && $_POST['jobs'])
							$job=$_POST['jobs'];
					else if(isset($_SESSION['jobs']) && $_SESSION['jobs']!="")
							$job=$_SESSION['jobs'];
					else
							$job="";
					
					while ($row = mysql_fetch_array($res))
					{
						if($job==stripslashes($row['id_job']))
							echo "<option value='" . stripslashes($row['id_job']) . "' selected='selected'>" . stripslashes($row['title']) . "</option>";	
						else
							echo "<option value='" . stripslashes($row['id_job']) . "'>" . stripslashes($row['title']) . "</option>";	
					}
				}
			
			?>
            </select> 
            <input type="submit" name="submit" value="Get JobSeekers" /> 
            </form> 
            
            <?php
				if((isset($_POST['jobs']) && $_POST['jobs']!="")|| (isset($_SESSION['jobs']) && $_SESSION['jobs']!=""))
				{
					if(isset($_POST['jobs']))
						$id_job=$_POST['jobs'];
					else if(isset($_SESSION['jobs']))
						$id_job=$_SESSION['jobs'];
										
					unset($_SESSION['jobs']);
					unset($_SESSION['id_application']);
					
					$query="Select * from js_jobapplicationdetails jad,js_personalinfo jp where jad.id_user=jp.id_user and id_job=$id_job and application_status<>2";
					
					unset($res);
					$res=$db->send_sql($query);
					
					echo "<table width='100%' cellpadding='2' cellspacing='0' border='0' style='font-family:Verdana, Geneva, sans-serif; font-size:12px'>\n";
					if (mysql_num_rows($res)>0)
					{
						echo "<tr style='background-color:#045; color:#FFF' >\n";
						echo "<th></th>\n";
						echo "<th></th>\n";
						echo "<th >Name</th>\n";
						echo "<th >Phone</th>\n";
						echo "<th >E-mail</th>\n";
						echo "<th >Resume</th>\n";
						echo "<th>Status</th>\n";
						echo "<th width='20px'></th>\n";
						echo "</tr>\n";
						
						while ($row = mysql_fetch_array($res))
						{
							$name=stripslashes($row['lname']) . " " . stripslashes($row['fname']);
							$phone=stripslashes($row['primarycontact_js']);
							$email=stripslashes($row['email']);
							$resume= stripslashes($row['path_resume']);
							$application_status=stripslashes($row['application_status']);
							$id_job_det=stripslashes($row['id_jobapplication']);
							$id_js= stripslashes($row['id_js']);
						
							echo "<tr>\n";
							echo "<td width='3%'><a href='changeapplicationstatus.php?id_job=$id_job&id=$id_job_det&status=1'><img src='Images/review.png' alt='D'/></a></td>\n";
							echo "<td width='3%'><a href='changeapplicationstatus.php?id_job=$id_job&id=$id_job_det&status=2'><img src='Images/delete.png' alt='D'/></a></td>\n";
							
							//Show Pending Requests in BOLD.
							if($application_status==0)
							{
								echo "<td  align='center'><b><a href='empjobseekerdetails.php?id_js=" . $id_js . "'>" . $name . "</a></b></td>\n";
								echo "<td  align='center'><b>" . $phone . "</b></td>\n";
								echo "<td  align='center'><b>" . $email . "</b></td>\n";
								echo "<td  align='center'><a href='download.php?file=" . $resume . "'>Resume</a><br /></td>\n";
							}
							else
							{
								echo "<td  align='center'><a href='empjobseekerdetails.php?id_js=" . $id_js . "'>" . $name . "</a></td>\n";
								echo "<td  align='center'>" . $phone . "</td>\n";
								echo "<td  align='center'>" . $email . "</td>\n";
								echo "<td  align='center'><a href='download.php?file=" . $resume . "'>Resume</a><br /></td>\n";
							}
							$_SESSION['to_user']=$from_user;
							$_SESSION['from_user']=$email;
							if($application_status==0)
								echo "<td align='center'><img src='images/pending.gif' wisth='20px' height='20px' alt='Pending'/></td>";
							else if($application_status==1)
								echo "<td align='center'><img src='images/review.png' alt='Reviewed'/></td>";
							else if($application_status==2)
								echo "<td></td>";
								
							echo "<td align='center'><a href='empsendmessage.php'><img src='Images/sendmsg.png' alt='Send Message' /></a></td>";
							echo "</tr>\n";
							
						}
					}
					else
					{
						echo "<tr><td aling='center'>No Job Applications found !</td></tr>";
					}
					echo "</table>\n";
					
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