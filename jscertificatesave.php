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
<title>Certificate - Job Seeker</title>
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
                    <li><a href="jscertificate.php" style="font-size:12px; font-weight:bold; color:#333; cursor:pointer" onClick="">Certification</a></li>
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
          if(isset($_POST['ctfName_c'])) $ctf_name=addslashes(strip_tags($_POST['ctfName_c'])); else $ctf_name="";
		  if($ctf_name=="")
		  {
				header("location:jscertificate.php?e=1");
		  }
		
			if(isset($_POST['ctfMonth_c']))$ctf_month=addslashes(strip_tags($_POST['ctfMonth_c'])); else $ctf_month="";
			 if($ctf_month=="")
		  {
				header("location:jscertificate.php?e=2");
		  }
			if(isset($_POST['ctfYear_c']))$ctf_year=addslashes(strip_tags($_POST['ctfYear_c']));	else $ctf_year="";
			 if($ctf_year=="")
		  {
				header("location:jscertificate.php?e=2");
		  }
			if(isset($_POST['ctfInstituteName']))$ctf_institutename=addslashes(strip_tags($_POST['ctfInstituteName']));	else $ctf_institutename="";
			if(isset($_POST['ctfSummary']))$ctf_summary=addslashes(strip_tags($_POST['ctfSummary']));	else $ctf_summary="";
			
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
				if(isset($_POST['certi_id']) && $_POST['certi_id']!="")
				{
					$certi_id=$_POST['certi_id'];
					$query="Update js_certification set ctf_name = '" .  addslashes(strip_tags($ctf_name )) . "',ctf_month = '" .  addslashes(strip_tags($ctf_month )) . "',ctf_year = '" .  addslashes(strip_tags($ctf_year )) . "',ctf_institutename = '" .  addslashes(strip_tags($ctf_institutename )) . "',ctf_summary = '" .  addslashes(strip_tags($ctf_summary )) . "', ctf_createdon=Now() where certi_id=$certi_id";
					
						if ($res=$db->send_sql($query))
						{
							//echo "<h2>Certificate Details Updated Successfully!</h2>";
							//echo "<a href='jsviewprofile.php' class='button'>Back</a>  ";
							header("Location:jsviewprofile.php");
						}
						else
						{
							header("Location:jscertificate.php?e=4");	// Data can not be inserted.	
						}			
				}
				
				//INSERT FUNCTIONALITY
				else
				{
		 $query= "Insert Into js_certification (id_user,id_js,ctf_name,ctf_month,ctf_year,ctf_institutename,ctf_summary,ctf_createdon,ctf_updatedon) values ('" .  addslashes(strip_tags($userid )) . "','" .  addslashes(strip_tags($js_id )) . "','" .  addslashes(strip_tags($ctf_name )) . "','" .  addslashes(strip_tags($ctf_month )) . "','" .  addslashes(strip_tags($ctf_year )) . "','" .  addslashes(strip_tags($ctf_institutename )) . "','" .  addslashes(strip_tags($ctf_summary )) . "', Now(), Now())";
					
						if ($res=$db->send_sql($query))
						{
							echo "<h2>Certificate Details Added Successfully!</h2>";
							echo "<a href='jscertificate.php' class='button'>Add New</a><a href='jsdashboard.php' class='button'>Back</a>  ";
						}
						else
						{
							header("Location:jscertificate.php?e=4");	// Data can not be inserted.	
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