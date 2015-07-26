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
<title>Jobseeker Document Upload</title>
<link rel="stylesheet" type="text/css" media="screen" href="css/maincss.css">
<script type="text/javascript">

</script>

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
		  if (isset($_POST['type_file']) && $_POST['type_file']=="Resume")
		  {
			  if (isset($_POST['resumetitle']) && $_POST['resumetitle']=="")
			  {
				  header("location:jsresume.php?e=0");
			  }
			  // If user has uploaded the resume.
			  else if (isset($_FILES["resume"]) && $_FILES["resume"]["name"]!="")
			  {
				  if ($_FILES["resume"]["error"] > 0)
				  {
					  header("location:jsresume.php?e=1");
				  }
				  
				  else
				  {
					if($_FILES["resume"]["type"]!="application/pdf")
					{
						header("location:jsresume.php?e=2"); 	/*Wrong File Type*/
					}
					else if(($_FILES["resume"]["size"]/1024)>300)
					{
						header("location:jsresume.php?e=3"); 	/*File Size gets exceeded */
					}
					else
					{
						$resumetitle=$_POST['resumetitle'];
						$upload_dir="/uploads";
						$orig_name= $_FILES["resume"]["name"];
						$name="JSResume" . $_SESSION["userid"] . "_1";
						while(file_exists("uploads/"  . $name . ".pdf"))
						{
							$next_num=intval(substr($name, strrpos($name,"_")+1));
							$name=str_replace(substr($name, strrpos($name,"_")),"_" . ($next_num+1),$name);
						}
						
						/*If FIle is successfully uploaded, save the file path in DB*/
						if (move_uploaded_file($_FILES["resume"]["tmp_name"],"uploads/" . $name . ".pdf"))
						{
							if (SaveFile("R","pdf","uploads/" . $name . ".pdf",$resumetitle))
							{
								//header("location:jsdashboard.php");
								echo "<h2>Resume Uploaded Successfully!</h2>";
								echo "<a href='jsresume.php' class='button'>Add New Resume</a><a href='jsresume.php' class='button'>Back</a>  ";
							}
						}
						
					}
				   }
			    }

				// If User has copy pasted Resume in Text Field.
				else if(isset($_POST["resumetext"]) && $_POST["resumetext"]!="")
				{
					$resumetitle=$_POST['resumetitle'];
					$resumetext=$_POST["resumetext"];
					$length=strlen($resumetext);	
					if ($length<1000)
					{
						header("location:jsresume.php?e=4");	
					}
					else
					{
						$upload_dir="/uploads";
						$name="JSResume" . $_SESSION["userid"] . "_1";
						
						while(file_exists("uploads/"  . $name . ".text"))
						{
							$next_num=intval(substr($name, strrpos($name,"_")+1));
							$name=str_replace(substr($name, strrpos($name,"_")),"_" . ($next_num+1),$name);
						}
						$fp=fopen("uploads/" . $name . ".txt","w");
						fwrite($fp,$resumetext);
						fclose($fp);
						if (SaveFile("R","txt","uploads/" . $name . ".txt", $resumetitle))
						{
							//header("location:jsdashboard.php");
							echo "<h2>Resume Uploaded Successfully!</h2>";
							echo "<a href='jsresume.php' class='button'>Add New Resume</a><a href='jsresume.php' class='button'>Back</a>  ";
						}
						
					}
				}
				else
				{
					header("location:jsresume.php?e=0");	
				}
			
		  }
		  
		  
		  //If File Type is Cover Letter
		  else if(isset($_POST['type_file']) && $_POST['type_file']=="CoverLetter")
		  {
			  // If user has not provided the cover letter title.
			  if (isset($_POST['coverlettertitle']) && $_POST['coverlettertitle']=="")
			  {
				  header("location:jscoverletter.php?e=0");
			  }
			  // If user has uploaded the Cover Letter.
			  else if (isset($_FILES["coverletter"]) && $_FILES["coverletter"]["name"]!="")
			  {
				  if ($_FILES["coverletter"]["error"] > 0)
				  {
					  header("location:jscoverletter.php?e=1");
				  }
				  
				  else
				  {
					if($_FILES["coverletter"]["type"]!="application/pdf")
					{
						header("location:jscoverletter.php?e=2"); 	/*Wrong File Type*/
					}
					else if(($_FILES["coverletter"]["size"]/1024)>300)
					{
						header("location:jscoverletter.php?e=3"); 	/*File Size gets exceeded */
					}
					else
					{
						$title=$_POST['coverlettertitle'];
						$upload_dir="/uploads";
						$orig_name= $_FILES["coverletter"]["name"];
						$name="JSCover" . $_SESSION["userid"] . "_1";
						while(file_exists("uploads/"  . $name . ".pdf"))
						{
							$next_num=intval(substr($name, strrpos($name,"_")+1));
							$name=str_replace(substr($name, strrpos($name,"_")),"_" . ($next_num+1),$name);
						}
						
						/*If FIle is successfully uploaded, save the file path in DB*/
						if (move_uploaded_file($_FILES["coverletter"]["tmp_name"],"uploads/" . $name . ".pdf"))
						{
							if (SaveFile("C","pdf","uploads/" . $name . ".pdf", $title))
							{
								//header("location:jsdashboard.php");
								echo "<h2>Cover Letter Uploaded Successfully!</h2>";
								echo "<a href='jscoverletter.php' class='button'>Add New Cover Letter</a><a href='jscoverletter.php' class='button'>Back</a>  ";
							}
						}
						
					}
					
				}
			}

			// If User has copy pasted Resume in Text Field.
			else if(isset($_POST["coverlettertext"]) && $_POST["coverlettertext"]!="")
			{
				$coverlettertext=$_POST["coverlettertext"];
				$length=strlen($coverlettertext);	
				if ($length<1000)
				{
					header("location:jscoverletter.php?e=4");	
				}
				else
				{
					$title=$_POST['coverlettertitle'];
					$upload_dir="/uploads";
					$name="JSCover" . $_SESSION["userid"] . "_1";
					while(file_exists("uploads/"  . $name . ".text"))
					{
						$next_num=intval(substr($name, strrpos($name,"_")+1));
						$name=str_replace(substr($name, strrpos($name,"_")),"_" . ($next_num+1),$name);
					}
					$fp=fopen("uploads/" . $name . ".txt","w");
					fwrite($fp,$resumetext);
					fclose($fp);
					if (SaveFile("C","txt","uploads/" . $name . ".txt", $title))
					{
						//header("location:jsdashboard.php");
						echo "<h2>Cover Letter Uploaded Successfully!</h2>";
						echo "<a href='jscoverletter.php' class='button'>Add New Cover Letter</a><a href='jscoverletter.php' class='button'>Back</a>  ";
					}
					
				}
			}
			else
			{
				header("location:jscoverletter.php?e=0");	
			}
			  
		  }
			
			/*Return Job seeker Id for Given User ID*/
			function GetJobSeekerID($id_user,$db)
			{
				$query="Select id_js from js_personalinfo where id_user=$id_user";
				$id_js=0;
				if ($res=$db->send_sql($query))
				{
					while ($row = mysql_fetch_row($res))
					{
						$id_js=$row[0];	
					}				
				}	
				return $id_js;
			}
			
			/*Used to store Resumes/Coverletter information in DB*/
			function SaveFile($type_file,$format,$file_name, $title)
			{
				$title=addslashes(strip_tags($title));
				include("./Class_Database.php");
				$db= new database();
				//$db->setup("kaushal", "kaushal", "localhost", "jobportaldb");	
				$ip=$_SERVER['REMOTE_ADDR'];
				if (isset($_SESSION["userid"])) $id_user=$_SESSION["userid"];
				$id_js=GetJobSeekerID($id_user,$db);
			
				$query="Insert into js_files(id_js,id_user,type_file,title_file, path_file,ip,createdon,updatedon) values($id_js,$id_user,'" .  addslashes(strip_tags($type_file )) . "','" .  addslashes(strip_tags($title )) . "', '" .  addslashes(strip_tags($file_name )) . "','" .  addslashes(strip_tags($ip )) . "',Now(),Now())";
				if ($res=$db->send_sql($query))
				{
					return true;
				}
				else
					return false;
			
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