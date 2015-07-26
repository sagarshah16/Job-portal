<?php ob_start(); ?>
<?php

session_start();

if (!isset($_SESSION['username'])) 
	{
		header('Location:index.php?profile=EMP');
	}
//include("Combo_Values.php");

if(isset($_POST['id_job']) && $_POST['id_job']!="")
{
	
	include("./Class_Database.php");
	$db= new database();
	//$db->setup("kaushal", "kaushal", "localhost", "jobportaldb");	
  	$id_user=$_SESSION["userid"];
	$id_job=$_POST['id_job'];
	$query="Select * from emp_jobdetails  where id_job=$id_job and id_user=$id_user";
	if($res=$db->send_sql($query))
	{
		if (mysql_num_rows($res)>0)
		{
			while ($row = mysql_fetch_array($res))
			
			{
				$title=stripslashes($row["title"]);
				$jobfunction=stripslashes($row["jobfunction"]);
				$industry=stripslashes($row["industry"]);
				$postiontype=stripslashes($row["postiontype"]);
				$jobdescription=stripslashes($row["jobdescription"]);
				$qualificationdesc=stripslashes($row["qualificationdesc"]);
				$SalaryRange=stripslashes($row["SalaryRange"]);
				$city=stripslashes($row["city"]);
				$state=stripslashes($row["state"]);
				$zip=stripslashes($row["zip"]);
				$country=stripslashes($row["country"]);
				$pday=stripslashes($row["pday"]);
				$pmonth=stripslashes($row["pmonth"]);
				$pyear=stripslashes($row["pyear"]);
				$eday=stripslashes($row["eday"]);
				$emonth=stripslashes($row["emonth"]);
				$eyear=stripslashes($row["eyear"]);
				$dsday=stripslashes($row["dsday"]);
				$dsmonth=stripslashes($row["dsmonth"]);
				$dsyear=stripslashes($row["dsyear"]);
				$deday=stripslashes($row["deday"]);
				$demonth=stripslashes($row["demonth"]);
				$deyear=stripslashes($row["deyear"]);
				$workauthorization=stripslashes($row["workauthorization"]);
				$keyword=stripslashes($row["keyword"]);
				$dcprofiledesciprion=stripslashes($row["dcprofiledesciprion"]);
				$dcqualificationdesc=stripslashes($row["dcqualificationdesc"]);
				$experiencerequirement=stripslashes($row["experiencerequirement"]);
				
			}
		}
	}
	
}
			
			
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Employer - Job Details</title>
<link rel="stylesheet" type="text/css" media="screen" href="css/maincss.css">
<style type="text/css">

