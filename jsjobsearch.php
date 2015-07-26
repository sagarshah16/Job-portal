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
<title>Job Seeker - Job Search</title>
<link rel="stylesheet" type="text/css" media="screen" href="css/maincss.css">
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
	    <?php
			//echo $kw . "<br>";
			//echo $exp . "<br>";
			//echo $loc . "<br>";
			//echo $area . "<br>";
			//echo $sal . "<br>";
			include ("./Class_Database.php");
			$db= new database();
			//$db->setup("root", "", "localhost", "jobportaldb");
			
			$query="Select * from emp_personalinfo ep,emp_jobdetails ej where ep.id_emp=ej.id_emp";
			$where="";
			
			if(isset($kw) && $kw!="")
			{
				//Remove all special characters including space and seperate each word to search in the database.
				$keywords = superExplode($kw, " \t\n!,\":)(.{};=");
				$where1="";
					foreach($keywords as $k)
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
			
			
			if(isset($exp) && $exp!="")
			{
				$where .= " and ej.experiencerequirement<=" . $exp;
			}
			
			if(isset($loc) && $loc!="")
			{
				//Remove all special characters and seperate each word to search in the database.
				$locations = superExplode($loc, " \t\n!,\":)(.{};=");
				$where1="";
					foreach($locations as $l)
					{
						$l=addslashes(strip_tags($l));
						if($where1=="")
							$where1 ="(ej.city like '%" . $l . "%' or ej.state like '%" . $l . "%' or ej.zip like '%" . $l . "%'";	
						else
							$where1 .=" or ej.city like '%" . $l . "%' or ej.state like '%" . $l . "%' or ej.zip like '%" . $l . "%'";	
					}
					if ($where1!="")
						$where .= " and " . $where1 . ") " ;
			}
			
			if(isset($area) && $area!="")
			{
				$where .=" and ej.jobfunction like '%" . addslashes(strip_tags($area)) . "%'";
			}
			
			if(isset($sal) && $sal!="")
			{
				$where .=" and ej.SalaryRange like '%" . addslashes(strip_tags($sal)) . "%'";
			}
			
			$query = $query . $where;
			
			//echo $query;
			if ($res=$db->send_sql($query))
			{	
				echo "<table cellpadding='0' cellspacing='5' border='0' style='font-family:Verdana, Geneva, sans-serif; font-size:12px; padding:10px'>\n";
				
				if(mysql_num_rows($res)>0)
				{
					while($row=mysql_fetch_array($res))
					{
					//Get The Keyword on which search is made.
					if(isset($_GET['kw']) && $_GET['kw']!="")
						$searchkeyword= $_GET['kw'];
					else
						$searchkeyword= "";
					
					// Get the minimum Experience Required for particular job.
					if (stripslashes($row["experiencerequirement"])!="")
						$experience = "<i style='font-size:10px'> (Min Exp " . stripslashes($row["experiencerequirement"]) . " Years)</i>";
						
					// Get the Job Description
					if(stripslashes($row['jobdescription'])!="")
						$jobdescription=stripslashes($row['jobdescription']);
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
					echo "\t<td><a href=''>" . str_replace(strtoupper($searchkeyword),"<b style='color:red'>" . strtoupper($searchkeyword) . "</b>",strtoupper(stripslashes($row['title']))) . $experience . "</a></td>\n";
					//echo "<td align='right'>Posted on: " . $row['pmonth'] . " " . $row['pday'] . ", " . $row['pyear'] . "</td>";
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