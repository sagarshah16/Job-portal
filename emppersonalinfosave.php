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
<title>Employeer - Company Information</title>
<link rel="stylesheet" type="text/css" media="screen" href="css/maincss.css">
<script type="text/javascript">

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
      	<div style="padding:10px; min-height:680px; background-color:#CCC">
        	<table border="0" cellpadding="0" cellspacing="0">
            <tr>
            	<td><label style="font-size:14px; font-weight:bold; cursor:pointer" onClick="">Employer Profile</label></td>
            </tr>
            <tr>
               	<td>
                <ul>
                    
		     <li><a href="emppersonalinfo.php" style="font-size:12px; font-weight:bold; color:#000; cursor:pointer" onClick="">Company Information</a></li>
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
	      <?php
		 
		if(isset($_POST['companytype_c']))$companytype=addslashes(strip_tags($_POST['companytype_c'])); else $companytype="";
			
			if($companytype=="Select Company Type")
			{
				header("location:empjobdetail.php?e=11");
				
			}
			if(isset($_POST['state_c']))$state=addslashes(strip_tags($_POST['state_c'])); else $state="";
			
			if($state=="Select State")
			{
				header("location:empjobdetail.php?e=12");
				
			}
			if(isset($_POST['country_c']))$country=addslashes(strip_tags($_POST['country_c'])); else $country="";
			
			if($country=="Select Country")
			{
				header("location:empjobdetail.php?e=13");
				
			}
          if(isset($_POST['contactpersonfirstname_c'])) $contactpersonfirstname=addslashes(strip_tags($_POST['contactpersonfirstname_c'])); else $contactpersonfirstname="";
		  if($contactpersonfirstname=="")
		  {
				header("location:emppersonalinfo.php?e=1");
		  }
		
		if(isset($_POST['contactpersonlastname_c'])) $contactpersonlastname=addslashes(strip_tags($_POST['contactpersonlastname_c'])); else $contactpersonlastname="";
		  if($contactpersonlastname=="")
		  {
				header("location:emppersonalinfo.php?e=2");
		  }
			
			
			if(isset($_POST['companyname_c']))$companyname=addslashes(strip_tags($_POST['companyname_c'])); else $companyname="";
			
			if($companyname=="")
			{
				header("location:emppersonalinfo.php?e=3");
				
			}
			if(isset($_POST['companyprofile_c']))$companyprofile=addslashes(strip_tags($_POST['companyprofile_c'])); else $companyprofile="";
			
			if($companyprofile=="")
			{
				header("location:emppersonalinfo.php?e=4");
				
			}
			if(isset($_POST['phonenumber_c']))$phonenumber=addslashes(strip_tags($_POST['phonenumber_c'])); else $phonenumber="";
			
			if($phonenumber=="")
			{
				header("location:emppersonalinfo.php?e=5");
			}
			else
			{
				if (!preg_match("/\d{10}/", $phonenumber))	
					header("location:emppersonalinfo.php?e=17");
			}
			
			if(isset($_POST['email_c']))$email=addslashes(strip_tags($_POST['email_c'])); else $email="";
			
			if($email=="")
			{
				header("location:emppersonalinfo.php?e=9");
			}
			else
			{
				if (!preg_match("/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/", $email))	
					header("location:emppersonalinfo.php?e=14");
			}
			
			if(isset($_POST['address1_c']))$address1=addslashes(strip_tags($_POST['address1_c'])); else $address1="";
			
			if($address1=="")
			{
				header("location:emppersonalinfo.php?e=6");
				
			}
			
			if(isset($_POST['address2_c']))$address2=addslashes(strip_tags($_POST['address2_c'])); else $address2="";
			
			if($address2=="")
			{
				header("location:emppersonalinfo.php?e=6");
				
			}
			
			if(isset($_POST['url_c']))$url=addslashes(strip_tags($_POST['url_c'])); else $url="";
			
			if($url=="")
			{
				header("location:emppersonalinfo.php?e=7");
			}
			else
			{
				if (!preg_match("/^[a-zA-Z0-9\-\.]+\.(com|org|net|mil|edu|COM|ORG|NET|MIL|EDU)/", $url))	
					header("location:emppersonalinfo.php?e=15");
			}
			
			if(isset($_POST['city_c']))$city=addslashes(strip_tags($_POST['city_c'])); else $city="";			
			if($city=="")
			{
				header("location:emppersonalinfo.php?e=10");
				
			}
			
			if(isset($_POST['zip_c']))$zip=addslashes(strip_tags($_POST['zip_c'])); else $zip="";
			
			if($zip=="")
			{
				header("location:emppersonalinfo.php?e=10");
			}
			else
			{
				if (!preg_match("/^([0-9]{5})(-[0-9]{4})?$/i", $zip))	
					header("location:emppersonalinfo.php?e=16");
			}
			
		if(isset($_POST['designation']))$designation=addslashes(strip_tags($_POST['designation']));else $designation="";
			if(isset($_POST['mobilenumber']))$mobilenumber=addslashes(strip_tags($_POST['mobilenumber']));else $mobilenumber="";
					
				
			
			include("./Class_Database.php");
			$db= new database();
			//$db->setup("kaushal", "kaushal", "localhost", "jobportaldb");	
			if (isset($_SESSION['userid']))
			{
				$id=$_SESSION['userid'];
							
			}
			else
			{
				header('Location:index.php');
			}
			
			//EDIT FUNCTIONALITY
			
			if(isset($id))
			{
				$query="UPDATE emp_personalinfo set contactpersonfirstname='" .  addslashes(strip_tags($contactpersonfirstname )) . " ',contactpersonlastname='" .  addslashes(strip_tags($contactpersonlastname )) . "',companyname='" .  addslashes(strip_tags($companyname )) . "',companyprofile='" .  addslashes(strip_tags($companyprofile )) . "',companytype='" .  addslashes(strip_tags($companytype )) . "',designation='" .  addslashes(strip_tags($designation )) . "',phonenumber='" .  addslashes(strip_tags($phonenumber )) . "',mobilenumber='" .  addslashes(strip_tags($mobilenumber )) . "',email='" .  addslashes(strip_tags($email )) . "',url='" .  addslashes(strip_tags($url )) . "',address1='" .  addslashes(strip_tags($address1 )) . "',address2='" .  addslashes(strip_tags($address2 )) . "', city='" .  addslashes(strip_tags($city )) . "', state='" .  addslashes(strip_tags($state )) . "',zip='" .  addslashes(strip_tags($zip )) . "',country='" .  addslashes(strip_tags($country )) . "',updatedon=Now() where id_user=$id";  
	
				
				if ($res=$db->send_sql($query))
				{
					//echo "<h2>Education Details Updated Successfully!</h2>";
					//echo "<a href='jsviewprofile.php' class='button'>Back</a>  ";
					echo "<h2>Personal Details Edited Successfully!</h2>";
					echo "<a href='empviewprofile.php' class='button'>View Profile</a>  ";
					//echo "<a href='emppersonalinfosave.php' class='button'>Edit</a><a href='empdashboard.php' class='button'>Back</a>  ";
				}
				else
				{
					header("Location:empjobdetail.php?e=4");	// Data can not be inserted.	
				}	
					
			}
			
			//INSERT FUNCTIONALITY
			  
		  ?>
      	</div>
      </div>
        <!--SECOND COLUMN-->
            
    </div> <!--Width-->   
    </div><!-- Content-->
        
</div><!-- Centered-->





</body>
</html>