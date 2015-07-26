<?php ob_start(); ?>
<?php

session_start();

if (!isset($_SESSION['username']) || !isset($_SESSION['userid'])) 
{
	header('Location:index.php');
}

$id=$_SESSION['userid'];
if(isset($_GET['id']) && $_GET['id']!="" && isset($_GET['status']) && $_GET['status']!="")
{
	$id_record=$_GET['id'];	
	$id_job=$_GET['id_job'];
	$_SESSION['id_application']=$id_record;
	$_SESSION['jobs']=$id_job;
	$status=$_GET['status'];
	include("./Class_Database.php");
	$db= new database();
	//$db->setup("kaushal", "kaushal", "localhost", "jobportaldb");	
	$id_user=$_SESSION["userid"];
	$query="update js_jobapplicationdetails set application_status='" .  addslashes(strip_tags($status )) . "' where id_jobapplication=$id_record"; 
	$res=$db->send_sql($query);
	header("location:empjobapplications.php");
}
else
{
	echo "";
}



?>