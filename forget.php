<?php ob_start(); ?>
<?php

session_start();

$validation_flag=0;
	if(isset($_POST['forget_request']) && $_POST['forget_request']=="forget_username")
	{
		if(isset($_POST['email1']) && $_POST['email1']!="")
		{
			$email=addslashes(strip_tags($_POST['email1']));
			$pattern = "^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$";
			if(!preg_match("/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/", $email))
			{
				$validation_flag=1; //invalid email	
			}
			else
			{
				//$validation_flag=1;
				include("./Class_Database.php");
				$db= new database();
				//$db->setup("kaushal", "kaushal", "localhost", "jobportaldb");	
				$query="Select name_user from users where email_user='$email'";
				if($res=$db->send_sql($query))
				{
					if(mysql_num_rows($res)==1)
					{
						while($row=mysql_fetch_row($res))
						{
							$username=$row[0];		// Get the username
						}
					}
					else
					{
						$validation_flag=2;		//Invalid Attempt
					}
				}
				else
				{
					$validation_flag=3;		//Invalid Attempt
				}
			}
		}
		else 
		{
			$validation_flag=4; //Please Enter Email
		}
	}
?>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Password Recovery</title>
<link rel="stylesheet" type="text/css" media="screen" href="css/maincss.css">

<script type="text/javascript">

function ValidateForm(form)
{
	for(var i = 0; i < form.elements.length; i++)
	{
		if(form.elements[i].value.length == 0)
		{
			document.getElementById("errormessage").innerHTML="<b style='color:red'>Please "+form.elements[i].placeholder+"</b>";
			form.elements[i].focus();
			return false;
		}
		else if (form.elements[i].name=="email")
		{
			var regEmail=/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
			var emailadd=form.elements[i].value;
			if(regEmail.test(emailadd)==false)
			{
				document.getElementById("errormessage").innerHTML="<b style='color:red'>Please Enter Valid Email Address</b>";
				return false;	
			}
		}
		else if (form.elements[i].name=="phone")
		{
			var regEmail=/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
			var emailadd=form.elements[i].value;
			if(regEmail.test(emailadd)==false)
			{
				document.getElementById("errormessage").innerHTML="<b style='color:red'>Please Enter Valid Phone</b>";
				return false;	
			}
		}
		else if(form.elements[i].name=="pwd")
		{
			if (form.elements[i].value!=form.elements['cnfpwd'].value)
			{
				document.getElementById("errormessage").innerHTML="<b style='color:red'>Passwords do not match</b>";
				return false;	
			}
		}
		else if(form.elements[i].name=="cnfpwd")
		{
			if (form.elements[i].value!=form.elements['pwd'].value)
			{
				document.getElementById("errormessage").innerHTML="<b style='color:red'>Passwords do not match</b>";
				return false;	
			}
		}
		
	} 
	return true;
	
}
</script>

</head>

<body>

