<?php ob_start(); ?>
<?php

session_start();

if(isset($_GET['auth']) && $_GET['auth']!="")
	{
		$authentication_key=addslashes(strip_tags($_GET['auth']));
	}
	else
	{
		header("Location:index.php");
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
      
      <h2>Reset Passowrd?</h2>
      
      <form action="updateuserinfo.php" name="RegisterUser" method="post" onSubmit="return ValidateForm(this);" >
      <table border="0" cellpadding="5px" cellspacing="0" style="font-family:Verdana, Geneva, sans-serif; font-size:12px">
      
      <tr>
      	<td id="errormessage" colspan="2" align="left">
        <?php 
			if (isset($_GET['e']) && $_GET['e']==1)
				echo "<b style='color:red'>Please Enter Username</b>";
			else if (isset($_GET['e']) && $_GET['e']==2)
				echo "<b style='color:red'>Please Enter E-mail</b>";
			else if (isset($_GET['e']) && $_GET['e']==3)
				echo "<b style='color:red'>Please Enter New Password</b>";
			else if (isset($_GET['e']) && $_GET['e']==4)
				echo "<b style='color:red'>Please Enter Confirm Password</b>";
			else if (isset($_GET['e']) && $_GET['e']==5)
				echo "<b style='color:red'>Passwords do not match</b>";
			else if (isset($_GET['e']) && $_GET['e']==6)
				echo "<b style='color:red'>Password Reset Failed. Please Try Again!</b>";
			else if (isset($_GET['e']) && $_GET['e']==5)
				echo "<b style='color:red'>Invalid Attempt!</b>";
					
		?>
      </td>
      </tr>
        
      <tr>
      	<td><label for="uname">Username:</label><label style="color:red; font-weight:bold">*</label></td>
        <td><input type="text" name="uname" placeholder="Enter User Name" maxlength="20" value=""/></td>
      </tr>
      
      <input type="hidden" name="key" value="<?php if(isset($authentication_key)) echo $authentication_key; ?>" />
      
      <tr>
      	<td><label for="email">E-mail:</label><label style="color:red; font-weight:bold">*</label></td>
        <td><input type="text" name="email" placeholder="Enter E-mail" maxlength="20" value=""/></td>
      </tr>
      
      <tr>
      	<td><label for="pwd">New Password:</label><label style="color:red; font-weight:bold">*</label></td>
        <td><input type="password" name="pwd" placeholder="Enter New Password" maxlength="8" value=""/></td>
      </tr>
      
      <tr>
      	<td><label for="cnfpwd">Confirm Password:</label><label style="color:red; font-weight:bold">*</label></td>
        <td><input type="password" name="cnfpwd" placeholder="Enter New Password" maxlength="8" value=""/></td>
      </tr>
      
      <tr>
      	<td colspan="2" align="right"><input class="button" type="submit" name="submit" value="Reset Password" style="margin-right:0px" /></td>
      </tr>
      
      </table>
      </form>
          
      </div>
      </div>
     <!--FIRST COLUMN-->
     
     <!--SECOND COLUMN -->
     <div style="float:left; width:50%; background-color:#FFF;">
      <div style="padding:10px">
      	<?php
		if (isset($_GET['s']) && $_GET['s']!="")
		{
			echo "<h2 align='center' style='color:green'>Password has been successfully reset!</h2>
			<h2 align='center'>Please <a href='index.php'>Login Here</a></h2>";	
		}
		?>	
      </div>
     </div>
      
     
            
    </div> <!--Width-->   
    </div><!-- Content-->
        
</div><!-- Centered-->





</body>
</html>