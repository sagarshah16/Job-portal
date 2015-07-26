<?php ob_start(); ?>
<?php

session_start();

if (!isset($_SESSION['username']) || !isset($_SESSION['userid'])) 
{
	header('Location:index.php');
}
$id=$_SESSION['userid'];
if(isset($_GET['id']) && $_GET['id']!="")
{
	$record_id=$_GET['id'];
}
else
{
	header("Location:jsviewprofile.php");
}

include("./Class_Database.php");
$db= new database();
//$db->setup("kaushal", "kaushal", "localhost", "jobportaldb");	


// Delete function for educational
if (isset($_GET['profile']) && $_GET['profile']=="educational")
{
	$query="Delete from js_edu where edu_id=$record_id and id_user=$id";
	if ($res=$db->send_sql($query))
	{
		header("Location:jsviewprofile.php");	
	}
}


// Delete function for experience
if (isset($_GET['profile']) && $_GET['profile']=="experience")
{
	$query="Delete from js_experience where exp_id=$record_id and id_user=$id";
	if ($res=$db->send_sql($query))
	{
		header("Location:jsviewprofile.php");	
	}
}

// Delete function for certification
if (isset($_GET['profile']) && $_GET['profile']=="certification")
{
	$query="Delete from js_certification where certi_id=$record_id and id_user=$id";
	if ($res=$db->send_sql($query))
	{
		header("Location:jsviewprofile.php");	
	}
}

// Delete function for skill
if (isset($_GET['profile']) && $_GET['profile']=="skill")
{
	$query="Delete from js_skill where skill_id=$record_id and id_user=$id";
	if ($res=$db->send_sql($query))
	{
		header("Location:jsviewprofile.php");	
	}
}


// Delete function for resume and coverletter
if (isset($_GET['profile']) && ($_GET['profile']=="resume" || $_GET['profile']=="coverletter"))
{
	
	$query="Select path_file from js_files where id_file=$record_id";
	if ($res=$db->send_sql($query))
	{
		while($row= mysql_fetch_array($res))	
		{
			$file=$row[0];
			unlink($file);	
			
		}
	}
	
	$query="Delete from js_files where id_file=$record_id and id_user=$id";
	if ($res=$db->send_sql($query))
	{
		header("Location:jsviewprofile.php");	
	}
	
}
?>