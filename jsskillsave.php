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
<title>Professional Detail - Job Seeker</title>
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
                   <li><a href="jsexperience.php" style="font-size:12px; font-weight:bold; cursor:pointer" onClick="">Experience</a></li>
                            <li><a href="jsskill.php" style="font-size:12px; font-weight:bold; color:#333; cursor:pointer" onClick="">Professional Detail</a></li>
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
		  if(isset($_POST['skillyear']))$skill_year=addslashes(strip_tags($_POST['skillyear'])); else $skill_year="";
			if($skill_year=="")
				{
					header("location:jsskill.php?e=1");
				}
          if(isset($_POST['skillName_c'])) $skill_name=addslashes(strip_tags($_POST['skillName_c'])); else $skill_name="";
		  if($skill_name=="")
		  {
				header("location:jsskill.php?e=2");
		  }
		
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
				if(isset($_POST['skill_id']) && $_POST['skill_id']!="")
				{
					$skill_id=$_POST['skill_id'];
					$query="Update js_skill set skill_name= '" .  addslashes(strip_tags($skill_name )) . "',skill_year= '" .  addslashes(strip_tags($skill_year )) . "',skill_createdon=Now() where skill_id=$skill_id";
					
						if ($res=$db->send_sql($query))
						{
							//echo "<h2>Education Details Updated Successfully!</h2>";
							//echo "<a href='jsviewprofile.php' class='button'>Back</a>  ";
							header("Location:jsviewprofile.php");
						}
						else
						{
							header("Location:jsskill.php?e=4");	// Data can not be inserted.	
						}			
				}
				
				//INSERT FUNCTIONALITY
				else
				{
		$query= "Insert Into js_skill (id_user,id_js,skill_name,skill_year,skill_createdon,skill_updatedon) values ('" .  addslashes(strip_tags($userid )) . "','" .  addslashes(strip_tags($js_id )) . "','" .  addslashes(strip_tags($skill_name )) . "','" .  addslashes(strip_tags($skill_year )) . "',Now(), Now())";
					
						if ($res=$db->send_sql($query))
						{
							echo "<h2>Professional Detail Details Added Successfully!</h2>";
							echo "<a href='jsskill.php' class='button'>Add New</a><a href='jsskill.php' class='button'>Back</a>  ";
						}
						else
						{
							header("Location:jsskill.php?e=4");	// Data can not be inserted.	
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