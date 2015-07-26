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
<title>Job Seeker - Cover Letter</title>
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
			
		}
		 
	} 
	return true;
	
}

function trim(str) {
    return str.replace( /^\s+|\s+$/g, '' );
}
</script>

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
      	<div style="padding:10px; min-height:700px; background-color:#CCC">
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
                    <li><a href="jscoverletter.php" style="font-size:12px; font-weight:bold; cursor:pointer" onClick="">Upload Cover Letters</a></li>
                    <li><a href="jscreateresume.php" style="font-size:12px; font-weight:bold; cursor:pointer" onClick="">Create Resume</a></li>
                     <li><a href="jscreatecoverletter.php" style="font-size:12px; font-weight:bold; color:#333;cursor:pointer" onClick="">Create Cover Letters</a></li>
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
	         <h2>Create Cover Letter</h2>
        <hr size="1" color="#069"  align="center">
             <form action="tcpdf/examples/jscreatecoverletterdownload.php" name="createcover" method="post" enctype="multipart/form-data" onSubmit="return ValidateForm(this)">
           	 <table border="0" cellpadding="2" cellspacing="0" style="font-family:Verdana, Geneva, sans-serif; font-size:12px">
             <tr>
            	<td id="errormessage" colspan="2" style="text-align:left">
                </td>
             </tr>
             <tr>
            	 <td colspan="2" bgcolor="#CCCCCC"><strong>Cover Letter</strong></td>
             </tr>
             <tr>
                <td  align="left" ><b> <font face="Arial" size="2">Title:</font></b></td>
                <td  align="left" ><input type="text"  name="title_c"placeholder="Enter Title Name"   size="40" style="font-family: Arial; font-size: 10pt" /></td>
             </tr>
           
            <tr><td colspan="2">&nbsp;</td></tr>
            <tr>
             	<td colspan="2"  bgcolor="#CCCCCC"><strong>Content</strong>            	 </td>
           	</tr>
            <tr>
				<td colspan="2"> <textarea name="Content_c" id="Content" rows="30" cols="80" placeholder="Enter the Cover Letter Body"  value=""></textarea> </td>
			</tr>
             
            </table>
            
            <div align="right"><input class="button" type="submit" name="submit" id="submit" value="Download" /> 
             <a class="button" name="reset" value="Reset"  />Reset</a>
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