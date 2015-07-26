<?php ob_start(); ?>
<?php

session_start();

if (!isset($_SESSION['username'])) 
	{
		header('Location:index.php');
	}
	include("./Class_Database.php");
	$db= new database();
	//$db->setup("kaushal", "kaushal", "localhost", "jobportaldb");		
  	$username=$_SESSION['username'];
	$query="Select * from admin where username='$username'";
	if($res=$db->send_sql($query))
	{
		if (mysql_num_rows($res)>0)
		{
			while ($row = mysql_fetch_array($res))
			{
				$homepage=stripslashes($row["homepage"]);
				
				
			}
		}
	}
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Home Page</title>
<link rel="stylesheet" type="text/css" media="screen" href="css/maincss.css">
</head>

<body>

<div id="centered"><!-- Centered-->
<div align="right" style="color:#045"><a href="admindashboard.php"  style="color:#045">Welcome <b style='color:#933'><?php  if (isset($_SESSION['username'])) echo $_SESSION['username']; ?></b></a>  , <a href="logout.php" style="color:#045">Logout</a></div>
	
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
						<li><a href="adminhomeedit.php" style="font-size:12px; font-weight:bold; cursor:pointer;  color:#000;">Home Page</a></li>
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
              <td>
            	 <li><a href="admininbox.php" style="font-size:12px; font-weight:bold; cursor:pointer">Inbox</a></li>
                 </td>
            </tr>
            <tr>
            
            </table>
      	</div>
      </div>
      <!--FIRST COLUMN-->
      
      <!--SECOND COLUMN-->
      <div style="float:left; width:70%; background-color:#FFF">
      	<div style="padding:10px">
	         <h2>Website Pages</h2>
             <form action="admincontentpagessave.php" name="frmupload" method="post" enctype="multipart/form-data" onSubmit="return validate();">
             <input type="hidden" name="homesave" value="home">
            
           	 <table border="0" cellpadding="5px" cellspacing="0" style="font-family:Verdana, Geneva, sans-serif; font-size:12px">
             <tr>
            	<td id="errormessage" colspan="2" align="left">
                <?php
                	if(isset($_GET['e']) && $_GET['e']=="3")
					{
						echo "<b style='color:red'>File size exceeds the maximum allowed size!</b>";	
					}
					
					else if(isset($_GET['e']) && $_GET['e']=="4")
					{
						echo "<b style='color:red'>Minimum Text size is 1000 Characters!</b>";	
					}
					
				?>
                </td>
             </tr>
             <tr>    <td style="width:150px; vertical-align:text-top"><label style="font-weight:bold">Home Page:</label><label style="color:red; font-weight:bold">*</label></td></tr>
             
             <tr>
            
                <td><textarea name="homepage" id="homepage" cols="80" rows="25" ><?php if(isset($homepage)) echo $homepage;?></textarea></td>
             </tr>
             
             <tr>
                <td style="width:150px; vertical-align:text-top"align="right"><input type="submit" name="submit" value="Submit" /> <input type="reset" name="reset" value="Reset" /></td> <td ></td>
             </tr>
             
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

