<?php ob_start(); ?>
<?php

session_start();

/*Store all the values in session in order to retain the values in registration page.*/
if (isset($_POST['fname']) && $_POST['fname']!="")
{
	$_SESSION['fname']=addslashes(strip_tags($_POST['fname']));
	$fname=addslashes(strip_tags($_POST['fname']));
}
else
{
	header("location:register.php?e=1");	
}

if (isset($_POST['lname']) && $_POST['lname']!="")
{
	$_SESSION['lname']=addslashes(strip_tags($_POST['lname']));
	$lname=addslashes(strip_tags($_POST['lname']));
}
else
{
	header("location:register.php?e=2");	
}

if (isset($_POST['uname']) && $_POST['uname']!="")
{
	$_SESSION['uname']=addslashes(strip_tags($_POST['uname']));
	$uname=addslashes(strip_tags($_POST['uname']));
}
else
{
	header("Location:register.php?e=3");	
}

if (isset($_POST['usertype']) && $_POST['usertype']!="")
{
	$utype=addslashes(strip_tags($_POST['usertype']));
}

if (isset($_POST['email']) && $_POST['email']!="")
{
	$_SESSION['email']=addslashes(strip_tags($_POST['email']));
	$email=addslashes(strip_tags($_POST['email']));
}
else
{
	header("location:register.php?e=4");
}

if (isset($_POST['pwd']) && $_POST['pwd']!="")
{
	$pwd=md5($_POST['pwd']);	/*Encrypt the password*/
}
else
{
	header("location:register.php?e=5");	
}

if (!(isset($_POST['cnfpwd']) && $_POST['cnfpwd']))
{
	header("location:register.php?e=6");
}

if (isset($_POST['pwd']) && isset($_POST['cnfpwd']) && $_POST['pwd']!="" && $_POST['cnfpwd']!="")
{
	if ($_POST['pwd']!=$_POST['cnfpwd'])
	{
		header("location:register.php?e=11");	
	}
}

if (isset($_POST['question']) && $_POST['question']!="")
{
	$_SESSION['question']=addslashes(strip_tags($_POST['question']));
	$question=addslashes(strip_tags($_POST['question']));
}
else
{
	header("location:register.php?e=7");
}

if (isset($_POST['answer']) && $_POST['answer']!="")
{
	$_SESSION['answer']=addslashes(strip_tags($_POST['answer']));
	$answer=strtolower(addslashes(strip_tags($_POST['answer'])));
}
else
{
	header("location:register.php?e=8");
}

include ("./Class_Database.php");
$db= new database();
//$db->setup("root", "", "localhost", "jobportaldb");

$query="Select * from users where name_user='$uname' or email_user='$email'";

if ($res=$db->send_sql($query))
{
	if (mysql_num_rows($res)<=0)
	{
		if (isset($res)) 
		{
			unset($res);
		}
		$random=GetRandomKey();
		$query="Insert Into users(name_user,type_user,password_user,email_user,securityquestion_user, securityanswer_user, key_user,  createdon,updatedon)
		values('" .  addslashes(strip_tags($uname )) . "','" .  addslashes(strip_tags($utype )) . "','" .  addslashes(strip_tags($pwd )) . "','" .  addslashes(strip_tags($email )) . "','" .  addslashes(strip_tags($question )) . "','" .  addslashes(strip_tags($answer )) . "', '" .  addslashes(strip_tags($random )) . "', Now(),Now())";
		
		
		if ($res=$db->send_sql($query))
		{
			$id=$db->insert_id();
			if($utype=="JobSeeker")
				$query="Insert Into js_personalinfo(id_user,fname,lname,email,createdon) values ('" .  addslashes(strip_tags($id )) . "','" .  addslashes(strip_tags($fname )) . "','" .  addslashes(strip_tags($lname )) . "','" .  addslashes(strip_tags($email )) . "',Now())";
			else if($utype=="Employer")
				$query="Insert Into emp_personalinfo(id_user,contactpersonfirstname,contactpersonlastname,email,createdon) values ('" .  addslashes(strip_tags($id )) . "','" .  addslashes(strip_tags($fname )) . "','" .  addslashes(strip_tags($lname )) . "','" .  addslashes(strip_tags($email )) . "',Now())";
			if (isset($res))
			{
				unset($res);
			}
			if ($res=$db->send_sql($query))
			{
				header("location:register.php?s=1");
			}
		}
	}
	else
	{
		while($row = mysql_fetch_row($res))
		{
			if ($row[4]==$email)
				header("location:register.php?e=9");
			else if ($row[1]==$uname)
				header("location:register.php?e=10");	
		}
	}
}

function GetRandomKey()
{
	return md5(mt_rand());
}
?>