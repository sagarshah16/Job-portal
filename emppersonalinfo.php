<?php ob_start(); ?>
<?php

session_start();

if (!isset($_SESSION['username'])) 
	{
		header('Location:index.php?profile=EMP');
	}
//include("Combo_Values.php");

$id=$_SESSION['userid'];
if(isset($id))
{
	include("./Class_Database.php");
	$db= new database();
	//$db->setup("root", "", "localhost", "jobportaldb");
	$Query="SELECT * from emp_personalinfo where id_user=$id"; 
	$res=$db->send_sql($Query);

	while($row = mysql_fetch_array( $res )) 
	{
			
			$companyname=stripslashes($row['companyname']); 
			$companyprofile=stripslashes($row['companyprofile']); 
			$companytype=stripslashes($row['companytype']);
			$contactpersonfirstname=stripslashes($row['contactpersonfirstname']);
			$contactpersonlastname=stripslashes($row['contactpersonlastname']);
			$designation=stripslashes($row['designation']);
			$phonenumber=stripslashes($row['phonenumber']);
			$mobilenumber=stripslashes($row['mobilenumber']);
			$email=stripslashes($row['email']);
			$url=stripslashes($row['url']);
			$address1=stripslashes($row['address1']);
			$address2=stripslashes($row['address2']);
			$city=stripslashes($row['city']);
			$state=stripslashes($row['state']);
			$zip=stripslashes($row['zip']);
			$country=stripslashes($row['country']);
					
			
			
	}
}
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Employeer - Company Information</title>
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
			else if (form.elements[i].type=="text" && form.elements[i].name=="email_c")
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
			else if(form.elements[i].name=="phonenumber_c")
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
			else if(form.elements[i].name=="url_c")
			{
			var regURL= /^[a-zA-Z0-9\-\.]+\.(com|org|net|mil|edu|COM|ORG|NET|MIL|EDU)/;	
			var url=form.elements[i].value;
				if(regURL.test(url)==false)
				{
					document.getElementById("errormessage").innerHTML="<b style='color:red'>Please Enter Valid URL</b>";
					form.elements[i].focus();
					return false;	
				}
			
			}
		}
		
		else
		{
			if(form.elements[i].name=="mobilenumber" && form.elements[i].value!="")
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
<div align="right" style="color:#045"><a href="" style="color:#045">Welcome <b style='color:#933'><?php  if (isset($_SESSION['username'])) echo $_SESSION['username']; ?></b></a>  , <a href="logout.php" style="color:#045">Logout</a></div>
	
	<?php include("header.html"); 
	include("empjobsearchbar.php");?>
    
	<div class="content"><!-- Content-->
  	<div style="width:100%"><!--Width-->
        	
       <!--FIRST COLUMN-->
      <div style="float:left; width:30%; background-color:#FFF;">
      	<div style="padding:10px; min-height:680px; background-color:#CCC">
        	<table border="0" cellpadding="0" cellspacing="0">
            <tr>
            	<td><label style="font-size:14px; font-weight:bold; cursor:pointer" onClick="">Employer Profile</label></td>
            </tr>
            <tr>
               	<td>
                <ul>
                    
		     <li><a href="emppersonalinfo.php" style="font-size:12px; font-weight:bold; color:#000; cursor:pointer" onClick="">Company Information</a></li>
		    		 <li><a href="empjobdetail.php" style="font-size:12px; font-weight:bold; cursor:pointer" onClick="">Post New Job</a></li>
	
		
                </ul>
               </td>
	</tr>
				 <tr>
            	<td><label style="font-size:14px; font-weight:bold; cursor:pointer; color:#000;float:left">Find Jobs</label></td>
            </tr>
            <tr>
            	<td>
                <ul style="text-align:left">
                <li style="margin:0px;"><a href="empadvancedsearch.php" style="font-size:12px; font-weight:bold; cursor:pointer;" onClick="">Advanced Search</a></li>
                </ul>
              	</td>
            </tr>
            <tr>
           		<td><label style="font-size:13px; font-weight:bold; cursor:pointer; color:#000;"><a href="empviewprofile.php">View Company Information</a></label></td>
      			 </tr>
				<tr>
            	<td><label style="font-size:13px; font-weight:bold; cursor:pointer"><a href="empviewjobdetail.php"></br>View Posted Job</a></label></td>
                </tr>
          		 
            <tr>
           		
      			 </tr>
                 <tr>
           		<td><label style="font-size:13px; font-weight:bold; cursor:pointer; color:#000;"><a href="empjobapplications.php"></br>View Job Applications</a></label></td>
      			 </tr>
            
           <tr>
            	<td><label style="font-size:14px; font-weight:bold; cursor:pointer; float:left">
                <a href="empinbox.php"><br/>Inbox</a></label></td>
            </tr>
             <tr>
            	<td><label style="font-size:14px; font-weight:bold; cursor:pointer; float:left">
                <a href="empsentmessage.php"><br/>Sent Message</a></label></td>
            </tr>
             <tr>
            	<td><label style="font-size:14px; font-weight:bold; cursor:pointer; float:left">
                <a href="emptrash.php"><br/>Trash</a></label></td>
            </tr>
            </table>
      	</div>
      </div>
      <!--FIRST COLUMN-->
      
      <!--SECOND COLUMN-->
      <div style="float:left; width:70%; background-color:#FFF">
      	<div style="padding:10px">
                <hr size="1" color="#069"  align="center">
	         <h2>Company Information</h2>
        <hr size="1" color="#069"  align="center">
             
             <form name="form1" method="post" action="emppersonalinfosave.php" onSubmit="return ValidateForm(this)">
			 <table border="0" cellpadding="0px" cellspacing="0" style="font-family:Verdana, Geneva, sans-serif; font-size:12px">
             <tr>
            	<td id="errormessage" colspan="2" align="left">
                <?php
					if(isset($_GET['e']) && $_GET['e']==1)
						echo "<b style='color:red'>Please Enter Firstname!</b>";	
					else if(isset($_GET['e']) && $_GET['e']==2)
						echo "<b style='color:red'>Please Enter Lastname!</b>";	
					else if(isset($_GET['e']) && $_GET['e']==3)
						echo "<b style='color:red'>Please Enter Companyname!!</b>";
					else if(isset($_GET['e']) && $_GET['e']==4)
						echo "<b style='color:red'>Please Enter Company Profile!</b>";
					else if(isset($_GET['e']) && $_GET['e']==5)
						echo "<b style='color:red'>Please Enter Phonenumber!</b>";	
					else if(isset($_GET['e']) && $_GET['e']==6)
						echo "<b style='color:red'>Please Enter Address!</b>";	
					else if(isset($_GET['e']) && $_GET['e']==7)
						echo "<b style='color:red'>Please Enter URL!</b>";
					else if(isset($_GET['e']) && $_GET['e']==8)
						echo "<b style='color:red'>Please Enter Email!</b>";	
					else if(isset($_GET['e']) && $_GET['e']==9)
						echo "<b style='color:red'>Please Enter City!</b>";
					else if(isset($_GET['e']) && $_GET['e']==10)
						echo "<b style='color:red'>Please Enter Zip!</b>";
					else if(isset($_GET['e']) && $_GET['e']==11)
						echo "<b style='color:red'>Please Select Company Type!</b>";
					else if(isset($_GET['e']) && $_GET['e']==12)
						echo "<b style='color:red'>Please Select State!</b>";
					else if(isset($_GET['e']) && $_GET['e']==13)
						echo "<b style='color:red'>Please Select Country!</b>";
					else if(isset($_GET['e']) && $_GET['e']==14)
						echo "<b style='color:red'>Please Enter Proper Email Address!</b>";
					else if(isset($_GET['e']) && $_GET['e']==15)
						echo "<b style='color:red'>Please Enter Proper URL!</b>";
					else if(isset($_GET['e']) && $_GET['e']==16)
						echo "<b style='color:red'>Please Enter Proper Zipcode!</b>";
					else if(isset($_GET['e']) && $_GET['e']==17)
						echo "<b style='color:red'>Please Enter Proper Phone Number!</b>";
				
				?>
                </td>
             </tr>
             
             <tr>
             	<td align="right" style="padding-right:5px">
                <label style="color:red; font-weight:bold">*</label><label style="font-weight:bold">Comapny Name:</label>
                </td>
                <td>
                <input placeholder="Enter Company Name" name="companyname_c" value="<?php if(isset($companyname)) echo $companyname;?>">
                </td>
             </tr>
             
             <tr>
             	<td align="right" style="padding-right:5px">
                <label style="color:red; font-weight:bold">*</label><label style="font-weight:bold">Comapny Profile:</label>
                </td>
                <td>
                <textarea placeholder="Enter Company Profile" name="companyprofile_c" value="<?php if(isset($companyprofile)) echo $companyprofile;?>" rows="6" cols="50"><?php if(isset($companyprofile)) echo $companyprofile;?></textarea>
                </td>
             </tr>
             
              <tr>
              	<td align="right" style="padding-right:5px"><label style="color:red; font-weight:bold">*</label><label style="font-weight:bold">Company Type:</label></td>
                <td>
                <select name="companytype_c"  id="dropdown1" title="Select Company Type!!">
                	<option value="">Select Company Type</option>
					<?php 
					if(isset($companytype) && $companytype!="0")
						showCompanyName_arrOptionsDrop($CompanyName_arr, $companytype, true);
					else
						showCompanyName_arrOptionsDrop($CompanyName_arr, null, true);
					?>
                </select>
               	</td>
              </tr>
             
             <tr>
             	<td align="right" style="padding-right:5px">
               <label style="color:red; font-weight:bold">*</label> <label style="font-weight:bold">Contact Person FirstName:</label>
                </td>
                <td>
                <input placeholder="Enter Contact Person Firstname" name="contactpersonfirstname_c" value="<?php if(isset($contactpersonfirstname)) echo $contactpersonfirstname;?>">
                </td>
             </tr>
                 <tr>
             	<td align="right" style="padding-right:5px">
                <label style="color:red; font-weight:bold">*</label><label style="font-weight:bold">Contact Person Last Name:</label>
                </td>
                <td>
                <input placeholder="Enter Contact Person Lastname" name="contactpersonlastname_c" value="<?php if(isset($contactpersonlastname)) echo $contactpersonlastname;?>">
                </td>
             </tr>
             <tr>
             	<td align="right" style="padding-right:5px">
                <label style="font-weight:bold">Designation:</label>
                </td>
                <td>
                <input placeholder="Enter Designation" name="designation" value="<?php if(isset($designation)) echo $designation;?>">
                </td>
             </tr>
             
             <tr>
             	<td align="right" style="padding-right:5px">
                <label style="color:red; font-weight:bold">*</label><label style="font-weight:bold">Phone Number:</label>
                </td>
                <td>
                <input placeholder="Enter Phone Number" name="phonenumber_c" value="<?php if(isset($phonenumber)) echo $phonenumber;?>">
                </td>
             </tr>
		
         	<tr>
             	<td align="right" style="padding-right:5px">
                <label style="font-weight:bold">Mobile Number:</label>
                </td>
                <td>
                <input placeholder="Enter Mobile Number" name="mobilenumber" value="<?php if(isset($mobilenumber)) echo $mobilenumber;?>">
                </td>
             </tr>
             
             <tr>
             	<td align="right" style="padding-right:5px">
                <label style="color:red; font-weight:bold">*</label><label style="font-weight:bold">E-mail:</label>
                </td>
                <td>
                <input placeholder="Enter E-mail" name="email_c" value="<?php if(isset($email)) echo $email;?>">
                </td>
             </tr>
             
             <tr>
             	<td align="right" style="padding-right:5px"> 
                <label style="color:red; font-weight:bold">*</label><label style="font-weight:bold">URL:</label>
                </td>
                <td>
                <input placeholder="Enter Website URL" name="url_c" value="<?php if(isset($url)) echo $url;?>">
                </td>
             </tr>
             
             <tr>
             	<td align="right" style="padding-right:5px">
                <label style="color:red; font-weight:bold">*</label><label style="font-weight:bold">Address 1:</label>
                </td>
                <td>
                <input placeholder="Enter Address 1" name="address1_c" value="<?php if(isset($address1)) echo $address1;?>">
                </td>
             </tr>
             
             <tr>
             	<td align="right" style="padding-right:5px">
                <label style="color:red; font-weight:bold">*</label><label style="font-weight:bold">Address 2:</label>
                </td>
                <td>
                <input placeholder="Enter Address 2" name="address2_c" value="<?php if(isset($address2)) echo $address2;?>">
                </td>
             </tr>
             
             <tr>
             	<td align="right" style="padding-right:5px">
                <label style="color:red; font-weight:bold">*</label><label style="font-weight:bold">City:</label>
                </td>
                <td>
                <input placeholder="Enter City" name="city_c" value="<?php if(isset($city)) echo $city;?>">
                </td>
             </tr>
             
             <tr>
             	<td align="right" style="padding-right:5px"><label style="color:red; font-weight:bold">*</label><label style="font-weight:bold">State:</label></td>
                <td>
               <select name="state_c"  id="dropdown2" title="Select State">
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
             	<td align="right" style="padding-right:5px">
                <label style="color:red; font-weight:bold">*</label><label style="font-weight:bold">Zip:</label>
                </td>
                <td>
                <input placeholder="Enter Zipcode" name="zip_c" value="<?php if(isset($zip)) echo $zip;?>">
                </td>
             </tr>
             
             <tr>
             	<td align="right" style="padding-right:5px"><label style="color:red; font-weight:bold">*</label><label style="font-weight:bold">Country:</label></td>
                <td>
                <select name="country_c"  id="dropdown3" title="Select Country">
                <option value="">Select Country</option>
				<?php
                if(isset($country) && $country!="0")
                	showCountryOptionsDrop($country_arr, $country, true);
                else
                 showCountryOptionsDrop($country_arr, null, true);
				?>
                </select>
                </td>
            </tr>
         
 		</table>
        <div align="right"><input class="button" type="submit" name="submit" id="submit" value="Submit" /> 
             <?php	if(isset($_POST['id_emp']) && $_POST['id_emp']!=""){	?>
            <a class="button" name="cancel" value="Cancel" href="empviewjobdetail.php" />Cancel</a>
             <?php } else { ?>
            <a class="button" name="reset" value="Reset" href="emppersonalinfo.php" />Reset</a>
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