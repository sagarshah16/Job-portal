
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" media="screen" href="css/maincss.css">
<title>Employer - Job Search</title>
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
?>
 <div class="jobsearchblock"><!-- Content-->
  	<div style="width:100%;" align="center"><!--Width-->
    <form action="empjobsearch.php" method="get" name="jobsearch" onsubmit="return ValidateSearch();">
    <br/>
        <table cellpadding="0" cellspacing="6" border="0" style="font-family:Verdana, Geneva, sans-serif; font-size:12px; background-color: #FFF;padding:10px; margin-left:50cm" >
        <tr>
        	<td colspan="6" id="errormessage1"></td>
        </tr>
        <tr style="background-color: #FFF;">
        	<td width="28%" style="background-color: #FFF; width:28px"><label style="font-weight:bold; float:left; background-color: #FFF;">Keywords</label></td>
            <td width="30%" style="background-color: #FFF; width:28px"><label style="font-weight:bold;background-color: #FFF;">Locations</label></td>
             <td width="40%" style="background-color: #FFF; width:35px"><label style="font-weight:bold;background-color: #FFF;">Exp.</label></td>
            <td rowspan="2" align="center" style="background-color: #FFF;"><input type="submit" name="search" id="search" class="button" value="Search Jobs"  /></td>
        </tr>
        
        <tr>
        	<td  width="28%" style="background-color: #FFF; width:28px"><input name="kw" id="kw" placeholder="Enter Keywords" value="<?php if(isset($kw) && $kw!="") echo $kw; ?>"/></td>
           
            <td  width="30%" style="background-color: #FFF; width:28px"><input name="loc" id="loc" placeholder="Enter Location" value="<?php if(isset($loc) && $loc!="") echo $loc; ?>"/>
            </td>
            
              <td width="40%" style="background-color: #FFF; width:35px">
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
        </tr>
        </table>
        
    </form>
    </div>
 </div>

</body>
</html>