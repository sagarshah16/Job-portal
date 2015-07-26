<?php ob_start(); ?>
<?php

session_start();

if (!isset($_SESSION['username'])) 
	{
		header('Location:index.php');
	}

$id_user=$_SESSION["userid"];

	if(isset($id_user))
	{
		include ("./Class_Database.php");
		$db= new database();
		//$db->setup("root", "", "localhost", "jobportaldb");
		$query="SELECT * from js_personalinfo where id_user=$id_user"; 
		$res=$db->send_sql($query);
			while($row = mysql_fetch_array( $res )) 
			{
				$firstname=stripslashes($row['fname']);
				$lastname=stripslashes($row['lname']); 
				$address1=stripslashes($row['address1']);
				$address2=stripslashes($row['address2']);
				$city=stripslashes($row['city']);
				$state=stripslashes($row['state']);
				$zip=stripslashes($row['Zip']);
				$country=stripslashes($row['country']);
				$email=stripslashes($row['email']);
				$mphone=stripslashes($row['primarycontact_js']) ;
				$contactp=stripslashes($row['contactpreference_js']);
				$workauthorization=stripslashes($row["workauthorization"]);
				$year=stripslashes($row['birthyear_js']);
				$month=stripslashes($row['birthmonth_js']);
				$day=stripslashes($row['birthday_js']);
				$gender=stripslashes($row['gender_js']);
				$ethnicity=stripslashes($row['ethnicity_js']);
				$Blood_group=stripslashes($row['bloodgroup_js']);
			}
	}
 
	
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Job Seeker - Personal Information</title>
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
			else if(form.elements[i].name=="email_c")
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
			else if(form.elements[i].name=="phone_c")
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
			
			else if(form.elements[i].name=="zip_c")
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

<style type="text/css">


td:first-child
{ text-align:right
}

