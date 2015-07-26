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
<title>Job Search</title>
<link rel="stylesheet" type="text/css" media="screen" href="css/maincss.css">
<script type="text/javascript">
function Validate()
{
	if(document.getElementById("searchname").value=="")	
	{
		//alert("Enter Search Name:");
		document.getElementById("searchname").focus();
		document.getElementById("searchname").style.border="solid 1px red";
		return false;	
	}
	else
		return true;
}
</script>

</head>

<body>

<div id="centered"><!-- Centered-->
<div align="right" style="color:#045"><a href="jsdashboard.php" style="color:#045">Welcome <b style='color:#933'><?php  if (isset($_SESSION['username'])) echo $_SESSION['username']; ?></b></a>  , <a href="logout.php" style="color:#045">Logout</a></div>
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
                <li style="margin:0px;"><a href="jsadvancedsearch.php" style="font-size:12px; font-weight:bold; color:#333; cursor:pointer;" onClick="">Advanced Search</a></li>
                
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
	    <?php
		
		
			if(isset($_POST['keyword']) && $_POST['keyword']!="")
			{
				$keyword=$_POST['keyword'];
				$keyword1=$_POST['keyword'];
			}
			else
			{
				$keyword="";
				$keyword1="";
			}
			if(isset($_POST['employer']) && $_POST['employer']!="")
			{
				$employer=$_POST['employer'];
				$employer1=$_POST['employer'];
			}
			else
			{
				$employer="";
				$employer1="";
			}
				
			if(isset($_POST['positiontype']) && $_POST['positiontype']!="")
			{
				$postiontype=$_POST['positiontype'];
				$postiontype1=$_POST['positiontype'];
			}
			else
			{
				$postiontype="";
				$postiontype1="";
			}

			if(isset($_POST['experience']) && $_POST['experience']!="")
			{
				$experience=$_POST['experience'];
				$experience1=$_POST['experience'];
			}
			else
			{
				$experience="";
				$experience1="";
			}
				
			if(isset($_POST['salary']) && $_POST['salary']!="")
			{
				$salary=$_POST['salary'];
				$salary1=$_POST['salary'];
			}
			else
			{
				$salary="";
				$salary1="";
			}
			
			if(isset($_POST['city']) && $_POST['city']!="")
			{
				$city=$_POST['city'];
				$city1=$_POST['city'];
			}
			else
			{
				$city="";
				$city1="";
			}
				
			if(isset($_POST['state']) && $_POST['state']!="")
			{
				$state=$_POST['state'];
				$state1=$_POST['state'];
			}
			else
			{
				$state="";
				$state1="";
			}
			
			if(isset($_POST['country']) && $_POST['country']!="")
			{
				$country=$_POST['country'];
				$country1=$_POST['country'];
			}
			else
			{
				$country="";
				$country1="";
			}
				
			if(isset($_POST['workauthorization']) && $_POST['workauthorization']!="")
			{
				$workauthorization=$_POST['workauthorization'];
				$workauthorization1=$_POST['workauthorization'];
			}
			else
			{
				$workauthorization="";
				$workauthorization1="";
			}
				
			if(isset($_POST['functionalarea']) && $_POST['functionalarea']!="")
			{
				$functionalarea=$_POST['functionalarea'];
				$functionalarea1=$_POST['functionalarea'];
			}
			else
			{
				$functionalarea="";
				$functionalarea1="";
			}
				
			if(isset($_POST['industry']) && $_POST['industry'])
			{
				$industry=$_POST['industry'];
				$industry1=$_POST['industry'];
			}
			else
			{
				$industry="";
				$industry1="";
			}
		
			include ("./Class_Database.php");
			$db= new database();
			//$db->setup("root", "", "localhost", "jobportaldb");

			if (isset($_POST['search']) && $_POST['search']=="Search")
			{
				$query="Select * from emp_personalinfo ep,emp_jobdetails ej where ep.id_emp=ej.id_emp";
				$where="";
			
				if($keyword!="")
				{
					//Remove Extra characters from the keyword and create the array containing words.
					$keywords_array = superExplode($keyword, " \t\n!,\":)(.{};=");
					
					$where1="";
					foreach($keywords_array as $k)
					{
						$k=addslashes(strip_tags($k));
						if($where1=="")
							$where1 ="(ej.title like '%" . $k . "%'";	
						else
							$where1 .=" or ej.title like '%" . $k . "%'";	
					}
					if ($where1!="")
						$where .= " and " . $where1 . ") " ;
				}
			
				if($employer!="")
					$where .=" and ep.companyname like '%" . addslashes(strip_tags($employer)) . "%'";

				if($postiontype!="")
				{
					$postiontype=$_POST['positiontype'];
					//$postiontype=implode(" ",$postiontype);
					$where1="";
					foreach($postiontype as $p)
					{
						$p=addslashes(strip_tags($p));
						if($where1=="")
							$where1 ="(ej.postiontype like '%" . $p . "%'";	
						else
							$where1 .=" or ej.postiontype like '%" . $p . "%'";
					}
					if ($where1!="")
						$where .= " and " . $where1 . ") " ;
				}
						
				if($experience!="-1")
					$where .= " and ej.experiencerequirement<=" . $experience;
			
			
				if($salary!="")
					$where .=" and ej.SalaryRange like '%" . addslashes(strip_tags($salary)) . "%'";			
			
				if($city!="")
					$where .= " and ej.city like '%" . addslashes(strip_tags($city)) . "%'" ;
					
				if($state!="")
				{
					$state=implode("','",$state);
					$state=addslashes(strip_tags($state));
					$where .= " and ej.state in ('" . $state . "')";
				}
			
			
				if($country!="")
				{
					$country=implode("','",$country);
					$country=addslashes(strip_tags($country));
					$where .= " and ej.country in ('" . $country . "')";
				}
			
				
				if($workauthorization!="")
				{
					$where1="";
					foreach($workauthorization as $w)
					{
						$w=addslashes(strip_tags($w));
						if($where1=="")
							$where1 ="(ej.workauthorization like '%" . $w . "%'";	
						else
							$where1 .=" or ej.workauthorization like '%" . $w . "%'";	
					}
					if ($where1!="")
						$where .= " and " . $where1 . ") " ;
				}
			
			
				if($functionalarea!="")
				{
					$functionalarea=implode("','", $functionalarea);
					$functionalarea=addslashes(strip_tags($functionalarea));
					$where .= " and ej.jobfunction in ('" . $functionalarea . "')";
				}
			
				if($industry!="")
				{
					$industry=implode("','",$industry);
					$industry=addslashes(strip_tags($industry));
					$where .= " and ej.industry in ('" . $industry . "')";
				}
			
			
				$query = $query . $where;
				//echo $query;
				if ($res=$db->send_sql($query))
				{	
					echo "<table width='100%' cellpadding='0' cellspacing='5' border='0' style='font-family:Verdana, Geneva, sans-serif; font-size:12px; padding:10px'>\n";
					
					
					if (is_array($postiontype1))
							$postiontype1=implode("||",$postiontype1);
						if (is_array($state1))
							$state1=implode("||",$state1);
						if (is_array($country1))
							$country1=implode("||",$country1);
						if(is_array($workauthorization1))
							$workauthorization1=implode("||", $workauthorization1);
						if(is_array($functionalarea1))
							$functionalarea1=implode("||", $functionalarea1);
						if(is_array($industry1))
							$industry1=implode("||", $industry1);
						
						echo "<tr style='background-color:#CCC'>\n";
						echo "<td>";
						echo "<form action='jssavesearch.php' method='post' name='savesearchform' onSubmit='return Validate();' style='margin:0px'>\n";
						echo "<input type='text' name='searchname' id='searchname' placeholder='Enter Search Name' />\n";
						echo "<input type='hidden' name='keyword' value='" . $keyword1 ."' />\n";
						echo "<input type='hidden' name='employer' value='" . $employer1 ."' />\n";
						echo "<input type='hidden' name='positiontype' value='" . $postiontype1 ."' />\n";
						echo "<input type='hidden' name='experience' value='" . $experience1 ."' />\n";
						echo "<input type='hidden' name='salary' value='" . $salary1 ."' />\n";
						echo "<input type='hidden' name='locationcity' value='" . $city1 ."' />\n";
						echo "<input type='hidden' name='locationstate' value='" . $state1 ."' />\n";
						echo "<input type='hidden' name='locationcountry' value='" . $country1 ."' />\n";
						echo "<input type='hidden' name='workauthorization' value='" . $workauthorization1 ."' />\n";
						echo "<input type='hidden' name='functionalarea' value='" . $functionalarea1 ."' />\n";
						echo "<input type='hidden' name='industry' value='" . $industry1 ."' />\n";
						echo "<input type='hidden' name='searchquery' value='" . $query ."' />\n";
						echo "<input type='submit' name='savesearch' id='savesearch' value='Save Search' />\n" ;
						echo "</form>\n";
						echo "</td>\n";
						echo "</tr>\n";

					
					if(mysql_num_rows($res)>0)
					{
						
						while($row=mysql_fetch_array($res))
						{
							//Get The Keyword on which search is made.
							if(isset($keyword) && $keyword!="")
								$searchkeyword= $keyword;
							else
								$searchkeyword= "";
							
							// Get the minimum Experience Required for particular job.
							if (stripslashes($row["experiencerequirement"])!="")
								$experience = "<i style='font-size:10px'> (Min Exp " . stripslashes($row["experiencerequirement"]) . " Years)</i>";
								
							// Get the Job Description
							if(stripslashes($row['jobdescription'])!="")
								$jobdescription=stripslashes(stripslashes($row['jobdescription']));
							else
								$jobdescription="";
							
							if (strlen($jobdescription)>200)
								$shortdescription =  substr($jobdescription,0,200) . "...";
							else
								$shortdescription = $jobdescription;
							
							//Highlight the keyword in description.
							$shortdescription = str_replace($searchkeyword,"<b>" . $searchkeyword . "</b>",$shortdescription);
							
							
							echo "<tr>\n";
							//Highlight the keyword in job title.
							echo "\t<td colspan='2'><a href='jsjobdetails.php?j_id=" . stripslashes($row['id_job']) . "'>" . str_replace(strtoupper($searchkeyword),"<b style='color:red'>" . strtoupper($searchkeyword) . "</b>",strtoupper(stripslashes($row['title']))) . $experience . "</a></td>\n";
							echo "</tr>\n";
							
							echo "<tr>\n";
							echo "<td colspan='2' style='font-size:11px; font-weight:bold'>Posted on: " . stripslashes($row['pmonth']) . " " . stripslashes($row['pday']) . ", " . stripslashes($row['pyear']) . "</td>";
							echo "</tr>\n";
							
							echo "<tr>\n";
							echo "\t<td colspan='2'>" . stripslashes($row['companyname']) . "</td>\n";
							echo "</tr>\n";
							
							$job_loc="";
							if (stripslashes($row['city'])!="")
								$job_loc=stripslashes($row['city']);
							
							if (stripslashes($row['state'])!="")
							{	
								if($job_loc!="")
									$job_loc .= ", " . stripslashes($row['state']);
								else
									$job_loc =  stripslashes($row['state']);
							}
							
							if (stripslashes($row['zip'])!="")
							{	
								if($job_loc!="")
									$job_loc .= " " . stripslashes($row['zip']);
								else
									$job_loc =  stripslashes($row['zip']);
							}
							
							if ($job_loc!="")
							{
								echo "<tr>\n";
								echo "\t<td  colspan='2'>" . stripslashes($job_loc) . "</td>\n";
								echo "</tr>\n";
							}
							
							echo "<tr>\n";
							echo "\t<td colspan='2' style='padding-bottom:20px; text-align:justify'>" . stripslashes($shortdescription) . "\n";
							
							echo "\t<a href='jsjobdetails.php?j_id=" . stripslashes($row['id_job']) . "'>More</a>";
							echo "\t</td>\n";
							
							echo "</tr>\n";
							
							echo "<tr>\n";
							
							echo "</tr>\n";				
						}
					}
					
					else
					{
						echo "<tr>\n";
						echo "\t<td align='center' style='font-size:18px'>No Records are Found!</td>\n";
						echo "</tr>\n";	
						echo "<tr>\n";
						echo "\t<td align='center'><input class='button' type='button' name='back' value='Back' onclick='javascript:history.back();' /></td>";
						echo "</tr>";
						
					}
					
					echo "</table>";
				}
			
		}
		
		?>  
      	</div>
      </div>
        <!--SECOND COLUMN-->
            
    </div> <!--Width-->   
    </div><!-- Content-->
        
</div><!-- Centered-->
</body>
</html>
<?php
function superExplode ($str, $sep)
{
	$i = 0;
	$arr[$i++] = strtok($str, $sep);
	while ($token = strtok($sep))
	$arr[$i++] = $token;
	return $arr;
}
?>