<?php ob_start(); ?>
<?php ob_start(); ?>
<?php

session_start();

if (!isset($_SESSION['username'])) 
	{
		header('Location:index.php?profile=EMP');
	}
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Employer - Job Details</title>
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
	      <?php
		  if(isset($_POST['title_c'])) $title=addslashes(strip_tags($_POST['title_c'])); else $title="";
		  if($title=="")
		  {
				header("location:empjobdetail.php?e=1");
		  }
		  
		   if(isset($_POST['jobfunction_c'])) $jobfunction=addslashes(strip_tags($_POST['jobfunction_c'])); else $jobfunction="Select Functional Area";
		  if($jobfunction=="")
		  {
				header("location:empjobdetail.php?e=2");
		  }
		  
		   if(isset($_POST['industry_c'])) $industry=addslashes(strip_tags($_POST['industry_c'])); else $industry="";
		  if($industry=="Select Industry")
		  {
				header("location:empjobdetail.php?e=3");
		  }
		
		if(isset($_POST['jobdescription_c']))$jobdescription=addslashes(strip_tags($_POST['jobdescription_c']));	else $jobdescription="";
			if($jobdescription=="")
			{
				header("location:empjobdetail.php?e=5");
			}
			
			
			if(isset($_POST['qualificationdesc_c']))$qualificationdesc=addslashes(strip_tags($_POST['qualificationdesc_c']));	else $qualificationdesc="";
			if($qualificationdesc=="")
			{
				header("location:empjobdetail.php?e=6");
			}
			
			
			if(isset($_POST['pday_c']))$pday=addslashes(strip_tags($_POST['pday_c'])); else $pday="";
			
			if($pday=="Select Day")
			{
				header("location:empjobdetail.php?e=7");
				
			}
			
			if(isset($_POST['pmonth_c']))$pmonth=addslashes(strip_tags($_POST['pmonth_c'])); else $pmonth="";
			
			if($pmonth=="Select Month")
			{
				header("location:empjobdetail.php?e=7");
				
			}
			
			if(isset($_POST['pyear_c']))$pyear=addslashes(strip_tags($_POST['pyear_c'])); else $pyear="";
			
			if($pyear=="Select Year")
			{
				header("location:empjobdetail.php?e=7");
				
			}
					
			if(isset($_POST['dcprofiledesciprion_c']))$dcprofiledesciprion=addslashes(strip_tags($_POST['dcprofiledesciprion_c']));	else $dcprofiledesciprion="";
			if($dcprofiledesciprion=="")
			{
				header("location:empjobdetail.php?e=8");
			}
		  
		  
		  	if(isset($_POST['postiontype_c']))
			{
				if(is_array($_POST['postiontype_c']))
				{
		  			$postiontype_array = $_POST['postiontype_c'];
					$sourcepostiontype="";
						foreach ($postiontype_array as $one_postiontype)
			   			{
							$sourcepostiontype .= $one_postiontype.", ";
		       			}
						$postiontype = substr($sourcepostiontype, 0, -2);
				}
					$postiontype=addslashes(strip_tags($postiontype));
			}
			else
			$postiontype="";
			
		
		if(isset($_POST['workauthorization']))
			{
				if(is_array($_POST['workauthorization']))
				{
		  			$workauthorization_array = $_POST['workauthorization'];
					$sourceworkauthorization="";
						foreach ($workauthorization_array as $one_workauthorization)
			 			{
							$sourceworkauthorization .= $one_workauthorization.", ";
		      			}
							$workauthorization = substr($sourceworkauthorization, 0, -2);
				}
				$workauthorization=addslashes(strip_tags($workauthorization));
			}
			else
			$workauthorization="";
			
			if(isset($_POST['SalaryRange']))$SalaryRange=addslashes(strip_tags($_POST['SalaryRange']));else $SalaryRange="";
			if(isset($_POST['city']))$city=addslashes(strip_tags($_POST['city']));else $city="";
			if(isset($_POST['state']))$state=addslashes(strip_tags($_POST['state']));else $state="";
			if(isset($_POST['zip']))$zip=addslashes(strip_tags($_POST['zip']));else $zip="";
			if(isset($_POST['country']))$country=addslashes(strip_tags($_POST['country']));else $country="";
			if(isset($_POST['eday']))$eday=addslashes(strip_tags($_POST['eday']));else $eday="";
			if(isset($_POST['emonth']))$emonth=addslashes(strip_tags($_POST['emonth']));else $emonth="";
			if(isset($_POST['eyear']))$eyear=addslashes(strip_tags($_POST['eyear']));else $eyear="";
			if(isset($_POST['dsday']))$dsday=addslashes(strip_tags($_POST['dsday']));else $dsday="";
			if(isset($_POST['dsmonth']))$dsmonth=addslashes(strip_tags($_POST['dsmonth']));else $dsmonth="";
			if(isset($_POST['dsyear']))$dsyear=addslashes(strip_tags($_POST['dsyear']));else $dsyear="";
			if(isset($_POST['deday']))$deday=addslashes(strip_tags($_POST['deday']));else $deday="";
			if(isset($_POST['demonth']))$demonth=addslashes(strip_tags($_POST['demonth']));else $demonth="";
			if(isset($_POST['deyear']))$deyear=addslashes(strip_tags($_POST['deyear']));else $deyear="";
			if(isset($_POST['keyword']))$keyword=addslashes(strip_tags($_POST['keyword']));else $keyword="";
			if(isset($_POST['dcqualificationdesc']))$dcqualificationdesc=addslashes(strip_tags($_POST['dcqualificationdesc']));else $dcqualificationdesc="";
			if(isset($_POST['experiencerequirement']))$experiencerequirement=addslashes(strip_tags($_POST['experiencerequirement']));else $experiencerequirement="";
			
			if($experiencerequirement=="")
			{
				$experiencerequirement=-1;
			}
			
			
			
			include("./Class_Database.php");
			$db= new database();
			//$db->setup("kaushal", "kaushal", "localhost", "jobportaldb");	
			if (isset($_SESSION['userid']))
			{
				$userid=$_SESSION['userid'];
				$id_emp=GetJobSeekerID($userid,$db);
				
			}
			else
			{
				header('Location:index.php');
			}
			
			//EDIT FUNCTIONALITY
			//echo $_POST['id_job'];
			if(isset($_POST['id_job']) && $_POST['id_job']!="")
			{
				$id_job=$_POST['id_job'];
				$query="Update emp_jobdetails set  title='" .  addslashes(strip_tags($title )) . "', jobfunction='" .  addslashes(strip_tags($jobfunction )) . "', industry='" .  addslashes(strip_tags($industry )) . "', postiontype='" .  addslashes(strip_tags($postiontype )) . "', jobdescription='" .  addslashes(strip_tags($jobdescription )) . "', qualificationdesc='" .  addslashes(strip_tags($qualificationdesc )) . "', SalaryRange='" .  addslashes(strip_tags($SalaryRange )) . "',city='" .  addslashes(strip_tags($city )) . "',state='" .  addslashes(strip_tags($state )) . "', zip='" .  addslashes(strip_tags($zip )) . "', country='" .  addslashes(strip_tags($country )) . "',pday='" .  addslashes(strip_tags($pday )) . "',pmonth='" .  addslashes(strip_tags($pmonth )) . "',pyear='" .  addslashes(strip_tags($pyear )) . "', eday='" .  addslashes(strip_tags($eday )) . "',emonth='" .  addslashes(strip_tags($emonth )) . "',eyear='" .  addslashes(strip_tags($eyear )) . "',dsday='" .  addslashes(strip_tags($dsday )) . "', dsmonth='" .  addslashes(strip_tags($dsmonth )) . "',dsyear='" .  addslashes(strip_tags($dsyear )) . "', deday='" .  addslashes(strip_tags($deday )) . "',demonth='" .  addslashes(strip_tags($demonth )) . "',deyear='" .  addslashes(strip_tags($deyear )) . "',  workauthorization='" .  addslashes(strip_tags($workauthorization )) . "', keyword='" .  addslashes(strip_tags($keyword )) . "',dcprofiledesciprion='" .  addslashes(strip_tags($dcprofiledesciprion )) . "',dcqualificationdesc ='" .  addslashes(strip_tags($dcqualificationdesc )) . "', experiencerequirement='" .  addslashes(strip_tags($experiencerequirement )) . "',  updatedon=Now()  where id_job=$id_job";
				
				if ($res=$db->send_sql($query))
				{
					header("Location:empviewjobdetail.php");
				}
				else
				{
					header("Location:empjobdetail.php?e=4");	// Data can not be inserted.	
				}	
					
			}
			
			//INSERT FUNCTIONALITY
			else
			{
				$query= "Insert Into emp_jobdetails(id_user, id_emp, title, jobfunction, industry, postiontype, jobdescription, qualificationdesc, SalaryRange, city, state, zip, country, pday, pmonth, pyear, eday, emonth, eyear, dsday, dsmonth, dsyear, deday, demonth, deyear, workauthorization, keyword, dcprofiledesciprion, dcqualificationdesc, experiencerequirement, createdon, updatedon) VALUES ('" .  addslashes(strip_tags($userid )) . "', '" .  addslashes(strip_tags($id_emp )) . "', '" .  addslashes(strip_tags($title )) . "', '" .  addslashes(strip_tags($jobfunction )) . "', '" .  addslashes(strip_tags($industry )) . "', '" .  addslashes(strip_tags($postiontype )) . "', '" .  addslashes(strip_tags($jobdescription )) . "', '" .  addslashes(strip_tags($qualificationdesc )) . "', '" .  addslashes(strip_tags($SalaryRange )) . "', '" .  addslashes(strip_tags($city )) . "', '" .  addslashes(strip_tags($state )) . "', '" .  addslashes(strip_tags($zip )) . "', '" .  addslashes(strip_tags($country )) . "', '" .  addslashes(strip_tags($pday )) . "', '" .  addslashes(strip_tags($pmonth )) . "', '" .  addslashes(strip_tags($pyear )) . "', '" .  addslashes(strip_tags($eday )) . "', '" .  addslashes(strip_tags($emonth )) . "', '" .  addslashes(strip_tags($eyear )) . "', '" .  addslashes(strip_tags($dsday )) . "', '" .  addslashes(strip_tags($dsmonth )) . "', '" .  addslashes(strip_tags($dsyear )) . "', '" .  addslashes(strip_tags($deday )) . "', '" .  addslashes(strip_tags($demonth )) . "', '" .  addslashes(strip_tags($deyear )) . "', '" .  addslashes(strip_tags($workauthorization )) . "', '" .  addslashes(strip_tags($keyword )) . "', '" .  addslashes(strip_tags($dcprofiledesciprion )) . "', '" .  addslashes(strip_tags($dcqualificationdesc )) . "', '" .  addslashes(strip_tags($experiencerequirement )) . "', Now(), Now())";
				
				
				if ($res=$db->send_sql($query))
				{
					echo "<h2>Job Details Added Successfully!</h2>";
					echo "<a href='empjobdetail.php' class='button' style=background:#000'>Add New</a><a href='empjobdetail.php' class='button' >Back</a>  ";
				}
				else
				{
					header("Location:empjobdetail.php?e=4");	// Data can not be inserted.	
				}
			}
					  
		  ?>
      	</div>
      </div>
        <!--SECOND COLUMN-->
            
    </div> <!--Width-->   
    </div><!-- Content-->
        
</div><!-- Centered-->


<?php
/*Return Job seeker Id for Given User ID*/
function GetJobSeekerID($id_user,$db)
{
	$query="Select id_emp from emp_personalinfo where id_user=$id_user";
	$id_emp=0;
	if ($res=$db->send_sql($query))
	{
		while ($row = mysql_fetch_row($res))
		{
			$id_emp=$row[0];	
		}				
	}	
	return $id_emp;
}
			
			
?>


</body>
</html>