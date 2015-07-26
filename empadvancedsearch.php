<?php ob_start(); ?>
<?php

session_start();

if (!isset($_SESSION['username'])) 
	{
		header('Location:index.php?profile=EMP');
	}
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Employer - Advanced Search</title>
<link rel="stylesheet" type="text/css" media="screen" href="css/maincss.css">
</head>

<body>

<div id="centered"><!-- Centered-->
<div align="right" style="color:#045"><a href="" style="color:#045">Welcome <b style='color:#933'><?php  if (isset($_SESSION['username'])) echo $_SESSION['username']; ?></b></a>  , <a href="logout.php" style="color:#045">Logout</a></div>
	<?php include("header.html"); 
	include("empjobsearchbar.php");
	?>
    
    
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
                    
		     <li><a href="emppersonalinfo.php" style="font-size:12px; font-weight:bold; cursor:pointer" onClick="">Company Information</a></li>
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
                <li style="margin:0px;"><a href="empadvancedsearch.php" style="font-size:12px; font-weight:bold; color:#000; cursor:pointer;" onClick="">Advanced Search</a></li>
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
        	<h2>Advanced Search</h2>
             <hr size="1" color="#069"  align="center">
            <form action="empadvancedsearchresults.php" method="post" name="advancedsearch">
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
                        <td width="100px"><label style="font-weight:bold">GPA:</label></td>
                        <td><input name="gpa" id="gpa" placeholder="Enter GPA"value="<?php if(isset($gpa)) echo $gpa; ?>"/></td>
                    </tr>
                    
                    <tr>
                        <td><label style="font-weight:bold">Exp(min)</label></td>
                        <td><select type="text" name="experience" id="experience" value="">
                            <option value="">If Any</option>
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
                        <td><label style="font-weight:bold">Location City:</label></td>
                        <td><input name="city" id="city" placeholder="Enter Location" value="<?php if(isset($locationcity)) echo $locationcity;?>"/></td>
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
                        	<td colspan="2">
                  				<label style="font-weight:bold; vertical-align:top">Field of Study:</label>
                            </td>
                        </tr>
                        <tr>
                        	<td colspan="2">
                       <input name="fieldofstudy" id="fieldofstudy" placeholder="Enter Field of Study" value="<?php if(isset($fieldofstudy)) echo $fieldofstudy;?>"/>
                            </td>
                       </tr>
                        <tr>
                        	<td>
                  				<label style="font-weight:bold; vertical-align:top">Work Auth:</label>
                            </td>
                             <td>
                            <label style="font-weight:bold; vertical-align:top">Degree Level:</label>
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
                             <td>
                                    <select name="degreelevel[]" multiple style="width:120px"> 
                                    <?php 
                                    if (isset($degreelevel))
                                        showDegreeOptionsDrop($degree_arr, $degreelevel, true);
                                    
                                    else
                                        showDegreeOptionsDrop($degree_arr, null , true);
                                     ?>
                                    </select>
                                  
                       </td>
                       </tr>
                      
                      
                       </table>
                    </td>
                    
                    
                </tr>
                </table>
                
            	<table border="0" cellpadding="2" cellspacing="0" ><tr><td>
                    <table border="0" cellpadding="2" cellspacing="0" style="font-family:Verdana, Geneva, sans-serif; font-size:12px">
                    
                    </table>     
                </td>
                <td>
                	<table border="0" cellpadding="2" cellspacing="0" style="font-family:Verdana, Geneva, sans-serif; font-size:12px">
                    <tr>
                       
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