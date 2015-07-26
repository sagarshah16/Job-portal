<?php ob_start(); ?>
<?php

session_start();

if (!isset($_SESSION['username'])) 
{
	header('Location:index.php');
}


if(isset($_POST['search_id']) && $_POST['search_id']!="")
{
	include("./Class_Database.php");
	$db= new database();
	//$db->setup("kaushal", "kaushal", "localhost", "jobportaldb");	
  	$id_user=$_SESSION["userid"];
	$search_id=$_POST['search_id'];
	$query="Select * from  js_savesearchdetails where id_search=$search_id and id_user=$id_user";
	if($res=$db->send_sql($query))
	{
		if (mysql_num_rows($res)>0)
		{
			while ($row = mysql_fetch_array($res))
			{
				  $keyword=stripslashes($row["keywords"]);
				  $employer=stripslashes($row["employer"]);
				  $positiontype=stripslashes($row["positiontype"]);
				  $experience=stripslashes($row["experience"]);
				  $salary=stripslashes($row["salary"]);
				  $locationcity=stripslashes($row["locationcity"]);
				  $locationstate=stripslashes($row["locationstate"]);
				  $locationcountry=stripslashes($row["locationcountry"]);
				  $workauthorization=stripslashes($row["workauthorization"]);
				  $functionalarea=stripslashes($row["functionalarea"]);
				  $industry=stripslashes($row["industry"]);
				  
				  $locationstate=explode("||",$locationstate);
				  $locationcountry=explode("||",$locationcountry);
				  $workauthorization=explode("||",$workauthorization);
				  $functionalarea=explode("||",$functionalarea);
				  $industry=explode("||",$industry);
			}
		}
	}
	
}



?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Advanced Search</title>
<link rel="stylesheet" type="text/css" media="screen" href="css/maincss.css">
</head>

<body>

