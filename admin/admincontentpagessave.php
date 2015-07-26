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
<title>Send Message</title>
<link rel="stylesheet" type="text/css" media="screen" href="css/maincss.css">
<script type="text/javascript">

</script>

</head>

<body>

<div id="centered"><!-- Centered-->
<div align="right" style="color:#045"><a href="admindashboard.php" style="color:#045">Welcome <b style='color:#933'><?php  if (isset($_SESSION['username'])) echo $_SESSION['username']; ?></b></a>  , <a href="logout.php" style="color:#045">Logout</a></div>
	
	<?php include("header.html"); ?>
    
	<div class="content"><!-- Content-->
  	<div style="width:100%"><!--Width-->
        	
      <!--FIRST COLUMN-->
      <div style="float:left; width:30%; background-color:#FFF;">
      	<div style="padding:10px; min-height:680px; background-color:#CCC">
        	<table border="0" cellpadding="0" cellspacing="0">
            <tr>
            	<td><label style="font-size:14px; font-weight:bold; cursor:pointer" onClick="">Users Detail</label></td>
            </tr>
            <tr>
               	<td>
                <ul>
                   		 <li><a href="adminuserdetail.php" style="font-size:12px; font-weight:bold; cursor:pointer">Job Seeker Detail</a></li>
                    		<li><a href="adminemployerdetail.php" style="font-size:12px; font-weight:bold; cursor:pointer" onClick="">Employer Detail</a></li>
		     		<li><a href="admincountuser.php" style="font-size:12px; font-weight:bold; cursor:pointer;">Web Visitor Counter</a></li>
                </ul>
               </td>
            </tr>
            </tr>
                  <tr>
            	<td><label style="font-size:14px; font-weight:bold; cursor:pointer" onClick=""><br/>Page Content Change</label></td>
            </tr>
            <tr>
                <td>
					<ul>
						<li><a href="adminhomeedit.php" style="font-size:12px; font-weight:bold; cursor:pointer;">Home Page</a></li>
						<li><a href="admincontactusedit.php" style="font-size:12px; font-weight:bold; cursor:pointer" onClick="">Contact Us</a></li>
						<li><a href="adminaboutusedit.php" style="font-size:12px; font-weight:bold; cursor:pointer" onClick="">About Us</a></li>
					</ul>
                </td>
            </tr> 
            <tr>
              <td>
            	 <li><a href="adminsentmessage.php" style="font-size:12px; font-weight:bold; cursor:pointer">Sent Message</a></li>
                 </td>
            </tr>
            <tr>
           
             <td>
            	 <li><a href="admintrash.php" style="font-size:12px; font-weight:bold; cursor:pointer">Trash</a></li>
                 </td>
            </tr>
            <tr>
             <td>
            	 <li><a href="admininbox.php" style="font-size:12px; font-weight:bold; cursor:pointer">Inbox</a></li>
                 </td>
            </tr>
            </table>
      	</div>
      </div>
      <!--FIRST COLUMN-->
<?php

	if (!isset($_SESSION['username'])) 
	{
		header('Location:index.php');
	}

$username = $_SESSION['username'];
include ("./Class_Database.php");
$db= new database();
//$db->setup("kaushal", "kaushal", "localhost", "jobportaldb");	
if(isset($_POST['homepage']))$homepage=addslashes(strip_tags($_POST['homepage'])); else $homepage="";
if(isset($_POST['contactus']))$contactus=addslashes(strip_tags($_POST['contactus'])); else $contactus="";
if(isset($_POST['aboutus']))$aboutus=addslashes(strip_tags($_POST['aboutus'])); else $aboutus="";


if(isset($_POST['homesave']))
{
	if($_POST['homesave']=='home')
	{
		$query= "UPDATE admin SET homepage= '" .  addslashes(strip_tags($homepage)) . "' WHERE username = '$username';";
		if ($res=$db->send_sql($query))
		{
			echo "<br>";
			echo "<h2>Home page edited Successfully!</h2>";
			echo "<a href='admindashboard.php' class='button'>Back</a>  ";
		}
	else
		{
			echo "Try Again!";
		}
	}
}
elseif(isset($_POST['contactsave']))
{
	if($_POST['contactsave']=='contact')
	{
		$query= "UPDATE admin SET contactus = '" .  addslashes(strip_tags($contactus)) . "' WHERE username = '$username';";
		if ($res=$db->send_sql($query))
		{
			echo "<br>";
			echo "<h2>Contactus edited Successfully!</h2>";
			echo "<a href='admindashboard.php' class='button'>Back</a>  ";
		}
	else
		{
			echo "Try Again!";
		}
	}
}
elseif(isset($_POST['aboutsave']))
{
	
	if($_POST['aboutsave'] == 'about')
	{
		$query= "UPDATE admin SET aboutus =  '" .  addslashes(strip_tags($aboutus)) . "' WHERE username = '$username';";
		if ($res=$db->send_sql($query))
		{
			echo "<br>";
			echo "<h2>About us edited Successfully!</h2>";
			echo "<a href='admindashboard.php' class='button'>Back</a>  ";
		}
	else
		{
			echo "Try Again!";
		}
	}
}
 
		  ?>
		  
     </table>
         
      	</div>
      </div>
        <!--SECOND COLUMN-->
        
    </div> <!--Width-->   
    </div><!-- Content-->
        
</div><!-- Centered-->
</body>
</html>
