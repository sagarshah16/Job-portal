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
<title>Job Seeker - Personal Information</title>
<link rel="stylesheet" type="text/css" media="screen" href="css/maincss.css">
<script type="text/javascript">

</script>

<style type="text/css">

</style>

</head>

<body>

<div id="centered"><!-- Centered-->
<div align="right" style="color:#045"><a href="" style="color:#045">Welcome <b style='color:#933'><?php  if (isset($_SESSION['username'])) echo $_SESSION['username']; ?></b></a>  , <a href="logout.php" style="color:#045">Logout</a></div>
	
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
                    <li style="margin:0px"><a href="jspersonalinfo.php" style="font-size:12px; font-weight:bold;color:#333; cursor:pointer">Personal</a></li>
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
			if(isset($_POST['firstname_c']))$firstname=addslashes(strip_tags($_POST['firstname_c'])); else $firstname="";
				if($firstname=="")
				{ 
					header("location:jspersonalinfo.php?e=1");
				}
			if(isset($_POST['lastname_c']))$lastname=addslashes(strip_tags($_POST['lastname_c'])); else $lastname="";
				if($lastname=="")
				{ 
					header("location:jspersonalinfo.php?e=2");
				}
			if(isset($_POST['address1_c']))$address1=addslashes(strip_tags($_POST['address1_c'])); else $address1="";
				if($address1=="")
				{ 
					header("location:jspersonalinfo.php?e=3");
				}
			if(isset($_POST['city_c']))$city=addslashes(strip_tags($_POST['city_c'])); else $city="";
				if($city=="")
				{ 
					header("location:jspersonalinfo.php?e=4");
				}
			if(isset($_POST['state_c']))$state=addslashes(strip_tags($_POST['state_c'])); else $state="";
				if($state=="")
				{ 
					header("location:jspersonalinfo.php?e=5");
				}
			if(isset($_POST['zip_c']))$zip=addslashes(strip_tags($_POST['zip_c'])); else $zip="";
				if($zip=="")
				{ 
					header("location:jspersonalinfo.php?e=6");
				}
				else
				{
					if (!preg_match("/^([0-9]{5})(-[0-9]{4})?$/i", $zip))	
					header("location:jspersonalinfo.php?e=10");
				}
			if(isset($_POST['country_c']))$country=addslashes(strip_tags($_POST['country_c'])); else $country="";
				if($country=="")
				{ 
					header("location:jspersonalinfo.php?e=7");
				}
			if(isset($_POST['email_c']))$email=addslashes(strip_tags($_POST['email_c'])); else $email="";
				if($email=="")
				{ 
					header("location:jspersonalinfo.php?e=8");
				}
				else
				{
					if (!preg_match("/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/", $email))	
						header("location:jspersonalinfo.php?e=11");
				}
			if(isset($_POST['phone_c']))$mphone=addslashes(strip_tags($_POST['phone_c'])); else $mphone="";
				if($mphone=="")
				{ 
					header("location:jspersonalinfo.php?e=9");
				}
				else
				{
					if (!preg_match("/\d{10}/", $mphone))	
						header("location:jspersonalinfo.php?e=12");
				}
			if(isset($_POST['address2']))$address2=addslashes(strip_tags($_POST['address2'])); else $address2="";
				
			if(isset($_POST['contactp']))$contactp=addslashes(strip_tags($_POST['contactp'])); else $contactp="";
				
			if(isset($_POST['workauthorization']))$workauthorization=addslashes(strip_tags($_POST['workauthorization'])); else $workauthorization="";
			if(isset($_POST['address2']))$address2=addslashes(strip_tags($_POST['address2'])); else $address2="";
				
			if(isset($_POST['month']))$month=addslashes(strip_tags($_POST['month'])); else $month="";
				
			if(isset($_POST['day']))$day=addslashes(strip_tags($_POST['day'])); else $day="";
			if(isset($_POST['year']))$year=addslashes(strip_tags($_POST['year'])); else $year="";
				
			if(isset($_POST['gender']))$gender=addslashes(strip_tags($_POST['gender'])); else $gender="";
				
			if(isset($_POST['ethnicity']))$ethnicity=addslashes(strip_tags($_POST['ethnicity'])); else $ethnicity="";	
			if(isset($_POST['Bloodgroup']))$Blood_group=addslashes(strip_tags($_POST['Bloodgroup'])); else $Blood_group="";	
			
			include("./Class_Database.php");
			$db= new database();
			//$db->setup("kaushal", "kaushal", "localhost", "jobportaldb");	
			if (isset($_SESSION['userid']))
			{
				$id_user=$_SESSION['userid'];
							
			}
			else
			{
				header("location:index.php");
			}
			
			//EDIT FUNCTION
			
			if(isset($id_user))
			{	
				$query="UPDATE js_personalinfo set fname= '" .  addslashes(strip_tags($firstname )) . "',lname= '" .  addslashes(strip_tags($lastname )) . "',address1= '" .  addslashes(strip_tags($address1 )) . "',address2= '" .  addslashes(strip_tags($address2 )) . "',city= '" .  addslashes(strip_tags($city )) . "',state= '" .  addslashes(strip_tags($state )) . "',Zip= '" .  addslashes(strip_tags($zip )) . "',country= '" .  addslashes(strip_tags($country )) . "',email= '" .  addslashes(strip_tags($email )) . "',primarycontact_js= '" .  addslashes(strip_tags($mphone )) . "',contactpreference_js= '" .  addslashes(strip_tags($contactp )) . "',workauthorization= '" .  addslashes(strip_tags($workauthorization )) . "',gender_js= '" .  addslashes(strip_tags($gender )) . "',ethnicity_js= '" .  addslashes(strip_tags($ethnicity )) . "',birthyear_js= '" .  addslashes(strip_tags($year )) . "',birthmonth_js= '" .  addslashes(strip_tags($month )) . "',birthday_js= '" .  addslashes(strip_tags($day )) . "',bloodgroup_js= '" .  addslashes(strip_tags($Blood_group )) . "', updatedon=Now() where id_user=$id_user";
 				
			if ($res=$db->send_sql($query))
				{
					//echo "<h2>Education Details Updated Successfully!</h2>";
					//echo "<a href='jsviewprofile.php' class='button'>Back</a>  ";
					echo "<h2>Personal Details Updated Successfully!</h2>";
					echo "<a href='jsviewprofile.php' class='button'>View Profile</a>  ";
					//echo "<a href='emppersonalinfosave.php' class='button'>Edit</a><a href='empdashboard.php' class='button'>Back</a>  ";
				}
				else
				{
					header("Location:jspersonalinfo.php?e=4");	// Data can not be inserted.	
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