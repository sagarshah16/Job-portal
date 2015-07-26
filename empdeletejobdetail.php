<?php ob_start(); ?>
<?php

session_start();

if (!isset($_SESSION['username']) || !isset($_SESSION['userid'])) 
{
	header('Location:index.php?profile=EMP');
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
//$db->setup("root", "", "localhost", "jobportaldb");

if (isset($_GET['profile']) && $_GET['profile']=="Emp_Jobdetail")
{
	$query="Delete from emp_jobdetails where id_job=$record_id and id_user=$id";
	if ($res=$db->send_sql($query))
	{
		header("Location:empviewjobdetail.php");	
	}
}

?>