tr
{
text-align:left;
vertical-align:top;
}
td
{
	
}
</style>
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
			
			else if(form.elements[i].type=="checkbox")
			{
				var checkbox=document.getElementsByName("postiontype_c[]");
				//alert(checkbox.length);
				var flag=0;
				for(var k=0;k<checkbox.length;k++)
				{
					if(checkbox[k].checked)
					{
						flag=flag+1;	
					}
					
				}
				if(flag==0)
				{
					document.getElementById("errormessage").innerHTML="<b style='color:red'>Please check the postion type</b>";
					form.elements[i].focus();
					return false;
				}
			 
			}
			
		}
		else
		{
			if(form.elements[i].name=="zip" && form.elements[i].value!="")
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
<div align="right" style="color:#045"><a href="" style="color:#045">Welcome <b style='color:#933'><?php  if (isset($_SESSION['username'])) echo $_SESSION['username']; ?></b></a>  , <a href="logout.php" style="color:#045">Logout</a></div>
	
<?php include("header.html"); 
	include("empjobsearchbar.php");?>
    
	<div class="content"><!-- Content-->
  	<div style="width:100%"><!--Width-->
        	
       <!--FIRST COLUMN-->
      <div style="float:left; width:30%; background-color:#FFF;">
      	<div style="padding:10px; min-height:1040px; background-color:#CCC">
        	<table border="0" cellpadding="0" cellspacing="0">
            <tr>
            	<td><label style="font-size:14px; font-weight:bold; cursor:pointer" onClick="">Employer Profile</label></td>
            </tr>
            <tr>
               	<td>
                <ul>
                    
		     <li><a href="emppersonalinfo.php" style="font-size:12px; font-weight:bold;  cursor:pointer" onClick="">Company Information</a></li>
		    		 <li><a href="empjobdetail.php" style="font-size:12px; font-weight:bold; color:#000;cursor:pointer" onClick="">Post New Job</a></li>
	
		
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
	         <h2>New Job Detail Information</h2>
                     <hr size="1" color="#069"  align="center">

             <form name="form1" method="post" action="empjobdetailsave.php" onSubmit="return ValidateForm(this)">
			 <table border="0" cellpadding="1px" cellspacing="0" style="font-family:Verdana, Geneva, sans-serif; font-size:12px" >
             
             <tr>
            	<td id="errormessage" colspan="2" align="left">
                <?php
					if(isset($_GET['e']) && $_GET['e']==1)
						echo "<b style='color:red'>Please Enter Job Title!</b>";	
					else if(isset($_GET['e']) && $_GET['e']==2)
						echo "<b style='color:red'>Please Select Job Function!</b>";	
					else if(isset($_GET['e']) && $_GET['e']==3)
						echo "<b style='color:red'>Please Select Industry!</b>";
					else if(isset($_GET['e']) && $_GET['e']==4)
						echo "<b style='color:red'>Please Select Position type!</b>";	
					else if(isset($_GET['e']) && $_GET['e']==5)
						echo "<b style='color:red'>Please Enter Job Description!</b>";
					else if(isset($_GET['e']) && $_GET['e']==6)
						echo "<b style='color:red'>Please Enter Qualification Description!</b>";
					else if(isset($_GET['e']) && $_GET['e']==7)
						echo "<b style='color:red'>Please Select Posting date!</b>";	
					else if(isset($_GET['e']) && $_GET['e']==8)
						echo "<b style='color:red'>Please Select Candidate Profile Description!</b>";
						
				?>
                </td>
             </tr>
             
             <input type="hidden" name="id_job" value="<?php if(isset($_POST['id_job']) && $_POST['id_job']!="") echo $_POST['id_job'] ; else echo "";?>">
             
             <tr>
            	<td>  <label style="color:red; font-weight:bold">*</label><label style="font-weight:bold">Job Title:</label>
            	 </td>
                   <td><input type="text" name="title_c" id="title"  placeholder="Enter Job Title " value="<?php if(isset($title) && $title!="")echo $title; ?>">
                 </td>
             </tr>
              <tr>
    	<td>  <label style="color:red; font-weight:bold">*</label><label style="font-weight:bold">Job Function:</label>
    	  </td>
	            <td>
            	  <select name="jobfunction_c" id="dropdown" title="Select Functional Area">
               	<option value="">Select Functional Area</option>
                 <?php 
						if (isset($jobfunction) && $jobfunction!="0")
							showFunctionalAreaOptionsDrop($functional_arr, $jobfunction, true);
						
						else
							showFunctionalAreaOptionsDrop($functional_arr, null , true);
						 ?>
                </select>
                
            </td>
	</tr>
 <tr>
    	<td>  <label style="color:red; font-weight:bold">*</label><label style="font-weight:bold">Industry:</label>
    	  </td>
	            <td>
            	 <select name="industry_c" id="dropdown1" title="Select Industry">
               	<option value="">Select Industry</option>
                 <?php 
						if (isset($industry) && $industry!="0")
							showIndustryOptionsDrop($industry_arr, $industry, true);
						
						else
							showIndustryOptionsDrop($industry_arr, null , true);
						 ?>
                </select>
                
            </td>
	</tr>
    
     <tr>
             	<th valign="top" > <label style="color:red; font-weight:bold">*</label><label style="font-weight:bold">Postion Type:</label></th>
                    <td><input type="checkbox" name="postiontype_c[]" value="Fulltime" <?php if(isset($postiontype) && $postiontype!=""){if (strpos($postiontype, 'Fulltime') !== false) {echo 'checked'; } }
					else {echo ''; }	?>/>Fulltime
     	        	<input type="checkbox" name="postiontype_c[]" value="Parttime"<?php  if(isset($postiontype) && $postiontype!=""){if(strpos($postiontype, 'Parttime') !== false) {echo 'checked'; } }
					else {echo ''; }	?> />Partime
	        		<input type="checkbox" name="postiontype_c[]" value="Internship"<?php  if(isset($postiontype) && $postiontype!=""){if(strpos($postiontype, 'Internship') !== false) {echo 'checked'; }} 
					else {echo ''; }	?> />Internship<br/>
                 </td>
             </tr>
             <tr>
        <td> <label style="color:red; font-weight:bold">*</label><label style="font-weight:bold">Job Description:</label></td>
                 <td>
                 <textarea placeholder="Enter Job Description" name="jobdescription_c" value="" rows="6" cols="50"><?php if(isset($jobdescription)) echo $jobdescription;?></textarea>
                </td>
                    
             </tr>  
             
             <tr> 
    <td valign="top"><label style="color:red; font-weight:bold">*</label> <label style="font-weight:bold">Qualification Description:</label></td>     
	       	<td>
             <textarea placeholder="Enter Qualification Description" name="qualificationdesc_c" value="" rows="6" cols="50"><?php if(isset($qualificationdesc)) echo $qualificationdesc;?></textarea>
           </td>
      </tr>
             
            
             
            
             
             <tr>
        <td> <label style="font-weight:bold">Salary:</label><label style="color:red; font-weight:bold"></label></td>
		<td><select name="SalaryRange" id="SalaryRange">
            	<option value="">Select Salary Range</option>
                 <?php 
						if (isset($SalaryRange) && $SalaryRange!="0")
							showSalaryOptionsDrop($salary_arr, $SalaryRange, true);
						
						else
							showSalaryOptionsDrop($salary_arr, null , true);
						 ?>
                
               </select>
            </td>

		 </tr>
             
<tr>
                <td><label style="font-weight:bold">Job Location City:</label>
                  <label style="color:red; font-weight:bold"></label></td>
                	<td><input type="text" name="city" placeholder="Enter City" value="<?php if(isset($city))echo $city; else $city=""; ?>"> 
                </td>
            </tr>
            
            <tr>
            	
                <td><label style="font-weight:bold">State:</label><label style="color:red; font-weight:bold"></label></td>
                <td>
                	<select name="state">
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
            	
                <td><label style="font-weight:bold">Zipcode:</label><label style="color:red; font-weight:bold"></label></td>
                	<td><input type="text" name="zip" placeholder="Enter Zipcode" value="<?php if(isset($zip))echo $zip; else $zip=""; ?>" />
                </td>
            </tr>
            
            <tr>
            	
                <td><label style="font-weight:bold">Country:</label><label style="color:red; font-weight:bold"></label></td>
                <td>
                	 <select name="country">
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
	      <tr>
          <td><label style="color:red; font-weight:bold">*</label><label style="font-weight:bold">Job Posting Date:</label></td>
          
            <td colspan="2">
                <select name="pday_c" id="dropdown2" title="Select Job Posting Date">
                <!--<option selected="selected">
				<?php //if(isset($day))echo $day; else $day="Please select"; ?></option>-->
                <option value="">Select Day</option>
                <?php
					for ($i=1;$i<=31;$i++)
					{
						echo "<option value='" . $i . "'";
						if(isset($pday) && intval($pday)==$i) 
						{
							echo "selected='selected' " ; 
						}
						echo ">" . $i ."</option>";
					}
				?>
                </select>
                <select name="pmonth_c" id="dropdown3" title="Select Job Posting Date">
                <option value="">Select Month</option>
                <?php 
						if (isset($pmonth) && $pmonth!="0")
							showMonthOptionsDrop($month_arr, $pmonth, true);
						
						else
							showMonthOptionsDrop($month_arr, null , true);
						 ?>
                </select>
                <select name="pyear_c" id="dropdown4" title="Select Job Posting Date">
                <!--<option selected="selected"><?php //if(isset($year))echo $year; else $year="Please select"; ?></option>-->
                <option value="">Select Year</option>
                <?php
					for ($i=date("Y")+6;$i>=1900;$i--)
					{
						echo "<option value='" . $i . "'";
						if(isset($pyear) && intval($pyear)==$i) 
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
<td> <label style="font-weight:bold">Job Expiration Date:</label></td>
          	
            <td colspan="3">
              <select name="eday" id="eday">
                <!--<option selected="selected">
				<?php //if(isset($day))echo $day; else $day="Please select"; ?></option>-->
                <option value="">Select Day</option>
                <?php
					for ($i=1;$i<=31;$i++)
					{
						echo "<option value='" . $i . "'";
						if(isset($eday) && intval($eday)==$i) 
						{
							echo "selected='selected' " ; 
						}
						echo ">" . $i ."</option>";
					}
				?>
                </select>              <select name="emonth" id="emonth">
                  
                  <option value="">Select Month</option>
                  <?php 
						if (isset($emonth) && $emonth!="0")
							showMonthOptionsDrop($month_arr, $emonth, true);
						
						else
							showMonthOptionsDrop($month_arr, null , true);
						 ?>
                  </select>
              <select name="eyear" id="eyear">
                <!--<option selected="selected"><?php //if(isset($year))echo $year; else $year="Please select"; ?></option>-->
                <option value="">Select Year</option>
                <?php
					for ($i=date("Y")+6;$i>=1900;$i--)
					{
						echo "<option value='" . $i . "'";
						if(isset($eyear) && intval($eyear)==$i) 
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
     <td> <label style="font-weight:bold">Desired Start Date:</label><label style="color:red; font-weight:bold"></label></td>
          	
            <td colspan="3">
              <select name="dsday" id="dsday">
                <!--<option selected="selected">
				<?php //if(isset($day))echo $day; else $day="Please select"; ?></option>-->
                <option value="">Select Day</option>
                <?php
					for ($i=1;$i<=31;$i++)
					{
						echo "<option value='" . $i . "'";
						if(isset($dsday) && intval($dsday)==$i) 
						{
							echo "selected='selected' " ; 
						}
						echo ">" . $i ."</option>";
					}
				?>
                </select>              <select name="dsmonth" id="dsmonth">
                  
                  <option value="">Select Month</option>
                  <?php 
						if (isset($dsmonth) && $dsmonth!="0")
							showMonthOptionsDrop($month_arr, $dsmonth, true);
						
						else
							showMonthOptionsDrop($month_arr, null , true);
						 ?>
                  </select>
              <select name="dsyear" id="dsyear">
                <!--<option selected="selected"><?php //if(isset($year))echo $year; else $year="Please select"; ?></option>-->
                <option value="">Select Year</option>
                <?php
					for ($i=date("Y");$i>=1900;$i--)
					{
						echo "<option value='" . $i . "'";
						if(isset($dsyear) && intval($dsyear)==$i) 
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
<td> <label style="font-weight:bold">Desired Ending Date:</label>
</td>
          
            <td colspan="2">
              <select name="deday" id="day">
                <!--<option selected="selected">
				<?php //if(isset($day))echo $day; else $day="Please select"; ?></option>-->
                <option value="">Select Day</option>
                <?php
					for ($i=1;$i<=31;$i++)
					{
						echo "<option value='" . $i . "'";
						if(isset($deday) && intval($deday)==$i) 
						{
							echo "selected='selected' " ; 
						}
						echo ">" . $i ."</option>";
					}
				?>
                </select>
              <select name="demonth" id="month">
                
                <option value="">Select Month</option>
                <?php 
						if (isset($demonth) && $demonth!="0")
							showMonthOptionsDrop($month_arr, $demonth, true);
						
						else
							showMonthOptionsDrop($month_arr, null , true);
						 ?>
                </select>
              <select name="deyear" id="year">
                <!--<option selected="selected"><?php //if(isset($year))echo $year; else $year="Please select"; ?></option>-->
                <option value="">Select Year</option>
                <?php
					for ($i=date("Y");$i>=1900;$i--)
					{
						echo "<option value='" . $i . "'";
						if(isset($deyear) && intval($deyear)==$i) 
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
     <td> <label style="font-weight:bold">Work Authorization:</label><label style="color:red; font-weight:bold"></label></td>
	
            <td>
            	<select name="workauthorization[]" multiple>
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
     <td> <label style="font-weight:bold">Keyword:</label></td>
             	<td>
                	<input type="text" name="keyword" placeholder="Enter Keyword" value="<?php if(isset($keyword) && $keyword!="")echo $keyword; ?>"/>  
                </td>
           </tr>
 		</table>
        <h3>Desired Candidate Profile</h3>
        <table border="0" cellpadding="1px" cellspacing="0" style="font-family:Verdana, Geneva, sans-serif; font-size:12px" >
             
             <tr>
            	<td id="errormessage" colspan="2" align="left">
                <?php
					if(isset($_GET['e']) && $_GET['e']==1)
						echo "<b style='color:red'>Please Select Position type!</b>";	
					else if(isset($_GET['e']) && $_GET['e']==2)
						echo "<b style='color:red'>Please Enter Title!</b>";	
					else if(isset($_GET['e']) && $_GET['e']==3)
						echo "<b style='color:red'>Please Select Jobfunction!</b>";	
					else if(isset($_GET['e']) && $_GET['e']==4)
						echo "<b style='color:red'>Please Enter Jobdescription!</b>";
										
					else if(isset($_GET['e']) && $_GET['e']==5)
						echo "<b style='color:red'>Please Select Posting date!</b>";	
					else if(isset($_GET['e']) && $_GET['e']==6)
						echo "<b style='color:red'>Please Select Expiration date!</b>";	
					else if(isset($_GET['e']) && $_GET['e']==7)
						echo "<b style='color:red'>Please Enter Pay hour!</b>";	
				?>
                </td>
             </tr>
         <tr>
        <td> <label style="color:red; font-weight:bold">*</label><label style="font-weight:bold">Candidate Profile Description:</label></td>
                 <td><textarea placeholder="Enter Candidate Profile Description" name="dcprofiledesciprion_c" value="" rows="6" cols="50"><?php if(isset($dcprofiledesciprion)) {echo $dcprofiledesciprion;}?></textarea></td>
             </tr>  
             
              <tr> 
    <td valign="top"> <label style="font-weight:bold">Qualification Description:</label><label style="color:red; font-weight:bold"></label></td>     
	       	<td>
            <textarea placeholder="Enter Candidate Qualification Description" name="dcqualificationdesc" value="" rows="6" cols="50"><?php if(isset($dcqualificationdesc)) echo $dcqualificationdesc;?></textarea>
           </td>
      </tr>
             
             <tr>
					<td><label style="font-weight:bold">Experience Needed:</label></td>
					<td>
						<select type="text" name="experiencerequirement" id="year" value="">
								<option value="">Minimum Experience</option>
								<?php
									for ($i=0;$i<=35;$i++)
									{
										echo "<option value='" . $i . "'";
										if(isset($experiencerequirement) && intval($experiencerequirement)==$i) 
										{
											echo "selected='selected' " ; 
										}
										echo ">" . $i ."</option>";
									}
								?>
						</select>
					
					</td>
				 </tr>
        
        </table>
        
		<div align="right"><input class="button" type="submit" name="submit" id="submit" value="Submit" /> 
             <?php	if(isset($_POST['id_job']) && $_POST['id_job']!=""){	?>
            <a class="button" name="cancel" value="Cancel" href="empviewjobdetail.php" />Cancel</a>
             <?php } else { ?>
            <a class="button" name="reset" value="Reset" href="empjobdetail.php" />Reset</a>
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