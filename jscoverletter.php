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
<title>Cover Letter</title>
<link rel="stylesheet" type="text/css" media="screen" href="css/maincss.css">
<script type="text/javascript">
function validate()
{
	if (document.getElementById("coverlettertitle").value=="")
	{
		document.getElementById("errormessage").innerHTML="<b style='color:red'>Please Enter Cover Letter Title!</b>";
		document.getElementById("coverlettertitle").focus();
		return false;
	}
	else if (document.getElementById("coverletter").value=="" && document.getElementById("coverlettertext").value=="")
	{
		document.getElementById("errormessage").innerHTML="<b style='color:red'>Please Choose one option to upload!</b>";
		return false;
	}
	else
		return true;
}

function AddNew()
{
	alert(document.getElementById("block").innerHTML);
	
}
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
                    <li><a href="jscoverletter.php" style="font-size:12px; font-weight:bold; color:#333;  cursor:pointer" onClick="">Upload Cover Letters</a></li>
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
	         <h2>Upload Cover Letters</h2>
             <form action="jsupload.php" name="frmupload" method="post" enctype="multipart/form-data" onSubmit="return validate();">
           	 <table border="0" cellpadding="5px" cellspacing="0" style="font-family:Verdana, Geneva, sans-serif; font-size:12px">
             <tr>
            	<td id="errormessage" colspan="2" align="left">
                <?php
                	if(isset($_GET['e']) && $_GET['e']=="0")
					{
						echo "<b style='color:red'>Please Enter Cover Letter Title!</b>";	
					}
					
                	else if(isset($_GET['e']) && $_GET['e']=="1")
					{
						echo "<b style='color:red'>Please Choose one option to upload!</b>";	
					}
					
					else if(isset($_GET['e']) && $_GET['e']=="2")
					{
						echo "<b style='color:red'>Invalid File Type!</b>";	
					}
					
					else if(isset($_GET['e']) && $_GET['e']=="3")
					{
						echo "<b style='color:red'>File size exceeds the maximum allowed size!</b>";	
					}
					
					else if(isset($_GET['e']) && $_GET['e']=="4")
					{
						echo "<b style='color:red'>Minimum Text size is 1000 Characters!</b>";	
					}
				?>
                </td>
             </tr>
             
             <tr>
                <td><label style="font-weight:bold">Cover Letter Title:</label><label style="color:red; font-weight:bold">*</label></td>
                <td><input type="text" name="coverlettertitle" id="coverlettertitle" maxlength="50"/></td>
             </tr>
             
             <tr>
                <td><label style="font-weight:bold">Attach Cover Letter:</label><label style="color:red; font-weight:bold">*</label></td>
                <td><input type="file" name="coverletter" id="coverletter" /></td>
             </tr>
             <input type="hidden" name="type_file" id="type_file" value="CoverLetter" />
             <!--<input type="button" name="add" style="position:relative; top:40px; left:450px" value=" + " onClick="AddNew();">-->

             
             <tr>
                <td style="width:150px; vertical-align:text-top"></td>
                <td style="font-size:10px; vertical-align:text-top">Only .pdf files are permitted.</td>
             </tr>
             
             <tr>
                <td style="width:150px; vertical-align:text-top"></td>
                <td><b style="color:#045">OR</b></td>
             </tr>
             
             <tr>
                <td style="width:150px; vertical-align:text-top"><label style="font-weight:bold">Copy and Paste Your Cover Letter Here:</label><label style="color:red; font-weight:bold">*</label></td>
                <td><textarea name="coverlettertext" id="coverlettertext" cols="60" rows="10" ></textarea></td>
             </tr>
             
             <tr>
                <td style="width:150px; vertical-align:text-top"></td>
                <td align="right"><input type="submit" name="submit" value="Submit" /> <input type="button" name="reset" value="Reset" /></td>
             </tr>
             
             </table>
             </form>
      	</div>
      </div>
        <!--SECOND COLUMN-->
        
    </div> <!--Width-->   
    </div><!-- Content-->
        
</div><!-- Centered-->





</body>
</html>