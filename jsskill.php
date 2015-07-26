<?php ob_start(); ?>
<?php

session_start();

if (!isset($_SESSION['username'])) 
	{
		header('Location:index.php');
	}

if(isset($_POST['skill_id']) && $_POST['skill_id']!="")
{
	include("./Class_Database.php");
	$db= new database();
	//$db->setup("kaushal", "kaushal", "localhost", "jobportaldb");	
  	$id_user=$_SESSION["userid"];
	$skill_id=$_POST['skill_id'];
	$query="Select * from js_skill where skill_id=$skill_id and id_user=$id_user";
	if($res=$db->send_sql($query))
	{
		if (mysql_num_rows($res)>0)
		{
			while ($row = mysql_fetch_array($res))
			{
				  $skill_name=stripslashes($row['skill_name']);
				  $skill_year=stripslashes($row['skill_year']);
			}
		}
	}
	
}
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Professional Detail - Job Seeker</title>
<link rel="stylesheet" type="text/css" media="screen" href="css/maincss.css">
<script type="text/javascript">
function ValidateForm(form)
{
	
	for(var i = 0; i < form.elements.length; i++)
	{
		
		if(form.elements[i].name.indexOf("_c")>0)
		{
			//alert(form.elements[i].type);
			if (form.elements[i].type=="text" && form.elements[i].value=="")
			{
				document.getElementById("errormessage").innerHTML="<b style='color:red'>Please "+form.elements[i].placeholder+"</b>";
				form.elements[i].focus();
				return false;
			}
			else if (form.elements[i].type=="textarea" && trim(form.elements[i].value)=="")
			{
				document.getElementById("errormessage").innerHTML="<b style='color:red'>Please "+form.elements[i].placeholder+"</b>";
				form.elements[i].focus();
				return false;
			}
			else if(form.elements[i].type=="select-one" && form.elements[i].value.indexOf("Select")>-1)
			{
				
				document.getElementById("errormessage").innerHTML="<b style='color:red'>Please "+form.elements[i].value+"</b>";
				form.elements[i].focus();
				return false;
			}
		}
		 if (form.elements[i].name=="email_c")
		{
			
			var regEmail=/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
			var emailadd=form.elements[i].value;
			if(regEmail.test(emailadd)==false)
			{
				document.getElementById("errormessage").innerHTML="<b style='color:red'>Please Enter Valid Email Address</b>";
				form.elements[i].focus();
				return false;	
			}
		}
		
		if (form.elements[i].name=="phone_c")
		{
			
			var regPhone= /\d{10}/;
			var phoneadd=form.elements[i].value;
			if(regPhone.test(phoneadd)==false)
			{document.getElementById("errormessage").innerHTML="<b style='color:red'>Please Enter Phone Number</b>";
				form.elements[i].focus();
				return false;	
			}
		}
		
		if (form.elements[i].id=="dropdown")
		{
			var dropdowncheck= document.getElementById("dropdown").value;
			if(dropdowncheck==""){
				document.getElementById("errormessage").innerHTML="<b style='color:red'>Please "+form.elements[i].title+"</b>";
				form.elements[i].focus();
				return false;	
			}
		}
		
		else if(form.elements[i].name=="pwd")
			{
				if (form.elements[i].value!=form.elements['cnfpwd'].value)
				{
					document.getElementById("errormessage").innerHTML="<b style='color:red'>Passwords do not match</b>";
					return false;	
				}
			}
			else if(form.elements[i].name=="cnfpwd")
			{
				if (form.elements[i].value!=form.elements['pwd'].value)
				{
					document.getElementById("errormessage").innerHTML="<b style='color:red'>Passwords do not match</b>";
					return false;	
				}
			}
	} 
	return true;
	
}

function trim(str) {
    return str.replace( /^\s+|\s+$/g, '' );
}
</script>

<style type="text/css">


td:first-child
{ text-align:right
}

</style>

</head>

<body>

<div id="centered"><!-- Centered-->
<div align="right" style="color:#045"><a href="jsdashboard.php" style="color:#045">Welcome <b style='color:#933'><?php  if (isset($_SESSION['username'])) echo $_SESSION['username']; ?></b></a>  , <a href="logout.php" style="color:#045">Logout</a></div>
	
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
	         <hr size="1" color="#069"  align="center">
	         <h2>Professional Detail </h2>
        <hr size="1" color="#069"  align="center">
             <form action="jsskillsave.php" name="frmupload" method="post" enctype="multipart/form-data" onSubmit="return ValidateForm(this)">
           	 <table border="0" cellpadding="2" cellspacing="0" style="font-family:Verdana, Geneva, sans-serif; font-size:12px">
				 <tr>
					<td id="errormessage" colspan="2" align="left"  style="text-align:left">
					<?php
						if(isset($_GET['e']) && $_GET['e']==1)
							echo "<b style='color:red'>Please Select Total Job Experience!</b>";	
						elseif(isset($_GET['e']) && $_GET['e']==2)
							echo "<b style='color:red'>Please Enter Skill!</b>";
					?>
					</td>
				 </tr>
             
					<input type="hidden" name="skill_id" value="<?php if(isset($_POST['skill_id']) && $_POST['skill_id']!="") echo $_POST['skill_id'] ; else echo "";?>">
				 
                 <tr>
					<td><label style="color:red; font-weight:bold">*</label><label style="font-weight:bold;">Total Job Experience:</label></td>
					<td>
						<select name="skillyear"  id="dropdown" title="Enter Total Job Experience!">
								<option value="" selected>Select Year</option>
								<?php 
						if (isset($skill_year) && $skill_year!="0")
							showCountOptionsDrop($count_arr, $skill_year, true);
						
						else
							showCountOptionsDrop($count_arr, null , true);
						 ?>
                                
						</select></td>
				 </tr>
             
                 <tr>
        <td style="vertical-align:top"> <label style="color:red; font-weight:bold">*</label><label style="font-weight:bold;">Skill:</label></td>
                 <td>
                 <textarea placeholder="Enter Skills" name="skillName_c" value="<?php if(isset($skill_name)) echo $skill_name;?>" rows="6" cols="50"><?php if(isset($skill_name)) echo $skill_name;?> </textarea>
                </td>
                    
             </tr>  
             
            </table>
            
				<div align="right"><input class="button" type="submit" name="submit" id="submit" value="Submit" /> 
					 <?php	if(isset($_POST['skill_id']) && $_POST['skill_id']!=""){	?>
					<a class="button" name="cancel" value="Cancel" href="jsviewprofile.php" />Cancel</a>
					 <?php } else { ?>
					<a class="button" name="reset" value="Reset" href="jsskill.php" />Reset</a>
					 <?php } ?>
				</div>
				 
            </form>
      	</div>
    </div>
        <!--SECOND COLUMN-->
        
    </div> <!--Width-->   
    </div><!-- Content-->
        
</div><!-- Centered-->
</body>
</html>