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
<title>Education - Job Seeker</title>
<link rel="stylesheet" type="text/css" media="screen" href="css/maincss.css">
<script type="text/javascript">

</script>

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
                    <li><a href="jseducation.php" style="font-size:12px; color:#333; font-weight:bold; cursor:pointer" onClick="">Education</a></li>
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
          if(isset($_POST['DegreeLevel_c']) && $_POST['DegreeLevel_c']!="") 
		  {	$degree=addslashes(strip_tags($_POST['DegreeLevel_c'])); }
		  else 
		  {	header("location:jseducation.php?e=1");}
			
		  
		 
		
		if(isset($_POST['FieldStudy_c']))$field=addslashes(strip_tags($_POST['FieldStudy_c']));	else $field="";
			if($field=="")
			{
				header("location:jseducation.php?e=2");
			}
			
			if(isset($_POST['gpa_c']))$edu_gpa=addslashes(strip_tags($_POST['gpa_c'])); else $edu_gpa="";
			
			if($edu_gpa=="")
			{
				header("location:jseducation.php?e=3");
				
			}
			else
			{
				if (!preg_match("/^[0]|[0-3]\.(\d?\d?)|[4].[0]$/", $edu_gpa))	
					header("location:jseducation.php?e=6");
			}
			
			if(isset($_POST['StartMonth_c']))$startmonth=addslashes(strip_tags($_POST['StartMonth_c'])); else $startmonth="";
			
			if($startmonth=="")
			{
				header("location:jseducation.php?e=4");
				
			}
			
			if(isset($_POST['StartYear_c']))$startyear=addslashes(strip_tags($_POST['StartYear_c'])); else $startyear="";
			
			if($startyear=="")
			{
				header("location:jseducation.php?e=4");
				
			}
			if(isset($_POST['EndMonth_c']))$endmonth=addslashes(strip_tags($_POST['EndMonth_c'])); else $endmonth="";
			
			if($endmonth=="")
			{
				header("location:jseducation.php?e=5");
				
			}
			
			if(isset($_POST['EndYear_c']))$endyear=addslashes(strip_tags($_POST['EndYear_c'])); else $endyear="";
			
			if($endyear=="")
			{
				header("location:jseducation.php?e=5");
				
			}
			
			if(isset($_POST['InstituteName']))$institute=addslashes(strip_tags($_POST['InstituteName']));	else $institute="";
			if(isset($_POST['city']))$city=addslashes(strip_tags($_POST['city']));	else $city="";
			if(isset($_POST['state']))$state=addslashes(strip_tags($_POST['state']));	else $state="";
			if(isset($_POST['Zipcode']))$zip=addslashes(strip_tags($_POST['Zipcode']));	else $zip="";	
			if(isset($_POST['country']))$country=addslashes(strip_tags($_POST['country']));	else $country="";		
			if(isset($_POST['EduSummary']))$summary=addslashes(strip_tags($_POST['EduSummary']));	else $summary="";
			
			include("./Class_Database.php");
			$db= new database();
			//$db->setup("kaushal", "kaushal", "localhost", "jobportaldb");	
			if (isset($_SESSION['userid']))
			{
				$userid=$_SESSION['userid'];
				$js_id=GetJobSeekerID($userid,$db);
				
			}
			else
			{
				header("location:index.php");
			}
			
			//EDIT FUNCTIONALITY
			if(isset($_POST['edu_id']) && $_POST['edu_id']!="")
			{
				$edu_id=$_POST['edu_id'];
				$query="Update js_edu set edu_degreename= '" .  addslashes(strip_tags($degree )) . "', edu_studyname= '" .  addslashes(strip_tags($field )) . "', edu_gpa= '" .  addslashes(strip_tags($edu_gpa )) . "', edu_startdate= '" .  addslashes(strip_tags($startmonth )) . "', edu_startyear= '" .  addslashes(strip_tags($startyear )) . "', edu_enddate= '" .  addslashes(strip_tags($endmonth )) . "', edu_endyear= '" .  addslashes(strip_tags($endyear )) . "', edu_institutename= '" .  addslashes(strip_tags($institute )) . "', edu_city= '" .  addslashes(strip_tags($city )) . "', edu_state= '" .  addslashes(strip_tags($state )) . "', edu_instZipcode= '" .  addslashes(strip_tags($zip )) . "', edu_country= '" .  addslashes(strip_tags($country )) . "', edu_summary= '" .  addslashes(strip_tags($summary )) . "', edu_updatedon=Now() where edu_id=$edu_id";
				
				if ($res=$db->send_sql($query))
				{
					//echo "<h2>Education Details Updated Successfully!</h2>";
					//echo "<a href='jsviewprofile.php' class='button'>Back</a>  ";
					header("Location:jsviewprofile.php");
				}
				else
				{
					header("Location:jseducation.php?e=4");	// Data can not be inserted.	
				}			
			}
			
			//INSERT FUNCTIONALITY
			else
			{
				$query="Insert Into js_edu(id_user,id_js, edu_degreename, edu_studyname, edu_gpa, edu_startdate,  edu_startyear, edu_enddate, edu_endyear, edu_institutename, edu_city, edu_state, edu_instZipcode,edu_country, edu_summary, edu_createdon, edu_updatedon) values ('" .  addslashes(strip_tags($userid )) . "', '" .  addslashes(strip_tags($js_id )) . "', '" .  addslashes(strip_tags($degree )) . "', '" .  addslashes(strip_tags($field )) . "', '" .  addslashes(strip_tags($edu_gpa )) . "', '" .  addslashes(strip_tags($startmonth )) . "', '" .  addslashes(strip_tags($startyear )) . "', '" .  addslashes(strip_tags($endmonth )) . "', '" .  addslashes(strip_tags($endyear )) . "', '" .  addslashes(strip_tags($institute )) . "','" .  addslashes(strip_tags($city )) . "', '" .  addslashes(strip_tags($state )) . "', '" .  addslashes(strip_tags($zip )) . "','" .  addslashes(strip_tags($country )) . "', '" .  addslashes(strip_tags($summary )) . "', Now(), Now())";
				
				if ($res=$db->send_sql($query))
				{
					echo "<h2>Education Details Added Successfully!</h2>";
					echo "<a href='jseducation.php' class='button'>Add New</a><a href='jsdashboard.php' class='button'>Back</a>  ";
				}
				else
				{
					header("Location:jseducation.php?e=4");	// Data can not be inserted.	
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
	$query="Select id_js from js_personalinfo where id_user=$id_user";
	$id_js=0;
	if ($res=$db->send_sql($query))
	{
		while ($row = mysql_fetch_row($res))
		{
			$id_js=$row[0];	
		}				
	}	
	return $id_js;
}
			
			
?>


</body>
</html>