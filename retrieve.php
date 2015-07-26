<?php

if(isset($_POST['retrieve']))	//If this page is called when user submits the security answer.
{
	if(isset($_POST['answer']) && $_POST['answer']!="")
	{
		$s_answer=addslashes(strip_tags($_POST['answer']));
		if(isset($_POST['username']) && isset($_POST['email']))
		{
			$uname=addslashes(strip_tags($_POST['username']));
			$email=addslashes(strip_tags($_POST['email']));	
			$s_question=addslashes(strip_tags($_POST['question']));
		}
		include("./Class_Database.php");
		$db= new database();
		//$db->setup("kaushal", "kaushal", "localhost", "jobportaldb");	
		
		$query="Select * from users where name_user='$uname' and email_user='$email' and securityquestion_user='$s_question' and securityanswer_user='$s_answer'";
		$res=$db->send_sql($query);
		if (isset($res) && mysql_num_rows($res)>0)
		{
			//SUCCESS
			while($row=mysql_fetch_array($res))
			{
				
				$message="<a href='reset_password.php?auth=" . stripslashes($row["key_user"]) . "'>Click Here To Reset Your Password</a>";
				echo $message;
				/*mail('$email', 'Password Reset', $message);*/		// Send Email To User.
				
			}
		}
		else
		{
			header("Location:forget.php?e=5");	 // Wrong Answer
		}
	}
	else
	{
		header("location:forget.php?e=6");	//Answer not provided.	
	}
}
else
{
	header("location:forget.php");
}

?>