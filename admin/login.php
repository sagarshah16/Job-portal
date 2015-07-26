<?php ob_start(); ?>
<?php

session_start();

include ("./Class_Database.php");
$db= new database();
//$db->setup("kaushal", "kaushal", "localhost", "jobportaldb");	

if(isset($_POST['username']) && $_POST['username']!=="" && isset($_POST['password']) && $_POST['password']!=="" )
{

	$username= addslashes(strip_tags($_POST['username']));
	$password=$_POST['password'];
	$usertype=$_POST['usertype'];
	
	$query="Select * from admin where username='$username' and password='$password' and usertype='$usertype'";
	$res=$db->send_sql($query);
	
	if (mysql_num_rows($res)>0) 
	{
		while ($row = mysql_fetch_row($res))
		{
			$_SESSION['userid']=$row[0];	
		}
		$username=stripslashes($username);
		$_SESSION['username']=$username;
		
		if($usertype=="admin")
			header("location:admindashboard.php");
		
	}
	else
	{
		header("location:index.php?e=1");
	}
}
else
{
	header("location:index.php");	
}

?>