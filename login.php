<?php ob_start(); ?>
<?php
session_start();

include ("./Class_Database.php");
$db= new database();
//$db->setup("root", "", "localhost", "jobportaldb");
if (isset($_POST['usertype']) && $_POST['usertype']!="")
{
	$usertype=$_POST['usertype'];	
}
else
{
	$usertype="JobSeeker";	
}
if(isset($_POST['username']) && $_POST['username']!=="" && isset($_POST['password']) && $_POST['password']!=="" )
{

	$username= addslashes(strip_tags($_POST['username']));
	$password=md5($_POST['password']);
	
	
	$query="Select * from users where name_user='$username' and password_user='$password' and type_user='$usertype'";
	$res=$db->send_sql($query);
	
	if (mysql_num_rows($res)>0) 
	{
		$isblocked=0;
		while ($row = mysql_fetch_row($res))
		{
			$isblocked=$row[8];
			$_SESSION['userid']=$row[0];	
		}
		if($isblocked==0)
		{
			$username=stripslashes($username);
			$_SESSION['username']=$username;
			$_SESSION['usertype']=$usertype;
			//echo $isblocked;
			if($usertype=="JobSeeker")
			{
				include "/admin/admintrack.php";
				header("location:jsdashboard.php");
			}
			else if($usertype=="Employer")
			{
				include "/admin/admintrack.php";
				header("location:empdashboard.php");
			}
		}
		else if($isblocked==1)
		{
			if($usertype=="JobSeeker")
				header("location:index.php?e=4&profile=JS");
			else if($usertype=="Employer")
				header("location:index.php?e=4&profile=EMP");
		}
		
		
	}
	else
	{
		if($usertype=="JobSeeker")
			header("location:index.php?e=1&profile=JS");
		else if($usertype=="Employer")
			header("location:index.php?e=1&profile=EMP");
	}
}
else
{
	if(isset($usertype) && $usertype=="JobSeeker")
	{
		if (isset($_POST['username']) && $_POST['username']=="") 
			header("location:index.php?e=2&profile=JS");
		else if (isset($_POST['password']) && $_POST['password']=="")	
			header("location:index.php?e=3&profile=JS");
		else
			header("location:index.php?profile=JS");
	}
	else if(isset($usertype) && $usertype=="Employer")
	{
		if (isset($_POST['username']) && $_POST['username']=="") 
			header("location:index.php?e=2&profile=EMP");
		else if (isset($_POST['password']) && $_POST['password']=="")	
			header("location:index.php?e=3&profile=EMP");
		else
			header("location:index.php?profile=EMP");	
	}
	
}

?>