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
<title>Employer Dashboard</title>
<link rel="stylesheet" type="text/css" media="screen" href="css/maincss.css">
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
      
<?php

			if(isset($_POST['from']))$from=addslashes(strip_tags($_POST['from'])); else $from="";
		if(isset($_POST['to']))$to=addslashes(strip_tags($_POST['to'])); else $to="";
		if(isset($_POST['subject']))$subject=addslashes(strip_tags($_POST['subject'])); else $subject="";
		if($subject=="")
		     	{
					header("location:empsendmessage.php?e=1");
				}
		if(isset($_POST['body']))$body=addslashes(strip_tags($_POST['body'])); else $body="";
		if($body=="")
		     	{
					header("location:empsendmessage.php?e=2");
				}
		else if($body>= 500)
				{
					header("location:empsendmessage.php?e=3");
				}
		
			include("./Class_Database.php");
			$db= new database();
			//$db->setup("kaushal", "kaushal", "localhost", "jobportaldb");		
			//$userid=$_SESSION['userid'];
			//$usertype=$_SESSION['type_user'];
			

		
		 $query= "Insert Into admin_message(to_user,from_user,subject_user,body_user,senton) values ('" .  addslashes(strip_tags($to )) . "','" .  addslashes(strip_tags($from )) . "','" .  addslashes(strip_tags($subject )) . "','" .  addslashes(strip_tags($body )) . "',Now())";
				
		if ($res=$db->send_sql($query))
						{
							echo "<br>";
							echo "<h2>Message sent Successfully!</h2>";
							echo "<a href='empdashboard.php' class='button'>Back</a>  ";
						}
						else
						{
							header("Location:empsavesendmessage.php?e=4");	// Data can not be inserted.	
				
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
