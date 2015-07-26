<?php ob_start(); ?>
<?php

session_start();

if (!isset($_SESSION['username'])) 
	{
		header('Location:index.php');
	}

if(isset($_POST['edu_id']) && $_POST['edu_id']!="")
{
	include("./Class_Database.php");
	$db= new database();
	//$db->setup("kaushal", "kaushal", "localhost", "jobportaldb");	
  	$id_user=$_SESSION["userid"];
	$edu_id=$_POST['edu_id'];
	$query="Select * from js_edu where edu_id=$edu_id and id_user=$id_user";
	if($res=$db->send_sql($query))
	{
		if (mysql_num_rows($res)>0)
		{
			while ($row = mysql_fetch_array($res))
			{
				$edu_degreename=stripslashes($row["edu_degreename"]);
				$edu_studyname=stripslashes($row["edu_studyname"]);
				$edu_gpa=stripslashes($row["edu_gpa"]);
				$edu_StartMonth=stripslashes($row["edu_startdate"]);
				$edu_StartYear=stripslashes($row["edu_startyear"]);
				$edu_EndMonth=stripslashes($row["edu_enddate"]);
				$edu_EndYear=stripslashes($row["edu_endyear"]);
				$edu_institutename=stripslashes($row["edu_institutename"]);
				$edu_city=stripslashes($row["edu_city"]);
				$edu_state=stripslashes($row["edu_state"]);
				$edu_country=stripslashes($row["edu_country"]);
				$edu_instZipcode=stripslashes($row["edu_instZipcode"]);
				$edu_summary=stripslashes($row["edu_summary"]);
				
			}
		}
	}
	
}
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Education - Job Seeker</title>
<link rel="stylesheet" type="text/css" media="screen" href="css/maincss.css">

