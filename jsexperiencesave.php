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
<title>Experience - Job Seeker</title>
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
                    <li><a href="jseducation.php" style="font-size:12px; font-weight:bold; cursor:pointer" onClick="">Education</a></li>
                    <li><a href="jscertificate.php" style="font-size:12px; font-weight:bold; cursor:pointer" onClick="">Certification</a></li>
                   <li><a href="jsexperience.php" style="font-size:12px; font-weight:bold; color:#333; cursor:pointer" onClick="">Experience</a></li>
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
			if(isset($_POST['expTitle_c'])) $jobtitle=addslashes(strip_tags($_POST['expTitle_c'])); else $jobtitle="";
				if($jobtitle=="")
		     	{
					header("location:jsexperience.php?e=1");
				}
		
			if(isset($_POST['expName_c']))$companyname=addslashes(strip_tags($_POST['expName_c']));	else $companyname="";
				if($companyname=="")
				{
					header("location:jsexperience.php?e=2");
				}
			if(isset($_POST['expIndustry_c']))$industry=addslashes(strip_tags($_POST['expIndustry_c'])); else $industry="";
			if($industry=="")
				{
					header("location:jsexperience.php?e=3");
				}
			if(isset($_POST['StartMonth_c']) && $_POST['StartMonth_c']!="Select Month")$startmonth=addslashes(strip_tags($_POST['StartMonth_c'])); else $startmonth="";
			if($startmonth=="")
				{
					header("location:jsexperience.php?e=4");
				}
			if(isset($_POST['EndMonth_c'])  && $_POST['EndMonth_c']!="Select Month")$endmonth=addslashes(strip_tags($_POST['EndMonth_c']));	else $endmonth="";
			if($endmonth=="")
				{
					header("location:jsexperience.php?e=5");
				}
			if(isset($_POST['StartYear_c'])  && $_POST['StartYear_c']!="Select Year")$startyear=addslashes(strip_tags($_POST['StartYear_c']));	else $startyear="";
			if($startyear=="")
				{
					header("location:jsexperience.php?e=4");
				}
			if(isset($_POST['EndYear_c'])  && $_POST['EndYear_c']!="Select Year")$endyear=addslashes(strip_tags($_POST['EndYear_c']));	else $endyear="";
			if($endyear=="")
				{
					header("location:jsexperience.php?e=5");
				}
			
			
			if(isset($_POST['city']))$city=addslashes(strip_tags($_POST['city'])); else $city="";
			if(isset($_POST['state']))$location=addslashes(strip_tags($_POST['state'])); else $location="";
			if(isset($_POST['Zipcode']))$zip=addslashes(strip_tags($_POST['Zipcode']));	else $zip="";
			if(isset($_POST['country']))$country=addslashes(strip_tags($_POST['country'])); else $country="";
			if(isset($_POST['expDescription']))$description=addslashes(strip_tags($_POST['expDescription']));	else $description="";
			
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
			if(isset($_POST['exp_id']) && $_POST['exp_id']!="")
			{
				$exp_id=$_POST['exp_id'];
				$query= "Update js_experience set exp_title= '" .  addslashes(strip_tags($jobtitle )) . "',exp_name= '" .  addslashes(strip_tags($companyname )) . "',exp_industry= '" .  addslashes(strip_tags($industry )) . "',exp_city= '" .  addslashes(strip_tags($city )) . "',exp_location= '" .  addslashes(strip_tags($location )) . "',exp_zipcode= '" .  addslashes(strip_tags($zip )) . "',exp_country= '" .  addslashes(strip_tags($country )) . "',exp_startmonth= '" .  addslashes(strip_tags($startmonth )) . "',exp_startyear= '" .  addslashes(strip_tags($startyear )) . "',exp_endmonth= '" .  addslashes(strip_tags($endmonth )) . "',exp_endyear= '" .  addslashes(strip_tags($endyear )) . "',exp_description= '" .  addslashes(strip_tags($description )) . "', exp_updatedon=Now() where exp_id=$exp_id";
					if ($res=$db->send_sql($query))
					{
						//echo "<h2>Experience Details Updated Successfully!</h2>";
						//echo "<a href='jsviewprofile.php' class='button'>Back</a>  ";
						header("Location:jsviewprofile.php");
					}
					else
					{
						header("Location:jsexperience.php?e=4");	// Data can not be inserted.	
					}			
			}
			
			//INSERT FUNCTIONALITY
			else
			{
				$query= "Insert Into js_experience(id_user,id_js,exp_title,exp_name,exp_industry,exp_city, exp_location,exp_zipcode,exp_country, exp_startmonth,exp_startyear, exp_endmonth,exp_endyear,exp_description,exp_createdon,exp_updatedon) values ('" .  addslashes(strip_tags($userid )) . "', '" .  addslashes(strip_tags($js_id )) . "', '" .  addslashes(strip_tags($jobtitle )) . "','" .  addslashes(strip_tags($companyname )) . "', '" .  addslashes(strip_tags($industry )) . "','" .  addslashes(strip_tags($city )) . "', '" .  addslashes(strip_tags($location )) . "','" .  addslashes(strip_tags($zip )) . "','" .  addslashes(strip_tags($country )) . "', '" .  addslashes(strip_tags($startmonth )) . "','" .  addslashes(strip_tags($startyear )) . "','" .  addslashes(strip_tags($endmonth )) . "','" .  addslashes(strip_tags($endyear )) . "','" .  addslashes(strip_tags($description )) . "', Now(), Now())";
				
					if ($res=$db->send_sql($query))
					{
						echo "<h2>Experience Details Added Successfully!</h2>";
						echo "<a href='jsexperience.php' class='button'>Add New</a><a href='jsdashboard.php' class='button'>Back</a>  ";
					}
					else
					{
						header("Location:jsexperience.php?e=4");	// Data can not be inserted.	
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