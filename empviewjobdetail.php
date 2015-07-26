<?php ob_start(); ?>
<?php

session_start();

if (!isset($_SESSION['username'])) 
{
	header('Location:index.php?profile=EMP');
}
//include("Combo_Values.php");
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Employer - Job Post Detail</title>
<link rel="stylesheet" type="text/css" media="screen" href="css/maincss.css">
</head>

<body>

<div id="centered"><!-- Centered-->
<div align="right" style="color:#045"><a href="empdashboard.php" style="color:#045">Welcome <b style='color:#933'><?php  if (isset($_SESSION['username'])) echo $_SESSION['username']; ?></b></a>  , <a href="logout.php" style="color:#045">Logout</a></div>
	
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
		    		 <li><a href="empjobdetail.php" style="font-size:12px; font-weight:bold; color:#000;cursor:pointer" onClick="">Post New Job</a></li>
	
		
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
      	<div style="padding:10px">
         <hr size="1" color="#069"  align="center">
	      <h2>Job Details</h2>
            <hr size="1" color="#069"  align="center">
		   <?php
          	include("./Class_Database.php");
			$db= new database();
			//$db->setup("kaushal", "kaushal", "localhost", "jobportaldb");	
		  	$id_user=$_SESSION["userid"];
			$query="Select * from emp_jobdetails where id_user=$id_user";
			$res=$db->send_sql($query);
			
			//If Education Detail is available show them in one table.
			if (mysql_num_rows($res)>0)
			{
				echo"<table width='100%' cellpadding='2' cellspacing='0' border='0' style='font-family:Verdana, Geneva, sans-serif; font-size:12px'>";
          		echo"<tr style='background-color:#045; color:#FFF' >";
                echo"<th width='3%'></th>";
                echo"<th width='3%'></th>";
                echo"<th width='12%'>Job Title</th>";
                echo"<th width='15%'>Job Function</th>";
                echo"<th width='12%'>Industry</th>";
                echo"<th width='15%'>Job Posting Date</th>";
               	echo"</tr>";
				while ($row = mysql_fetch_array($res))
				{
						
					
				$id_job=stripslashes($row["id_job"]);	
				$title=stripslashes($row["title"]);
				$jobfunction=stripslashes($row["jobfunction"]);
				$industry=stripslashes($row["industry"]);
				$pday=stripslashes($row["pday"]);
				$pmonth=stripslashes($row["pmonth"]);
				$pyear=stripslashes($row["pyear"]);
					if ($pmonth!="" && $pday!="" && $pyear!="")
						$postedin=$pmonth. "-" .$pday . "-" . $pyear;
					else
						$postedin="";
			
				
				
				echo "\t\t\t<form action='empjobdetail.php' method='post'>\n";
				echo "<input type='hidden' name='id_job' value='$id_job' />";
				echo "\t\t\t<tr style='background-color:#CCC'>\n";
				echo "\t\t\t\t<td width='3%'><input type='submit' name='edit' style='border:none; cursor:pointer; margin:0px; background:none; background-image:url(Images/edit.png); width:16px; height:16px' value='' /></td>\n";
				echo "\t\t\t\t<td width='3%'><a href='empdeletejobdetail.php?id=$id_job&profile=Emp_Jobdetail'><img src='Images/delete.png' alt='D' /></a></td>\n";
				echo "\t\t\t\t<td width='12%'align='center'>$title</td>\n";
				echo "\t\t\t\t<td width='15%'align='center'>$jobfunction</td>\n";
				echo "\t\t\t\t<td width='12%'align='center'>$industry</td>\n";
				echo "\t\t\t\t<td width='15%' align='center'>$postedin</td>\n";
				echo "\t\t\t</tr>\n";
 				echo "\t\t\t</form>\n";
				}
			}
			// If Education Detail is not filled by the job seeker.
			else
			{
				echo "<div align='center'>";
				echo "<a href='empjobdetail.php'>Add Certification Details</a>";
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