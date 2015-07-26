<?php ob_start(); ?>
<?php

session_start();

$uname="";
$email="";
$s_question="";

if(isset($_POST['submit']) && isset($_POST['forget_request']) && $_POST['forget_request']=="forget_password")
{
	
	//$s_answer="";
	if(isset($_POST['uname']) && $_POST['uname']!="")
	{
		$uname=addslashes(strip_tags($_POST['uname']));
	}
	else
	{
		header("location:forget.php?e=1");	
	}
	if(isset($_POST['email']) && $_POST['email']!="")
	{
		$email=addslashes(strip_tags($_POST['email']));
	}
	else
	{
		header("location:forget.php?e=2");	
	}
	
	include("./Class_Database.php");
	$db= new database();
	//$db->setup("kaushal", "kaushal", "localhost", "jobportaldb");	
	$query="Select * from users where name_user='$uname'";
	$res=$db->send_sql($query);
	if (isset($res) && mysql_num_rows($res)>0)
	{
		while($row=mysql_fetch_array($res))
		{
			if (stripslashes($row['email_user'])!=$email)
			{
				header("location:forget.php?e=3");	//Invalid Email
			}
			$s_question=stripslashes($row["securityquestion_user"]);
		}
	}
	else
	{
		header("Location:forget.php?e=4");	 // Invalid Username
	}
}
else
{
	header("Location:forget.php");	
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
      <div style="float:left; width:100%; background-color:#FFF;">
      <div style="padding:10px">
      
      <h2>Please Answer the following Question!</h2>
      
      <form action="retrieve.php" name="RegisterUser" method="post" onSubmit="return ValidateForm(this);" >
      <table border="0" cellpadding="5px" cellspacing="0" style="font-family:Verdana, Geneva, sans-serif; font-size:12px">
      
      <tr>
      	<td id="errormessage" colspan="2" align="left">
      </td>
        
      <tr>
      	<td><label for="question" style="font-weight:bold">Security Question:</label></td>
        <td><?php echo $s_question; ?></td>
      </tr>
      
      <tr>
      	<td><label for="answer" style="font-weight:bold">Answer:</label><label style="color:red; font-weight:bold">*</label></td>
        <td><input type="text" name="answer" placeholder="Enter Answer" maxlength="20" value=""/></td>
      </tr>
      <input type="hidden" name="question" value="<?php echo $s_question; ?>" >
      <input type="hidden" name="username" value="<?php echo $uname; ?>" >
      <input type="hidden" name="email" value="<?php echo $email; ?>" >
      <tr>
      	<td colspan="2" align="right"><input class="button" type="submit" name="retrieve" value="Retreive Password" style="margin-right:0px" /></td>
      </tr>
      
      </table>
      </form>
      
      </div>
      </div>
      
      
      <!--FIRST COLUMN-->
      
     
            
    </div> <!--Width-->   
    </div><!-- Content-->
        
</div><!-- Centered-->





</body>
</html>