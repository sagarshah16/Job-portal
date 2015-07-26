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
            </tr>
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
			if(isset($_POST['gpa']) && $_POST['gpa']!="")
			{
				$gpa=$_POST['gpa'];
				$gpa1=$_POST['gpa'];
			}
			else
			{
				$gpa="";
				$gpa1="";
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
			
			if(isset($_POST['fieldofstudy']) && $_POST['fieldofstudy']!="")
			{
				$fieldofstudy=$_POST['fieldofstudy'];
				$fieldofstudy1=$_POST['fieldofstudy'];
			}
			else
			
			{
				$fieldofstudy="";
				$fieldofstudy1="";
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
				
			if(isset($_POST['degreelevel']) && $_POST['degreelevel']!="")
			{
				$degreelevel=$_POST['degreelevel'];
				$degreelevel1=$_POST['degreelevel'];
			}
			else
			{
				$degreelevel="";
				$degreelevel1="";
			}
		
			 
			include ("./Class_Database.php");
			$db= new database();
			$query="Select * from js_personalinfo jp,js_skill js,js_edu jsedu where jp.id_js=js.id_js and  jp.id_js= jsedu.id_js";
			$where="";
			
			if(isset($keyword) && $keyword!="")
			{
				//Remove all special characters including space and seperate each word to search in the database.
				$keywords = superExplode($keyword, " \t\n!,\"':)(.{};=");
				$where1="";
					foreach($keywords as $k)
					{
						$k=addslashes(strip_tags($k));
						if($where1=="")
							$where1 ="(js.skill_name like '%" . $k . "%'";	
						else
							$where1 .=" or js.skill_name like '%" . $k . "%'";	
					}
					if ($where1!="")
						$where .= " and " . $where1 . ") " ;
			}
			
			if(isset($gpa) && $gpa!="")
			{
				$where .= " and jsedu.edu_gpa>=" . $gpa;
			}
			
			if(isset($experience) && $experience!="")
			{
				$where .= " and js.skill_year>=" . $experience;
			}
			if($city!="")
					$where .= " and jp.city like '%" . addslashes(strip_tags($city)) . "%'";
					
			if($state!="")
			{
					$state=implode("','",$state);
					$state=addslashes(strip_tags($state));
					$where .= " and jp.state in ('" . $state . "')";
			}
			
			
			if($country!="")
			{
					$country=implode("','",$country);
					$country=addslashes(strip_tags($country));
					$where .= " and jp.country in ('" . $country . "')";
			}
			if($workauthorization!="")
			{
					$workauthorization=implode("','",$workauthorization);
					$workauthorization=addslashes(strip_tags($workauthorization));
					$where .= " and jp.workauthorization in ('" . $workauthorization . "')";
			}
			if($fieldofstudy!="")
			{
					$where .= " and jsedu.edu_studyname like '%" . addslashes(strip_tags($fieldofstudy)) . "%' ";
			}
			if($degreelevel!="")
			{
					$degreelevel=implode("','", $degreelevel);
					$degreelevel=addslashes(strip_tags($degreelevel));
					$where .= " and jsedu.edu_degreename in ('" . $degreelevel . "')";
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
						if(isset($_GET['$keyword']) && $_GET['$keyword']!="")
							$searchkeyword= $_GET['$keyword'];
						else
							$searchkeyword= "";
						
						echo "<tr>\n";
						
						echo "\t<td></td>\n";
						
						echo "</tr>\n";
						echo "<tr>\n";
						
						echo "\t<td colspan='2'><a href=''><b>" . stripslashes($row['fname']) ."\t" . stripslashes($row['lname']) /*. $experience */. "</b></a> </td>\n";
						echo "</tr>\n";
						echo "<tr>\n";
						
						echo "<td align='left'>Skills: "  . str_replace(strtoupper($searchkeyword),"<b style='color:red'>" . strtoupper($searchkeyword) . "</b>",strtoupper(stripslashes($row['skill_name']))) .   "</td>\n";
						echo "</tr>\n";
						echo "<tr>\n";
						
						echo "<td align='left'>Total Experience: "  . stripslashes($row['skill_year']) . " \tyear</td>\n";
						
										
						echo "</tr>\n";
						
						echo "<tr>\n";
						
						echo "<td align='left'>Current Location: "  . stripslashes($row['city']) . " \t\t\t\t\t\t\t\t, "  . stripslashes($row['state']) . " </td>\n";
														
						echo "</tr>\n";
						
						echo "<tr>\n";
						echo "<td align='right'><a href='empjobseekerdetails.php?id_js=" . stripslashes($row['id_js']) . "'>More</a> </td>\n";
						echo "</tr>\n";
										
						echo "<tr>\n";
						echo "<td><hr></td>\n";
						echo "</tr>\n";
						
						echo "<tr>\n";
						
						echo "</tr>\n";
						
						echo "<tr>\n";
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