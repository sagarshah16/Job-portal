<?php ob_start(); ?>
<?php

session_start();

if ((!isset($_SESSION['username'])) && (!isset($_SESSION['userid'])))
{
	header('Location:index.php');
}
$flag=0;

if(isset($_GET['user_id']) && $_GET['user_id']!="")
	$user_id=$_GET['user_id'];
else
	$flag=1;
	
if(isset($_GET['job_id']) && $_GET['job_id']!="")
	$job_id=$_GET['job_id'];
else
	$flag=2;

if(isset($_GET['path_resume']) && $_GET['path_resume']!="")
	$path_resume=$_GET['path_resume'];
else
	$path_resume="";

if(isset($_GET['path_cover']) && $_GET['path_cover']!="")
	$path_cover=$_GET['path_cover'];
else
	$path_cover="";
	
if($flag==0)
{
	$id_user=$_SESSION['userid'];
	include ("./Class_Database.php");
	$db= new database();
	//$db->setup("root", "", "localhost", "jobportaldb");
	$query="Insert into js_jobapplicationdetails(id_job,id_user,path_resume,path_coverletter,application_status,application_date) values
	($job_id,$user_id,'" .  addslashes(strip_tags($path_resume )) . "','" .  addslashes(strip_tags($path_cover )) . "',0,Now())";
	if($res=$db->send_sql($query))
	{
		echo "Applied Successfully";
	}
	
}
else
{
	echo "Missing info";
}
?>