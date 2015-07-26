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
<title>Job Seeker - Resume</title>
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
			else if(form.elements[i].type=="select-one" && form.elements[i].value=="")
			{
				
				document.getElementById("errormessage").innerHTML="<b style='color:red'>Please "+form.elements[i].title+"</b>";
				form.elements[i].focus();
				return false;
			}
			else if(form.elements[i].name=="Email_c")
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
			else if(form.elements[i].name=="Phone_c")
			{
				
				//alert("dd");
				var regPhone= /\d{10}/;
				var phoneadd=form.elements[i].value;
				if(regPhone.test(phoneadd)==false)
				{
					document.getElementById("errormessage").innerHTML="<b style='color:red'>Please Enter Valid Phone Number</b>";
					form.elements[i].focus();
					return false;	
				}
			}
			
			else if(form.elements[i].name=="ZipCode_c")
			{
				
				var regZip= /^([0-9]{5})(-[0-9]{4})?$/i;
				var zip=form.elements[i].value;
				if(regZip.test(zip)==false)
				{
					document.getElementById("errormessage").innerHTML="<b style='color:red'>Please Enter Valid Zipcode</b>";
					form.elements[i].focus();
					return false;	
				}
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
      	<div style="padding:10px; min-height:1620px; background-color:#CCC">
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
                    <li><a href="jscreateresume.php" style="font-size:12px; font-weight:bold; color:#333;cursor:pointer" onClick="">Create Resume</a></li>
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
	         <h2>Create Resume</h2>
        <hr size="1" color="#069"  align="center">
             <form action="tcpdf/examples/example_021.php" name="createresume" method="post" enctype="multipart/form-data" onSubmit="return ValidateForm(this)">
           	 <table border="0" cellpadding="2" cellspacing="0" style="font-family:Verdana, Geneva, sans-serif; font-size:12px">
              <tr>
            	<td id="errormessasge" colspan="2" style="text-align:left">
               
                </td>
             </tr>
             <tr>
            	 <td colspan="2" bgcolor="#CCCCCC"><strong>PERSONAL INFORMATION</strong></td>
             </tr>
             <tr>
                <td width="22%" align="left" ><b> <font face="Arial" size="2">Name:</font></b></td>
                <td width="78%" align="left" ><input type="text" name="name_c" size="40" style="font-family: Arial; font-size: 10pt"  placeholder="Enter the Name"/></td>
             </tr>
            <tr>
                <td align="left" ><b> <font face="Arial" size="2">Address:<br /><br /><br />City:</font></b></td>
                <td align="left" >
                <input type="text" name="Address1_c"  placeholder="Enter the Address" size="40" style="font-family: Arial; font-size: 10pt" />
				<br />
				<input type="text" name="Address2_c" placeholder="Enter the Address"  size="40" style="font-family: Arial; font-size: 10pt" />
                <br />
				<input type="text" name="City_c" placeholder="Enter the City Name"  size="30" style="font-family: Arial; font-size: 10pt" />
                <select type="text" name="state_c" id="state" title="Select State">
                <option value="">Select State</option>
					<?php
						 showStateOptionsDrop($states_arr, null, true);
                     ?>
              	</select>
                Zip:
                <input type="text" name="ZipCode_c" placeholder="Enter Zip Code"  size="10" style="font-family: Arial; font-size: 10pt" /></td>
            </tr>
		    <tr>
				<td align="left" ><b> <font face="Arial" size="2">Phone:</font></b></td>
				<td align="left" ><input type="text" name="Phone_c" placeholder="Enter Phone Number"  size="10" style="font-family: Arial; font-size: 10pt" /></td>
            </tr>
            <tr>
				<td align="left" ><b> <font face="Arial" size="2">E-Mail Address:</font></b></td>
                <td align="left" ><input type="text" name="Email_c" placeholder="Enter Email Address"  size="40" tabindex="8" style="font-family: Arial; font-size: 10pt" /></td>
			</tr>
            </tr>
            <tr><td colspan="2">&nbsp;</td></tr>
            <tr>
 			<tr>
             	<td colspan="2"   bgcolor="#CCCCCC"><strong>OBJECTIVE</strong> </td>
           	</tr>
            <tr>
				<td colspan="2"> <textarea name="objective" id="objective" rows="4" cols="80" value=""></textarea> </td>
			</tr>
            </tr>
            <tr><td colspan="2">&nbsp;</td></tr>
            <tr>
            <tr>
                <td colspan="2"  bgcolor="#CCCCCC"><strong>PROFESSIONAL WORK HISTORY</strong>            	 </td>
           	</tr>
           	<tr>
                <td  align="left" ><b> <font face="Arial" size="2">Employer 1:</font></b></td>
                <td  align="left" ><input type="text" name="Employer1" size="40" style="font-family: Arial; font-size: 10pt"/></td>
		    </tr>
            <tr>
				<td  align="left" ><b> <font face="Arial" size="2">City &amp; State:</font></b></td>
				<td  align="left" ><input type="text" name="City1" size="40" style="font-family: Arial; font-size: 10pt"/>
					<select type="text" name="empstate1" id="state" >
						<option value="">Select State</option>
						<?php
						 showStateOptionsDrop($states_arr, null, true);
						 ?>
					</select></td>
            </tr>
            <tr>
                <td  align="left" ><b> <font face="Arial" size="2">Job Title:</font></b></td>
                <td  align="left" ><input type="text" name="JobTitle1" size="40" style="font-family: Arial; font-size: 10pt"/></td>
            </tr>
            <tr>
                <td  align="left" ><b> <font face="Arial" size="2">Work Dates:</font></b></td>
                <td  align="left" ><b> <font face="Arial" size="2">From: </font></b>
                    <input type="text" name="FromDate1" size="10" style="font-family: Arial; font-size: 10pt" />
                        <b><font face="Arial" size="2">&nbsp; Through: </font></b>
                    <input type="text" name="ThruDate1" size="10" style="font-family: Arial; font-size: 10pt" /></td>
			</tr>
            <tr>
                <td  align="left" ><b> <font face="Arial" size="2">Duties:</font></b></td>
                <td  align="left" ><textarea rows="4" name="Duties1" cols="50" style="font-family: Arial; font-size: 10pt"></textarea></td>
            </tr>
            <tr>
                <td  height="20" align="center" colspan="2"><hr width="80%" noshade="noshade" color="#000000" /></td>
                
            </tr>

            <tr>
                <td  align="left" ><b> <font face="Arial" size="2">Employer 2:</font></b></td>
                <td  align="left" ><input type="text" name="Employer2" size="40" style="font-family: Arial; font-size: 10pt"/></td>
		    </tr>
            <tr>
				<td  align="left" ><b> <font face="Arial" size="2">City &amp; State:</font></b></td>
				<td  align="left" ><input type="text" name="City2" size="40" style="font-family: Arial; font-size: 10pt"/>
					<select type="text" name="empstate2" id="state" >
						<option value="">Select State</option>
						<?php
						 showStateOptionsDrop($states_arr, null, true);
						 ?>
					</select></td>
            </tr>
            <tr>
                <td  align="left" ><b> <font face="Arial" size="2">Job Title:</font></b></td>
                <td  align="left" ><input type="text" name="JobTitle2" size="40" style="font-family: Arial; font-size: 10pt"/></td>
            </tr>
            <tr>
                <td  align="left" ><b> <font face="Arial" size="2">Work Dates:</font></b></td>
                <td  align="left" ><b> <font face="Arial" size="2">From: </font></b>
                    <input type="text" name="FromDate2" size="10" style="font-family: Arial; font-size: 10pt" />
                        <b><font face="Arial" size="2">&nbsp; Through: </font></b>
                    <input type="text" name="ThruDate2" size="10" style="font-family: Arial; font-size: 10pt" /></td>
			</tr>
            <tr>
                <td  align="left" ><b> <font face="Arial" size="2">Duties:</font></b></td>
                <td  align="left" ><textarea rows="4" name="Duties2" cols="50" style="font-family: Arial; font-size: 10pt"></textarea></td>
            </tr>
            <tr>
                <td  height="20" align="center" colspan="2"><hr width="80%" noshade="noshade" color="#000000" /></td>
            </tr>

             <tr>
                <td  align="left" ><b> <font face="Arial" size="2">Employer 3:</font></b></td>
                <td  align="left" ><input type="text" name="Employer3" size="40" style="font-family: Arial; font-size: 10pt"/></td>
		    </tr>
            <tr>
				<td  align="left" ><b> <font face="Arial" size="2">City &amp; State:</font></b></td>
				<td  align="left" ><input type="text" name="City3" size="40" style="font-family: Arial; font-size: 10pt"/>
					<select type="text" name="empstate3" id="state" >
						<option value="">Select State</option>
						<?php
						 showStateOptionsDrop($states_arr, null, true);
						 ?>
					</select></td>
            </tr>
            <tr>
                <td  align="left" ><b> <font face="Arial" size="2">Job Title:</font></b></td>
                <td  align="left" ><input type="text" name="JobTitle3" size="40" style="font-family: Arial; font-size: 10pt"/></td>
            </tr>
            <tr>
                <td  align="left" ><b> <font face="Arial" size="2">Work Dates:</font></b></td>
                <td  align="left" ><b> <font face="Arial" size="2">From: </font></b>
                    <input type="text" name="FromDate3" size="10" style="font-family: Arial; font-size: 10pt" />
                        <b><font face="Arial" size="2">&nbsp; Through: </font></b>
                    <input type="text" name="ThruDate3" size="10" style="font-family: Arial; font-size: 10pt" /></td>
			</tr>
            <tr>
                <td  align="left" ><b> <font face="Arial" size="2">Duties:</font></b></td>
                <td  align="left" ><textarea rows="4" name="Duties3" cols="50" style="font-family: Arial; font-size: 10pt"></textarea></td>
            </tr>
                
           </tr>
            <tr><td colspan="2">&nbsp;</td></tr>
            <tr>
            <tr>
                <td colspan="2"  bgcolor="#CCCCCC"><strong>EDUCATIONAL BACKGROUND</strong>            	 </td>
           	</tr>
            <tr>
                <td align="left" ><b> <font face="Arial" size="2">School 1:</font></b></td>
                <td align="left" ><input type="text" name="School1" size="40" style="font-family: Arial; font-size: 10pt"/></td>
            </tr>
            <tr>
                <td align="left" ><b> <font face="Arial" size="2">City &amp; State:</font></b></td>
                <td align="left" ><input type="text" name="SchoolCity1" size="40" style="font-family: Arial; font-size: 10pt"/>
					<select type="text" name="schoolstate1" id="state" >
						<option value="">Select State</option>
						<?php
						 showStateOptionsDrop($states_arr, null, true);
						 ?>
					</select></td>
            </tr>
            <tr>
                <td align="left" ><b> <font face="Arial" size="2">Degree/Certificate:</font></b></td>
                <td align="left" ><input type="text" name="SchoolDegree1" size="40" style="font-family: Arial; font-size: 10pt" /></td>
            </tr>
            <tr>
                <td align="center" colspan="2" height="20"><hr noshade="noshade" color="#000000" width="80%" /></td>
            </tr>
			<tr>
                <td align="left" ><b> <font face="Arial" size="2">School 2:</font></b></td>
                <td align="left" ><input type="text" name="School2" size="40" style="font-family: Arial; font-size: 10pt"/></td>
            </tr>
            <tr>
                <td align="left" ><b> <font face="Arial" size="2">City &amp; State:</font></b></td>
                <td align="left" ><input type="text" name="SchoolCity2" size="40" style="font-family: Arial; font-size: 10pt"/>
					<select type="text" name="schoolstate2" id="state" >
						<option value="">Select State</option>
						<?php
						 showStateOptionsDrop($states_arr, null, true);
						 ?>
					</select></td>
            </tr>
            <tr>
                <td align="left" ><b> <font face="Arial" size="2">Degree/Certificate:</font></b></td>
                <td align="left" ><input type="text" name="SchoolDegree2" size="40" style="font-family: Arial; font-size: 10pt" /></td>
            </tr>
            <tr>
                <td align="center" colspan="2" height="20"><hr noshade="noshade" color="#000000" width="80%" /></td>
            </tr>
              <tr>
                <td align="left" ><b> <font face="Arial" size="2">School 3:</font></b></td>
                <td align="left" ><input type="text" name="School3" size="40" style="font-family: Arial; font-size: 10pt"/></td>
            </tr>
            <tr>
                <td align="left" ><b> <font face="Arial" size="2">City &amp; State:</font></b></td>
                <td align="left" ><input type="text" name="SchoolCity3" size="40" style="font-family: Arial; font-size: 10pt"/>
					<select type="text" name="schoolstate3" id="state" >
						<option value="">Select State</option>
						<?php
						 showStateOptionsDrop($states_arr, null, true);
						 ?>
					</select></td>
            </tr>
            <tr>
                <td align="left" ><b> <font face="Arial" size="2">Degree/Certificate:</font></b></td>
                <td align="left" ><input type="text" name="SchoolDegree3" size="40" style="font-family: Arial; font-size: 10pt" /></td>
            </tr>
            </tr>
            <tr><td colspan="2">&nbsp;</td></tr>
            <tr>
           <tr>
             	<td colspan="2"  bgcolor="#CCCCCC"><strong>SPECIAL TRAINING</strong></td>
           	</tr>
            <tr>
				<td colspan="2"> <textarea name="specialtraining" id="specialtraining" rows="4" cols="80" value=""></textarea> </td>
			</tr>
            </tr>
            <tr><td colspan="2">&nbsp;</td></tr>
            <tr>
            <tr>
             	<td colspan="2"  bgcolor="#CCCCCC"><strong>HONORS & AWARDS</strong> </td>
           	</tr>
            <tr>
				<td colspan="2"> <textarea name="honers" id="honers" rows="4" cols="80" value=""></textarea> </td>
			</tr>
            <tr><td colspan="2">&nbsp;</td></tr>
            <tr>
             	<td colspan="2"  bgcolor="#CCCCCC"><strong>ADDITIONAL INFORMATION</strong>            	 </td>
           	</tr>
            <tr>
				<td colspan="2"> <textarea name="additional" id="additional" rows="4" cols="80" value=""></textarea> </td>
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