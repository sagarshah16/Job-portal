<?php ob_start(); ?>
<?php

session_start();

if (!isset($_SESSION['username'])) 
{
	header('Location:index.php');
	
}
$messageid= $_GET['id'];
$block_messagestatus=$_POST['block_messagestatus'];
$to_user=$_SESSION['to_user'];
$from_user=$_SESSION['from_user'];
include ("./Class_Database.php");
$db= new database();
//$db->setup("kaushal", "kaushal", "localhost", "jobportaldb");	
$query= "select * from admin_message WHERE id_message =$messageid";
$res=$db->send_sql($query);	
if (mysql_num_rows($res)>0)
			{
				while ($row = mysql_fetch_array($res))
				{
					$to_user=stripslashes($row["to_user"]);
					$from_user=stripslashes($row["from_user"]);
				}
			}
			unset($res);
				
if(isset($block_messagestatus) && $block_messagestatus==1)
	{			
$query= "UPDATE admin_message SET blockmessage = '1' WHERE from_user ='$from_user' and to_user = '$to_user'";

	if ($res=$db->send_sql($query))
		{
			header("Location:admininbox.php");
		}
			else
		{
			echo "Try Again!";
		}
	}
	
	if(isset($block_messagestatus) && $block_messagestatus==0)
	{			
$query= "UPDATE admin_message SET blockmessage = '0' WHERE from_user ='$from_user' and to_user = '$to_user'";

	if ($res=$db->send_sql($query))
		{
			header("Location:admininbox.php");
		}
			else
		{
			echo "Try Again!";
		}
		}
	
?>