</style>

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
                    <li style="margin:0px"><a href="jspersonalinfo.php" style="font-size:12px; font-weight:bold; color:#333; cursor:pointer">Personal</a></li>
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
	         <h2>Personal Information</h2>
             <hr size="1" color="#069"  align="center">
                          
             <form name="form1" method="post" action="jspersonalinfoedit.php"  onSubmit="return ValidateForm(this)">
                 <table border="0" cellpadding="5px" cellspacing="0" style="font-family:Verdana, Geneva, sans-serif; font-size:12px">
                 
                 <tr>
            	<td id="errormessage" colspan="2" style="text-align:left">
                <?php
						if(isset($_GET['e']) && $_GET['e']==1)
						echo "<b style='color:red'>Please Enter Firstname!</b>";	
						else if(isset($_GET['e']) && $_GET['e']==2)
						echo "<b style='color:red'>Please Enter Lastname!</b>";
						else if(isset($_GET['e']) && $_GET['e']==3)
						echo "<b style='color:red'>Please Enter Address!</b>";	
						else if(isset($_GET['e']) && $_GET['e']==4)
						echo "<b style='color:red'>Please Enter City!</b>";
						else if(isset($_GET['e']) && $_GET['e']==5)
						echo "<b style='color:red'>Please Select State!</b>";
						else if(isset($_GET['e']) && $_GET['e']==6)
						echo "<b style='color:red'>Please Enter Zipcode!</b>";
						else if(isset($_GET['e']) && $_GET['e']==7)
						echo "<b style='color:red'>Please Select Country!</b>";
						else if(isset($_GET['e']) && $_GET['e']==7)
						echo "<b style='color:red'>Please Enter Email!</b>";
						else if(isset($_GET['e']) && $_GET['e']==9)
						echo "<b style='color:red'>Please Enter Phonenumber!</b>";
						else if(isset($_GET['e']) && $_GET['e']==10)
						echo "<b style='color:red'>Please Enter Proper Zipcode!</b>";
						else if(isset($_GET['e']) && $_GET['e']==11)
						echo "<b style='color:red'>Please Enter Proper Email Address!</b>";
						else if(isset($_GET['e']) && $_GET['e']==12)
						echo "<b style='color:red'>Please Enter Proper Phone Number!</b>";	
				?>
                </td>
             </tr>
                     <tr>
                         <td width="159"><label style="color:red; font-weight:bold">*</label><label style="font-weight:bold">First Name:</label></td>
                         <td colspan="3">
                            <input type="text" placeholder="Enter First Name" name="firstname_c" value="<?php if(isset($firstname)) echo $firstname; else $firstname="";?>"> </td>
                     </tr>
                     <tr>
                         <td><label style="color:red; font-weight:bold">*</label><label style="font-weight:bold">Last Name:</label></td>
                         <td colspan="4">
                         <input type="text" name="lastname_c" placeholder="Enter Last Name" value="<?php if(isset($lastname))echo $lastname; else $lastname=""; ?>" />                  </td>
                     </tr>
                     
                     <tr>
                        <td><label style="color:red; font-weight:bold">*</label><label style="font-weight:bold">Address1:</label></td>
                        <td colspan="4">
                          <input type="text" name="address1_c" placeholder="Enter Address" value="<?php if(isset($address1))echo $address1; else $address1=""; ?>">                        </td>
                     </tr>
                     
                     <tr>
                        <td><label style="font-weight:bold">Address2:</label></td>
                        <td colspan="4">
                          <input type="text" name="address2" placeholder="Enter Address" value="<?php if(isset($address2))echo $address2; else $address2=""; ?>" />                        </td>
                    </tr>
                    
                    <tr>
                        <td><label style="color:red; font-weight:bold">*</label><label style="font-weight:bold">City:</label></td>
                        <td colspan="4">
                          <input type="text" name="city_c" placeholder="Enter City" value="<?php if(isset($city))echo $city; else $city=""; ?>"></td>
                    </tr>
                    
                    <tr>
                        <td><label style="color:red; font-weight:bold">*</label><label style="font-weight:bold">State:</label></td>
                        <td colspan="4">
                          <select name="state_c" id="dropdown" title="Select State"> 
                <option value="">Select State</option>
				<?php
                if(isset($state) && $state!="0")
                	showStateOptionsDrop($states_arr, $state, true);
                else
                 showStateOptionsDrop($states_arr, null, true);
				?>
                </select>
                            	
						</td>
                    </tr>
                    
                    <tr>
                        <td><label style="color:red; font-weight:bold">*</label><label style="font-weight:bold">Zipcode:</label></td>
                        <td colspan="4">
                          <input type="text" name="zip_c" placeholder="Enter Zipcode" value="<?php if(isset($zip))echo $zip; else $zip=""; ?>" /></td>
                    </tr>
                    
                    <tr>
                        <td><label style="color:red; font-weight:bold">*</label><label style="font-weight:bold">Country:</label></td>
                        <td colspan="4">
                         <select name="country_c"  id="dropdown1" title="Select Country">
                <option value="">Select Country</option>
				<?php
                if(isset($country) && $country!="0")
                	showCountryOptionsDrop($country_arr, $country, true);
                else
                 showCountryOptionsDrop($country_arr, null, true);
				?>
                </select> </td>
                    </tr>
                    
                    <tr>
                        <td><label style="color:red; font-weight:bold">*</label><label style="font-weight:bold">Email Address:</label></td>
                        <td colspan="4">
                        <input type="text" name="email_c" placeholder="Enter Email Address" value="<?php if(isset($email))echo $email; else $email=""; ?>"> 			            	</td>
                    </tr>
                    
                    <tr>
                        <td><label style="color:red; font-weight:bold">*</label><label style="font-weight:bold">Phone Number:</label></td>
                        <td colspan="4">
                          <input type="text" name="phone_c" maxlength="10" placeholder="Enter Phone Number"  value="<?php if(isset($mphone))echo $mphone; else $mphone=""; ?>">                        </td>
                   </tr>
                   
                   <tr>
                    <td><label style="font-weight:bold">Contact Preference:</label></td>
                    <td colspan="4">
                      <select name="contactp"  id="dropdown" title="Select Contact Preference">
                        <option value="">Select Contact Preference</option>
                         <?php 
						if (isset($contactp) && $contactp!="0")
							showContactPreferenceOptionsDrop($contactPref_arr, $contactp, true);
						else
							showContactPreferenceOptionsDrop($contactPref_arr, null , true);
						 ?>
                        </select> </td>
                   </tr>
                   <tr>
     <td> <label style="font-weight:bold;">Work Authorization:</label></td>
	
            <td>
            	<select name="workauthorization">
                <option value="">Select Work Authorization</option>
                <option value="U.S. Citizen"<?php if(isset($workauthorization) && $workauthorization!="") {if ( strpos($workauthorization, 'U.S. Citizen') !== false) {echo "selected='selected' " ; } }
					else {echo ''; }	?>>U.S. Citizen</option>
				                     
				<option value="Permanent Resident (U.S.)"<?php if(isset($workauthorization) && $workauthorization!="")  {if ( strpos($workauthorization, 'Permanent Resident (U.S.)') !== false) {echo "selected='selected' " ; } }
					else {echo ''; }	?>>Permanent Resident (U.S.)</option>
				<option value="Student (F-1) Visa"<?php if(isset($workauthorization) && $workauthorization!="")  {if ( strpos($workauthorization, 'Student (F-1) Visa') !== false) {echo "selected='selected' " ; }} 
					else {echo ''; }	?>>Student (F-1) Visa</option>
				<option value="Employment (H-1) Visa"<?php if(isset($workauthorization) && $workauthorization!="")  {if ( strpos($workauthorization, 'Employment (H-1) Visa') !== false) {echo "selected='selected' " ; } }
					else {echo ''; }	?>>Employment (H-1) Visa</option>
				<option value="J1 Visa"<?php if(isset($workauthorization) && $workauthorization!="")  {if ( strpos($workauthorization, 'J1 Visa') !== false) {echo "selected='selected' " ; } 
					else {echo ''; }}	?>>J1 Visa</option>
                    <option value="Other"<?php if(isset($workauthorization) && $workauthorization!="")  {if ( strpos($workauthorization, 'Other') !== false) {echo "selected='selected' " ; } 
					else {echo ''; }}	?>>Other</option>
                
                </select>
            </td>
	</tr>
                  
                  <tr>
                    <td><label style="font-weight:bold">Birthdate:</label></td>
                    <td>
                      <select name="month" id="month">
                        <option value="">Select Month</option>
                        <?php 
						if (isset($month) && $month!="0")
							showMonthOptionsDrop($month_arr, $month, true);
						else
							showMonthOptionsDrop($month_arr, null , true);
						 ?>
                      </select>
                      <select name="day" id="day">
                        <!--<option selected="selected">
                        <?php //if(isset($day))echo $day; else $day="Please select"; ?></option>-->
                        <option value="">Select Day</option>
                        <?php
                            for ($i=1;$i<=31;$i++)
                            {
                                echo "<option value='" . $i . "'";
                                if(isset($day) && intval($day)==$i) 
                                {
                                    echo "selected='selected' " ; 
                                }
                                echo ">" . $i ."</option>";
                            }
                        ?>
                        </select>
                        <select name="year" id="year">
                        <option value="">Select Year</option>
                        <?php
                            for ($i=date("Y");$i>=1900;$i--)
                            {
                                echo "<option value='" . $i . "'";
                                if(isset($year) && intval($year)==$i) 
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
                    <td><label style="font-weight:bold">Gender:</label></td>
                    <td colspan="4">
                      <select name="gender">
                       <option value="">Select Gender</option>
                        <?php 
						if (isset($gender) && $gender!="0")
							showGenderOptionsDrop($gender_arr, $gender, true);
						else
							showGenderOptionsDrop($gender_arr, null , true);
						 ?>
                        </select> 
					</td>
                   </tr>
                  
                  <tr>
                    <td><label style="font-weight:bold">Ethnicity:</label></td>
                    <td colspan="4">
                      <select name="ethnicity">
                        <option value="">Select Ethnicity</option>
                        <?php 
						if (isset($ethnicity) && $ethnicity!="0")
							showEthnicityOptionsDrop($ethnicity_arr, $ethnicity, true);
						else
							showEthnicityOptionsDrop($ethnicity_arr, null , true);
						 ?>
                        </select>
					</td>
                   </tr>
                  
                  <tr>
                    <td><label style="font-weight:bold">Blood Group:</label></td>
                    <td colspan="4"><select name="Bloodgroup">
                      <option value="">Select Blood Group</option>
                           <?php 
						if (isset($Blood_group) && $Blood_group!="0")
							showBloodOptionsDrop($blood_arr, $Blood_group, true);
						else
							showBloodOptionsDrop($blood_arr, null , true);
						 ?>
                      </select>
					 </td>
                   </tr>
              
            </table>
              <div align="right"><input class="button" type="submit" name="submit" id="submit" value="Submit" /> 
             <?php	if(isset($_POST['id_js']) && $_POST['id_js']!=""){	?>
            <a class="button" name="cancel" value="Cancel" href="jsviewprofile.php" />Cancel</a>
             <?php } else { ?>
            <a class="button" name="reset" value="Reset" href="jspersonalinfo.php" />Reset</a>
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