<div id="centered"><!-- Centered-->
	<div align="right" style="color:#045; height:14px">
    <?php if (isset($_SESSION['username']) && isset($_SESSION['usertype']) && $_SESSION['usertype']=="JobSeeker")
    {
    ?>
        <a href="jsdashboard.php" style="color:#045">Welcome <b style='color:#933'><?php echo $_SESSION['username']; ?></b></a>  , 
        <a href="logout.php" style="color:#045">Logout</a>
    
    <?php	
    }
    else if(isset($_SESSION['username']) && isset($_SESSION['usertype']) && $_SESSION['usertype']=="Employer")
    {
    ?>
        <a href="empdashboard.php" style="color:#045">Welcome <b style='color:#933'><?php echo $_SESSION['username']; ?></b></a>  , 
        <a href="logout.php" style="color:#045">Logout</a>
    <?php	
    
    }else {?>
    
    <?php } ?>
    
    </div>
	<?php include("header.html"); ?>
    
	<div class="content"><!-- Content-->
  	<div style="width:100%"><!--Width-->
        	
       <!--FIRST COLUMN-->
      <div style="float:left; width:50%; background-color:#FFF;">
      <div style="padding:10px">
      
      <h2>Forgot Passowrd?</h2>
      
      <form action="checkforget.php" name="RegisterUser" method="post" onSubmit="return ValidateForm(this);" >
      <table border="0" cellpadding="5px" cellspacing="0" style="font-family:Verdana, Geneva, sans-serif; font-size:12px">
      
      <tr>
      	<td id="errormessage" colspan="2" align="left">
        <?php 
			if (isset($_GET['e']) && $_GET['e']==1)
				echo "<b style='color:red'>Please Enter Username</b>";
			else if (isset($_GET['e']) && $_GET['e']==2)
				echo "<b style='color:red'>Please Enter E-mail</b>";
			else if (isset($_GET['e']) && $_GET['e']==3)
				echo "<b style='color:red'>Invalid E-mail</b>";
			else if (isset($_GET['e']) && $_GET['e']==4)
				echo "<b style='color:red'>Invalid User</b>";
			else if (isset($_GET['e']) && ($_GET['e']==5 || $_GET['e']==6))
				echo "<b style='color:red'>Invalid Attempt. Please Try Again</b>";
				
		?>
      </td>
      </tr>
        
      <tr>
      	<td><label for="uname">Username:</label><label style="color:red; font-weight:bold">*</label></td>
        <td><input type="text" name="uname" placeholder="Enter User Name" maxlength="20" value=""/></td>
      </tr>
      
      <input type="hidden" name="forget_request" value="forget_password" />
      
      <tr>
      	<td><label for="email">E-mail:</label><label style="color:red; font-weight:bold">*</label></td>
        <td><input type="text" name="email" placeholder="Enter E-mail" maxlength="100" value=""/></td>
      </tr>
      
      <tr>
      	<td colspan="2" align="right"><input class="button" type="submit" name="submit" value="Retreive Password" style="margin-right:0px" /></td>
      </tr>
      
      </table>
      </form>
      
      <h2>Forgot Username?</h2>
      <form action="forget.php" name="RegisterUser" method="post" onSubmit="return ValidateForm(this);" >
      <table width="260" border="0" cellpadding="5px" cellspacing="0" style="font-family:Verdana, Geneva, sans-serif; font-size:12px">
      
      <tr>
      	<td id="errormessage1" colspan="2" align="left">
        <?php 
			
			if ($validation_flag==1)
				echo "<b style='color:red'>Invalid E-mail</b>";
			else if ($validation_flag==4)
				echo "<b style='color:red'>Please Enter Email</b>";
			else if ($validation_flag==2 || $validation_flag==3)
				echo "<b style='color:red'>Invalid Attempt</b>";
			
		?>
      </td>
      </tr>
      
      <tr>
      	<td width="90"><label for="email1">E-mail:</label><label style="color:red; font-weight:bold">*</label></td>
        <td width="150"><input type="text" name="email1" placeholder="Enter E-mail" maxlength="100" value=""/></td>
      </tr>
      
      <input type="hidden" name="forget_request" value="forget_username" />
      
      <tr>
      	<td colspan="2" align="right"><input class="button" type="submit" name="submit" value="Retreive Username" style="margin-right:0px" /></td>
      </tr>
      
      </table>
      </form>
      
      </div>
      </div>
      <!--FIRST COLUMN-->
      
      <div style="float:left; width:50%; background-color:#FFF;">
      <div style="padding:10px">
      	<?php
			if(isset($username))
			{
				$message = "<h2 style='color:green'>Username : $username</h2>";
				echo $message;
				/*mail($email,"Username Recovery",$message);*/
			}
		?>
      </div>
      </div>
     
            
    </div> <!--Width-->   
    </div><!-- Content-->
        
</div><!-- Centered-->





</body>
</html>