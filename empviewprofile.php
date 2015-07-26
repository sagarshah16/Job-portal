<?php ob_start(); ?>
<?php

session_start();

if (!isset($_SESSION['username'])) 
{
	header('Location:index.php?profile=EMP');
	
}
$id=$_SESSION['userid'];
	if(isset($id))
	{
		include("./Class_Database.php");
		$db= new database();
		//$db->setup("root", "", "localhost", "jobportaldb");
		$query="SELECT * from emp_personalinfo where id_user=$id"; 
		echo $query;
		$res=$db->send_sql($query);
			while($row = mysql_fetch_array( $res )) 
			{
			$companyname=stripslashes($row['companyname']); 
			$companyprofile=stripslashes($row['companyprofile']); 
			$companytype=stripslashes($row['companytype']);
			$contactpersonfirstname=stripslashes($row['contactpersonfirstname']);
			$contactpersonlastname=stripslashes($row['contactpersonlastname']);
			$designation=stripslashes($row['designation']);
			$phonenumber=stripslashes($row['phonenumber']);
			$mobilenumber=stripslashes($row['mobilenumber']);
			$email=stripslashes($row['email']);
			$url=stripslashes($row['url']);
			$address1=stripslashes($row['address1']);
			$address2=stripslashes($row['address2']);
			$city=stripslashes($row['city']);
			$state=stripslashes($row['state']);
			$zip=stripslashes($row['zip']);
			$country=stripslashes($row['country']);
			}
	}
//include("Combo_Values.php");

?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Employeer - Company Information</title>
	<link rel="stylesheet" type="text/css" media="screen" href="css/maincss.css">
<style type="text/css">
td
{
width:5%; 
background-color:#CCC;
}
th
{
width:3%; 
background-color:#045; 
color:#FFF;
}
tr
{
text-align:left;
}
</style>
</head>
<body>
	<div id="centered"><!-- Centered-->
	<div align="right" style="color:#045"><a href="" style="color:#045">Welcome <b style='color:#933'><?php  if (isset($_SESSION['username'])) echo $_SESSION['username']; ?></b></a> , <a href="logout.php" style="color:#045">Logout</a></div>
    	<?php 
		
		include("header.html"); 
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
         <hr size="1" color="#069"  align="center">
	        <h2>Personal Information</h2>
             <hr size="1" color="#069"  align="center">
            <form name="form1" method="post" action="emppersonalinfo.php">
			<table border="0" width="100%" cellpadding="5px" cellspacing="0" style="font-family:Verdana, Geneva, sans-serif; font-size:12px">
				<tr>
					<td id="errormessage" colspan="2" align="left" style="background-color:#FFF"> </td>
				</tr>
				
				<tr>
                    <th>Company Name:</th><td><?php if(isset($companyname))echo $companyname; else $companyname=""; ?> </td>
				</tr>
				<tr>
                <tr>
                    <th>Company Profile:</th><td><br/><br/><?php if(isset($companyprofile))echo $companyprofile; else $companyprofile=""; ?> </td>
				</tr>
				<tr>
					<th>Company Type:</th><td><?php if(isset($companytype))echo $companytype; else $companytype="";?>  </td>
				</tr>
                <tr>
					<th>Contact Person First Name:</th><td><?php if(isset($contactpersonfirstname)) echo $contactpersonfirstname; else $contactpersonfirstname="";?> 	</td>
				</tr>
                <tr>
                    <th>Contact Person Last Name:</th><td><?php if(isset($contactpersonlastname))echo $contactpersonlastname; else $contactpersonlastname=""; ?> 	</td>
				</tr>
				<tr>
					<th>Designation:</th><td><?php if(isset($designation))echo $designation; else $designation=""; ?></td>
				</tr>
                <tr>
					<th>Phonenumber:</th><td><?php if(isset($phonenumber))echo $phonenumber; else $phonenumber=""; ?></td>
				</tr>
				<tr>
					<th>MobileNumber:</th><td><?php if(isset($mobilenumber))echo $mobilenumber; else $mobilenumber=""; ?> </td>
				</tr>
                <tr>
					<th>Email:</th><td><?php if(isset($email))echo $email; else $email=""; ?></td></tr>
                <tr>
                    <th>Url:</th><td><?php if(isset($url))echo$url; else $url=""; ?>	</td>
				</tr>
				<tr>
					<th>Address1:</th><td><?php if(isset($address1))echo $address1; else $address1=""; ?></td>
				</tr>
				<tr>
                   <th>Address2:</th><td><?php if(isset($address2))echo $address2; else $address2=""; ?>    	</td>
				</tr>
				<tr>
            	    <th>City:</th><td><?php if(isset($city))echo $city; else $city=""; ?></td>
            	</tr>
                <tr>
					<th>State:</th><td><?php if(isset($state))echo$state; else $state=""; ?></td>
            	</tr>
                <tr>
           	        <th>Zip:</th><td><?php if(isset($zip))echo$zip; else $zip=""; ?></td>
                </tr>
                 
                <tr>
					<th>Country:</th><td><?php if(isset($country))echo$country; else $country=""; ?></td>
                </tr>
                
               <tr align='left' style='background-color:#AAA; color:#FFF'><td width='25%' style='background-color:#AAA; color:#FFF'></td><td width='25%' align='right' style='background-color:#AAA; color:#FFF'><a href='emppersonalinfo.php' style='text-decoration:none; color:#FFF ' >Edit</a><input type='submit' name='edit' style='border:none; cursor:pointer; margin:0px; background:none;  background-image:url(Images/edit.png); width:16px; height:16px' value=''></input></td></tr>
			</table>
			
            </form>
      	</div>
		</div>
        <!--SECOND COLUMN-->
    </div> <!--Width-->   
    </div><!-- Content-->
    </div><!-- Centered-->
</body>
</html>