<div id="centered"><!-- Centered-->
<div align="right" style="color:#045"><a href="" style="color:#045">Welcome <b style='color:#933'><?php  if (isset($_SESSION['username'])) echo $_SESSION['username']; ?></b></a>  , <a href="logout.php" style="color:#045">Logout</a></div>
	<?php include("header.html"); 
	include("jsjobsearchbar.php");
	?>
    
    
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
                    <li><a href="jseducation.php" style="font-size:12px;  font-weight:bold; cursor:pointer" onClick="">Education</a></li>
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
                <li style="margin:0px;"><a href="jsadvancedsearch.php" style="font-size:12px; font-weight:bold; color:#333;cursor:pointer;" onClick="">Advanced Search</a></li>
                
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
        	<h2>Advanced Search</h2>
            <form action="jsadvancedsearchresults.php" method="post" name="advancedsearch">
			<table width="100%" border="0" cellpadding="2" cellspacing="0" style="font-family:Verdana, Geneva, sans-serif; font-size:12px">
                    <tr>
                    	<td colspan="2" id="errormessage">
                        <?php
							if(isset($_GET['e']) && $_GET['e']=="1")
							{
								echo "<b style='color:red'>Please Select Atleast One Searching Criteria!</b>";	
							}
						?>
                        </td>
                    </tr>
                    <tr>
                        <td width="100px"><label style="font-weight:bold">Keywords:</label></td>
                        <td><input name="keyword" id="keyword" placeholder="Enter Keywords" 
                        value="<?php if(isset($keyword)) echo $keyword; ?>"/></td>
                    </tr>
                    <tr>
                        <td width="100px"><label style="font-weight:bold">Employer:</label></td>
                        <td><input name="employer" id="employer" placeholder="Enter Employer Name"
                        value="<?php if(isset($employer)) echo $employer; ?>"/></td>
                    </tr>
                    
                    <tr>
                    <td valign="top" ><label style="font-weight:bold">Postion Type:</label></td>
                    <td><input type="checkbox" name="positiontype[]" value="Fulltime" 
					<?php
						if(isset($positiontype)) 
						{
							$pos=strpos($positiontype,"Fulltime");
							if($pos!==false && $pos>=0)
								echo "checked='checked'";
						}
					?>
               		/>Fulltime
     	        	<input type="checkbox" name="positiontype[]" value="Parttime" 
                    <?php
						if(isset($positiontype)) 
						{
							$pos=strpos($positiontype,"Parttime");
							if($pos!==false && $pos>=0)
								echo "checked='checked'";
						}
					?>/>Partime
	        		<input type="checkbox" name="positiontype[]" value="Internship"
                     <?php
						if(isset($positiontype)) 
						{
							$pos=strpos($positiontype,"Internship");
							if($pos!==false && $pos>=0)
								echo "checked='checked'";
						}
					?>
                    />Internship
                 </td>
                    
                    </tr>
                    
                    <tr>
                        <td><label style="font-weight:bold">Exp(min)</label></td>
                        <td><select type="text" name="experience" id="experience" value="">
                            <option value="-1">If Any</option>
                            <?php
                                for ($i=0;$i<=35;$i++)
                                {
                                    echo "<option value='" . $i . "' ";
                                    if(isset($experience) && intval($experience)==$i) 
                                    {echo "selected='selected' " ; }
                                    echo ">" . $i ."</option>";
                                }
                            ?>
                         </select></td>
                    </tr>
                    
                    <tr>
                	<td><label style="font-weight:bold">Salary:</label></td>
                	<td>
                    <select name="salary" id="salary">
                    <option value="">Select Salary Range</option>
                     <?php 
                            if (isset($salary) && $salary!="0")
                                showSalaryOptionsDrop($salary_arr, $salary, true);
                            
                            else
                                showSalaryOptionsDrop($salary_arr, null , true);
                             ?>
                    
                   </select>
                    </td>
                </tr>
                    
                    <tr>
                        <td><label style="font-weight:bold">Location City:</label></td>
                        <td><input name="city" id="city" placeholder="Enter Location" 
                        value="<?php if(isset($locationcity)) echo $locationcity;?>"/></td>
                    </tr>
                    
                </table>
                
                
                <table border="0" cellpadding="0" cellspacing="0" ><tr><td>
                    <table border="0" cellpadding="2" cellspacing="0" style="font-family:Verdana, Geneva, sans-serif; font-size:12px">
                    <tr>
                        <td>
                            <label style="font-weight:bold; vertical-align:top">Location State:</label>
                        </td>
                    </tr>
                    <tr>
                        <td>
                        	<select name="state[]" multiple="multiple">
                            <option value="Select State">Select State</option>
							<?php
                            if(isset($locationstate))
								showStateOptionsDrop($states_arr, $locationstate, true);
							else
								showStateOptionsDrop($states_arr, null, true);
							?>
                            </select>
                        </td>
                    </tr>
                    </table>     
                </td>
                <td>
                	<table border="0" cellpadding="2" cellspacing="0" style="font-family:Verdana, Geneva, sans-serif; font-size:12px">
                    <tr>
                        <td>
                            <label style="font-weight:bold; vertical-align:top">Country:</label>
                        </td>
                    </tr>
                    <tr>
                        <td>
                        <select name="country[]" multiple style="width:120px"> 
                            <?php 
                            if (isset($locationcountry))
                                showCountryOptionsDrop($country_arr, $locationcountry, true);
                            
                            else
                                showCountryOptionsDrop($country_arr, null , true);
                             ?>
                            </select>
                       </td>
                    </tr>
                    </table>     

                </td></tr></table>
                
                
                <table border="0" cellpadding="2" cellspacing="0" >
                <tr>
                	<td>
                    	<table border="0" cellpadding="2" cellspacing="0" style="font-family:Verdana, Geneva, sans-serif; font-size:12px">
                    	<tr>
                        	<td>
                  				<label style="font-weight:bold; vertical-align:top">Work Auth:</label>
                            </td>
                        </tr>
                        <tr>
                        	<td>
                        	<select multiple="multiple" name="workauthorization[]">
                            	<option value="U.S. Citizen"
                                <?php
									if(isset($workauthorization))
									{
										if(in_array("U.S. Citizen",$workauthorization))
										{
											echo "Selected='selected'";	
										}
									}
								?>
                                >U.S. Citizen</option>
                                <option value="Permanent Resident (U.S.)"
                                 <?php
									if(isset($workauthorization))
									{
										if(in_array("Permanent Resident (U.S.)",$workauthorization))
										{
											echo "Selected='selected'";	
										}
									}
								?>
                                >Permanent Resident (U.S.)</option>
                                <option value="Student (F-1) Visa"
                                 <?php
									if(isset($workauthorization))
									{
										if(in_array("Student (F-1) Visa",$workauthorization))
										{
											echo "Selected='selected'";	
										}
									}
								?>
                                >Student (F-1) Visa</option>
                                <option value="Employment (H-1) Visa"
                                <?php
									if(isset($workauthorization))
									{
										if(in_array("Employment (H-1) Visa",$workauthorization))
										{
											echo " Selected='selected'";	
										}
									}
								?>
                                >Employment (H-1) Visa</option>
                                <option value="J1 Visa" 
                                <?php
									if(isset($workauthorization))
									{
										if(in_array("J1 Visa",$workauthorization))
										{
											echo " Selected='selected'";	
										}
									}
								?>
                                >J1 Visa</option>
                                <option value="Other" 
                                 <?php
									if(isset($workauthorization))
									{
										if(in_array("Other",$workauthorization))
										{
											echo " Selected='selected'";	
										}
									}
								?>
                                >Other</option>
                            </select>
                            </td>
                       </tr>
                       </table>
                    </td>
                    
                    
                </tr>
                </table>
                
            	<table border="0" cellpadding="2" cellspacing="0" ><tr><td>
                    <table border="0" cellpadding="2" cellspacing="0" style="font-family:Verdana, Geneva, sans-serif; font-size:12px">
                    <tr>
                        <td>
                            <label style="font-weight:bold; vertical-align:top">Functional Area:</label>
                        </td>
                    </tr>
                    <tr>
                        <td>
                                    <select name="functionalarea[]" multiple style="height:90px"> 
                                    <?php 
                                    if (isset($functionalarea))
                                        showFunctionalAreaOptionsDrop($functional_arr, $functionalarea, true);
                                    
                                    else
                                        showFunctionalAreaOptionsDrop($functional_arr, null , true);
                                     ?>
                                    </select>
                       </td>
                    </tr>
                    </table>     
                </td>
                <td>
                	<table border="0" cellpadding="2" cellspacing="0" style="font-family:Verdana, Geneva, sans-serif; font-size:12px">
                    <tr>
                        <td>
                            <label style="font-weight:bold; vertical-align:top">Industry:</label>
                        </td>
                    </tr>
                    <tr>
                        <td>
                        <select name="industry[]" multiple style="height:90px"> 
                            <?php 
                            if (isset($industry))
                                showIndustryOptionsDrop($industry_arr, $industry, true);
                            
                            else
                                showIndustryOptionsDrop($industry_arr, null , true);
                             ?>
                            </select>
                       </td>
                    </tr>
                    </table>     

                </td></tr></table>
                
                <div align="right" style="margin-right:70px">
                <input class="button" type="submit" name="search" id="submit" value="Search" />
                <input class="button" type="reset" name="reset" value="Reset" />
                <!--<input class="button" type="submit" name="savesearch" value="Save Search" />-->
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