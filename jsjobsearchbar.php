<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" media="screen" href="css/maincss.css">
<title>Job Seeker - Job Search</title>
<script type="text/javascript">
function ValidateSearch()
{
	if (document.getElementById("kw").value=="")
	{
		document.getElementById("errormessage1").innerHTML="<b style='color:red'>Please Enter Atleast One Keyword!</b>";
		document.getElementById("kw").focus();
		return false;
	}
	return true;	
}

</script>
</head>

<body>
<?php include("Combo_Values.php");

if(isset($_GET['kw']) && $_GET['kw']!="")
	$kw=$_GET['kw'];
if(isset($_GET['ex']) && $_GET['ex']!="Any")
	$exp=$_GET['ex'];
if(isset($_GET['loc']) && $_GET['loc']!="")
	$loc=$_GET['loc'];
if(isset($_GET['area']) && $_GET['area']!="")
	$area=$_GET['area'];
if(isset($_GET['sal']) && $_GET['sal']!="")
	$sal=$_GET['sal'];

?>
 <div class="jobsearchblock"><!-- Content-->
  	<div style="width:100%;" align="center"><!--Width-->
    <form action="jsjobsearch.php" method="get" name="jobsearch" onsubmit="return ValidateSearch();">
   
        <table cellpadding="0" cellspacing="5" border="0" style="font-family:Verdana, Geneva, sans-serif; font-size:12px; padding:10px">
        <tr>
        	<td colspan="6" id="errormessage1"></td>
        </tr>
        <tr>
        	<td><label style="font-weight:bold; float:left">Keywords</label></td>
            <td><label style="font-weight:bold">Exp(min)</label></td>
            <td><label style="font-weight:bold">Locations</label></td>
            <td><label style="font-weight:bold">Functional Area</label></td>
            <td><label style="font-weight:bold">Salary Range</label></td>
            <td rowspan="2"><input type="submit" name="search" id="search" class="button" value="Search Jobs"  /></td>
        </tr>
        
        <tr>
        	<td><input name="kw" id="kw" placeholder="Enter Keywords" value="<?php if(isset($kw) && $kw!="") echo $kw; ?>"/></td>
            <td>
            	<select type="text" name="ex" id="ex" value="">
            		<option value="Any">If Any</option>
					<?php
                    	for ($i=0;$i<=35;$i++)
						{
							echo "<option value='" . $i . "' ";
							if(isset($exp) && intval($exp)==$i) 
							{echo "selected='selected' " ; }
							echo ">" . $i ."</option>";
						}
					?>
                 </select>
            </td>
            <td><input name="loc" id="loc" placeholder="Enter Location" value="<?php if(isset($loc) && $loc!="") echo $loc; ?>"/></td>
            <td>
            	<select name="area" id="area">
                    <option value="">Select Functional Area</option>
                     <?php 
                            if (isset($area) && $area!="0")
                                showFunctionalAreaOptionsDrop($functional_arr, $area, true);
                            
                            else
                                showFunctionalAreaOptionsDrop($functional_arr, null , true);
                             ?>
                </select>
             </td>
             
             <td>
                 <select name="sal" id="sal">
                    <option value="">Select Salary Range</option>
                     <?php 
                            if (isset($sal) && $sal!="0")
                                showSalaryOptionsDrop($salary_arr, $sal, true);
                            
                            else
                                showSalaryOptionsDrop($salary_arr, null , true);
                             ?>
                    
                   </select>
             </td>
             
        </tr>
        </table>
        
    </form>
    </div>
 </div>

</body>
</html>