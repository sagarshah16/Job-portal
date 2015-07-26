<?php ob_start(); ?>
<?php

session_start();

if (!isset($_SESSION['username'])) 
	{
		header('Location:index.php');
	}

if(isset($_POST['certi_id']) && $_POST['certi_id']!="")
{
	include("./Class_Database.php");
	$db= new database();
	//$db->setup("kaushal", "kaushal", "localhost", "jobportaldb");	
  	$id_user=$_SESSION["userid"];
	$certi_id=$_POST['certi_id'];
	$query="Select * from js_certification where certi_id=$certi_id and id_user=$id_user";
	if($res=$db->send_sql($query))
	{
		if (mysql_num_rows($res)>0)
		{
			while ($row = mysql_fetch_array($res))
			{
				  $ctf_name=stripslashes($row['ctf_name']);
				  $ctf_month=stripslashes($row['ctf_month']); 
				  $ctf_year=stripslashes($row['ctf_year']);
				  $ctf_institutename=stripslashes($row['ctf_institutename']);
				  $ctf_summary=stripslashes($row['ctf_summary']); 	
			}
		}
	}
	
}
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Certificate - Job Seeker</title>
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
			
			else if(form.elements[i].type=="select-one" && form.elements[i].value=="")
			{
				
				document.getElementById("errormessage").innerHTML="<b style='color:red'>Please "+form.elements[i].title+"</b>";
				form.elements[i].focus();
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
	           <hr size="1" color="#069"  align="center">
	         <h2>Certificate Detail </h2>
        <hr size="1" color="#069"  align="center">
             <form action="jscertificatesave.php" name="frmupload" method="post" enctype="multipart/form-data" onSubmit="return ValidateForm(this)">
           	 <table border="0" cellpadding="2" cellspacing="0" style="font-family:Verdana, Geneva, sans-serif; font-size:12px">
				 <tr>
					<td id="errormessage" colspan="2" align="left">
					<?php
						if(isset($_GET['e']) && $_GET['e']==1)
							echo "<b style='color:red'>Please Select Certification Name!</b>";	
					?>
					</td>
				 </tr>
             
					<input type="hidden" name="certi_id" value="<?php if(isset($_POST['certi_id']) && $_POST['certi_id']!="") echo $_POST['certi_id'] ; else echo "";?>">
				 <tr>
					<td><label style="color:red; font-weight:bold">*</label><label style="font-weight:bold">Certification Name:</label></td>
					<td><input type="text" value="<?php if(isset($ctf_name)&& $ctf_name!="")echo $ctf_name; ?>" placeholder="Enter Certification Name" name="ctfName_c" id="ctfName_c"/>
					</td>
				 </tr>
             
				 <tr>
					<td><label style="color:red; font-weight:bold">*</label><label style="font-weight:bold">Date of Receipt:</label></td>
					<td>
						<select name="ctfMonth_c" id="dropdown" title="Select Date of Receipt">
								<option value="">Select Month</option>
								<?php 
								if (isset($ctf_month) && $ctf_month!="0")
									showMonthOptionsDrop($month_arr, $ctf_month, true);
								
								else
									showMonthOptionsDrop($month_arr, null , true);
								 ?>
						</select>
						
						<select name="ctfYear_c" id="dropdown1" title="Select Date of Receipt">
								<option value="">Select Year</option>
								<?php
									for ($i=date("Y");$i>=1900;$i--)
									{
										echo "<option value='" . $i . "'";
										if(isset($ctf_year) && intval($ctf_year)==$i) 
										{
											echo "selected='selected' " ; 
										}
										echo ">" . $i ."</option>";
									}
								?>
						</select>
                        
                         
					
					</td>
				 </tr>
             
				 <tr>
					<td><label style="font-weight:bold">Institution Name:</label></td>
					<td>
						<input type="text" value="<?php if(isset($ctf_institutename)&& $ctf_institutename!="")echo $ctf_institutename; ?>" placeholder="Enter Institute Name" name="ctfInstituteName" id="ctfInstituteName"/>
					</td>
				 </tr>

				 <tr>
					<td><label style="font-weight:bold; vertical-align:text-top">Summary:</label></td>
					<td>
						<textarea name="ctfSummary" id="ctfSummary" rows="4" cols="28" placeholder="Write the Summary" value=""><?php if(isset($ctf_summary) && $ctf_summary!="")echo $ctf_summary;?></textarea>	
					</td>
				 </tr>
             
            </table>
            
				<div align="right"><input class="button" type="submit" name="submit" id="submit" value="Submit" /> 
					 <?php	if(isset($_POST['certi_id']) && $_POST['certi_id']!=""){	?>
					<a class="button" name="cancel" value="Cancel" href="jsviewprofile.php" />Cancel</a>
					 <?php } else { ?>
					<a class="button" name="reset" value="Reset" href="jscertificate.php" />Reset</a>
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