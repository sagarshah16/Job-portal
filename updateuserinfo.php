<?php ob_start(); ?>
<?php

session_start();

if (isset($_POST['key']) && $_POST['key']!="")
{
	$auth=addslashes(strip_tags($_POST['key']));
}
else
{
	header("Location:index.php");	
}

if (isset($_POST['uname']) && $_POST['uname']!="")
{
	$uname=addslashes(strip_tags($_POST['uname']));
}
else
{
	header("Location:reset_password.php?e=1");	
}

if (isset($_POST['email']) && $_POST['email']!="")
{
	$email=addslashes(strip_tags($_POST['email']));
}
else
{
	header("location:reset_password.php?e=2");
}

if (isset($_POST['pwd']) && $_POST['pwd']!="")
{
	$pwd=md5($_POST['pwd']);	/*Encrypt the password*/
}
else
{
	header("location:reset_password.php?e=3");	
}

if (!(isset($_POST['cnfpwd']) && $_POST['cnfpwd']))
{
	header("location:reset_password.php?e=4");
}

if (isset($_POST['pwd']) && isset($_POST['cnfpwd']) && $_POST['pwd']!="" && $_POST['cnfpwd']!="")
{
	if ($_POST['pwd']!=$_POST['cnfpwd'])
	{
		header("location:reset_password.php?e=5");	
	}
}

include ("./Class_Database.php");
$db= new database();
//$db->setup("root", "", "localhost", "jobportaldb");

//get the record for given username,password and Aunthentication Key.
$query="Select * from users where name_user='$uname' and email_user='$email' and key_user='$auth'";

//If record is found then only update it.
if ($res=$db->send_sql($query))
{
	if (mysql_num_rows($res)==1)
	{
		if (isset($res)) 
		{
			unset($res);
		}
		$random=GetRandomKey();
		$query="Update users set password_user= '" .  addslashes(strip_tags($pwd )) . "',key_user= '" .  addslashes(strip_tags($random )) . "',updatedon=Now() where name_user= '$uname' and email_user= '$email'";
		
		if ($res=$db->send_sql($query))
		{
			session_destroy();
			header("location:reset_password.php?s=1");
		}
		else
		{
			header("location:reset_password.php?e=6");	//Record couldnt be updated
		}
	}
	else
	{
		header("location:index.php");
	}
}
else
{
	header("location:reset_password.php?e=7");		// Invalid Attempt to reset password.	
}
function GetRandomKey()
{
	return md5(mt_rand());
}
?>