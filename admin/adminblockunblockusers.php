<?php ob_start(); ?>
<?php

session_start();

if (!isset($_SESSION['username'])) 
{
	header('Location:index.php');
	
}
$userid= $_GET['id'];
$block_status=$_POST['block_status'];
include ("./Class_Database.php");
$db= new database();
//$db->setup("kaushal", "kaushal", "localhost", "jobportaldb");	

if(isset($block_status) && $block_status==1)
	{	
$query= "UPDATE users SET blockuser = '1' WHERE id_user = $userid;";
	if ($res=$db->send_sql($query))
		{
			header("Location:adminuserdetail.php");
		}
	else
		{
			echo "Try Again!";
		}
		}
		if(isset($block_status) && $block_status==0)
	{
	$query= "UPDATE users SET blockuser='0' WHERE id_user = $userid;";
	if ($res=$db->send_sql($query))
		{
			header("Location:adminuserdetail.php");
		}
	else
		{
			echo "Try Again!";
		}
	}
	
?>