<script type="text/javascript">
function ValidateForm(form)
{
	
	for(var i = 0; i < form.elements.length; i++)
	{
		
		if(form.elements[i].name.indexOf("_c")>0)
		{
			//alert(form.elements[i].type);
			if (form.elements[i].type=="text" && form.elements[i].value=="" )
			{
				document.getElementById("errormessage").innerHTML="<b style='color:red'>Please "+form.elements[i].placeholder+"</b>";
				form.elements[i].focus();
				return false;
			}
			else if(form.elements[i].name=="gpa_c" && form.elements[i].value!="")
			{
				
				var reggpa= /^[0]|[0-3]\.(\d?\d?)|[4].[0]$/;
				var gpa=form.elements[i].value;
				if(reggpa.test(gpa)==false)
				{
					document.getElementById("errormessage").innerHTML="<b style='color:red'>Please Enter Valid GPA</b>";
					form.elements[i].focus();
					return false;	
				}
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
		}
		 
		
		else
		{
			if(form.elements[i].name=="Zipcode"&& form.elements[i].value!="")
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
                    <li><a href="jseducation.php" style="font-size:12px; color:#333; font-weight:bold; cursor:pointer" onClick="">Education</a></li>
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
	         <h2>Education Detail </h2>
        <hr size="1" color="#069"  align="center">
             <form action="jseducationsave.php" name="frmupload" method="post" enctype="multipart/form-data" onSubmit="return ValidateForm(this)">
           	 <table border="0" cellpadding="2" cellspacing="0" style="font-family:Verdana, Geneva, sans-serif; font-size:12px">
             <tr>
            	<td id="errormessage" colspan="2" style="text-align:left">
                <?php
					if(isset($_GET['e']) && $_GET['e']==1)
						echo "<b style='color:red'>Please Enter Degree!</b>";	
					else if(isset($_GET['e']) && $_GET['e']==2)
						echo "<b style='color:red'>Please Enter Field of Study!</b>";	
					else if(isset($_GET['e']) && $_GET['e']==3)
						echo "<b style='color:red'>Please Enter GPA!</b>";
					else if(isset($_GET['e']) && $_GET['e']==6)
						echo "<b style='color:red'>Please Enter Proper GPA!</b>";	

					else if(isset($_GET['e']) && $_GET['e']==4)
						echo "<b style='color:red'>Please Select Start Date!</b>";	
					else if(isset($_GET['e']) && $_GET['e']==5)
						echo "<b style='color:red'>Please Select End Date!</b>";	
				?>
                </td>
             </tr>
             
             <input type="hidden" name="edu_id" value="<?php if(isset($_POST['edu_id']) && $_POST['edu_id']!="") echo $_POST['edu_id'] ; else echo "";?>">
             <tr>
                <td><label style="color:red; font-weight:bold">*</label><label style="font-weight:bold">Degree Level:</label></td>
                <td>
                <select name="DegreeLevel_c" id="dropdown" title="Select Degree">
                 <option value="">Select Degree</option>
				 <?php
                 if (isset($edu_degreename) && $edu_degreename!="")
				 	showDegreeOptionsDrop($degree_arr, $edu_degreename, true);
				 else
				 	showDegreeOptionsDrop($degree_arr, null , true);
				 ?>
                </select>
                </td>
             </tr>
             
             <tr>
                <td><label style="color:red; font-weight:bold">*</label><label style="font-weight:bold">Field of Study:</label></td>
                <td>
                <input name="FieldStudy_c" id="FieldStudy" type="text" value="<?php if(isset($edu_studyname) && $edu_studyname!="") echo $edu_studyname; ?>" placeholder="Enter Field of Study"/>
                </td>
             </tr>
              <tr>
                <td><label style="color:red; font-weight:bold">*</label><label style="font-weight:bold">GPA:</label></td>
                <td>
                <input name="gpa_c" id="gpa_c" type="text" value="<?php if(isset($edu_gpa) && $edu_gpa!="")echo $edu_gpa; ?>" placeholder="Enter GPA"/>                </td>
             </tr>
             <tr>
                <td><label style="color:red; font-weight:bold">*</label><label style="font-weight:bold">Start Date:</label></td>
                <td>
                
                 <select name="StartMonth_c"  id="dropdown1" title="Select Start Date">
                        <option value="">Select Month</option>
                        <?php 
						if (isset($edu_StartMonth) && $edu_StartMonth!="0")
							showMonthOptionsDrop($month_arr, $edu_StartMonth, true);
						else
							showMonthOptionsDrop($month_arr, null , true);
						 ?>
                </select>
                
                  <select name="StartYear_c"  id="dropdown2" title="Select Start Date">
                        <option value="">Select Year</option>
                        <?php
                            for ($i=date("Y");$i>=1900;$i--)
                            {
                                echo "<option value='" . $i . "'";
                                if(isset($edu_StartYear) && intval($edu_StartYear)==$i) 
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
                <td><label style="color:red; font-weight:bold">*</label><label style="font-weight:bold">End Date:</label></td>
                <td>

                <select name="EndMonth_c"  id="dropdown3" title="Select End Date">
                        <option value="">Select Month</option>
                        <?php 
						if (isset($edu_EndMonth) && $edu_EndMonth!="0")
							showMonthOptionsDrop($month_arr, $edu_EndMonth, true);
						
						else
							showMonthOptionsDrop($month_arr, null , true);
						 ?>
                </select>
                 <select name="EndYear_c"  id="dropdown4" title="Select End Date">
                    <option value="">Select Year</option>
                        <?php
                            for ($i=date("Y")+6;$i>=1900;$i--)
                            {
                                echo "<option value='" . $i . "'";
                                if(isset($edu_EndYear) && intval($edu_EndYear)==$i) 
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
             		<input type="text" value="<?php if(isset($edu_institutename)&& $edu_institutename!="")echo $edu_institutename; ?>" placeholder="Enter Institute Name" name="InstituteName" id="InstituteName"/>
                </td>
             </tr>
             
             <tr>
                <td><label style="font-weight:bold">City:</label></td>
                <td>
             		<input type="text" value="<?php if(isset($edu_city)&& $edu_city!="")echo $edu_city; ?>" placeholder="Enter City Name" name="city" id="city"/>
                </td>
             </tr>
             
             <tr>
               <td><label style="font-weight:bold">State:</label></td>
               <td>
              <select type="text" name="state" id="state" >
              <option value="">Select State</option>
              	<?php
                if(isset($edu_state) && $edu_state!="0")
                showStateOptionsDrop($states_arr, $edu_state, true);
                else
                 showStateOptionsDrop($states_arr, null, true);
				 ?>
              </select>
                </td>
             </tr>
             <tr>
                <td><label style="font-weight:bold">Zip Code:</label></td>
                <td>
             		<input type="text" value="<?php if(isset($edu_instZipcode) && $edu_instZipcode!="")echo $edu_instZipcode; ?>" placeholder="Enter Zipcode" name="Zipcode" id="Zipcode"/>
                </td>
             </tr>
             <tr>
                        <td><label style="font-weight:bold">Country:</label></td>
                        <td colspan="4">
                         <select name="country">
                <option value="">Select Country</option>
				<?php
                if(isset($edu_country) && $edu_country!="0")
                	showCountryOptionsDrop($country_arr, $edu_country, true);
                else
                 showCountryOptionsDrop($country_arr, null, true);
				?>
                </select> </td>
                    </tr>
             <tr>
                <td><label style="font-weight:bold; vertical-align:text-top">Summary:</label></td>
                <td>
             		<textarea name="EduSummary"  id="EduSummary" rows="4" cols="28" placeholder="Write the Summary" value=""><?php if(isset($edu_summary) && $edu_summary!="")echo $edu_summary;?></textarea>	
                </td>
             </tr>
             
            </table>
            
            <div align="right"><input class="button" type="submit" name="submit" id="submit" value="Submit" /> 
             <?php	if(isset($_POST['edu_id']) && $_POST['edu_id']!=""){	?>
            <a class="button" name="cancel" value="Cancel" href="jsviewprofile.php" />Cancel</a>
             <?php } else { ?>
            <a class="button" name="reset" value="Reset" href="jseducation.php" />Reset</a>
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