
<?php ob_start(); ?>
<?php

session_start();

if (!isset($_GET['s'])){
	if(isset($_SESSION['fname']) && $_SESSION['fname']!="")
		$session_fname = $_SESSION['fname'];
	if(isset($_SESSION['lname']) && $_SESSION['lname']!="")
		$session_lname = $_SESSION['lname'];
	if(isset($_SESSION['uname']) && $_SESSION['uname']!="")
		$session_uname = $_SESSION['uname'];
	if(isset($_SESSION['email']) && $_SESSION['email']!="")
		$session_email = $_SESSION['email'];
	}
?>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Registeration</title>
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
	  <?php 
	  $usertype="JobSeeker";
	  if (isset($_POST['usertype']))
	  {
		  $usertype=$_POST['usertype'];
	  }
	    
	  echo "<h1>" . $usertype . " Registration </h1>\n";
	  ?>
        <form action="saveuser.php" name="RegisterUser" method="post" onSubmit="return ValidateForm(this);" >
        	
            <table width="500px" border="0" cellpadding="5px" cellspacing="0" style="font-family:Verdana, Geneva, sans-serif; font-size:12px">
            
            <?php 
            	echo "<input type='hidden' name='usertype' value='$usertype' />\n";
            ?>
            <tr>
            	<td id="errormessage" colspan="2" align="left">
                
                <?php 
					if(isset($_GET['e']) && $_GET['e']=="1")
					{
						echo "<b style='color:red'>Please Enter First Name!</b>";	
					}
					
					else if(isset($_GET['e']) && $_GET['e']=="2")
					{
						echo "<b style='color:red'>Please Enter Last Name!</b>";	
					}
					
					else if(isset($_GET['e']) && $_GET['e']=="3")
					{
						echo "<b style='color:red'>Please Enter Username!</b>";	
					}
					
					else if(isset($_GET['e']) && $_GET['e']=="4")
					{
						echo "<b style='color:red'>Please Enter Email!</b>";	
					}
					
					else if(isset($_GET['e']) && $_GET['e']=="5")
					{
						echo "<b style='color:red'>Please Enter Password!</b>";	
					}
					
					else if(isset($_GET['e']) && $_GET['e']=="6")
					{
						echo "<b style='color:red'>Please Enter Confirm Password!</b>";	
					}
					
					else if(isset($_GET['e']) && $_GET['e']=="7")
					{
						echo "<b style='color:red'>Please Enter Security Question!</b>";	
					}
					
					else if(isset($_GET['e']) && $_GET['e']=="8")
					{
						echo "<b style='color:red'>Please Enter Security Answer!</b>";	
					}
										
					else if(isset($_GET['e']) && $_GET['e']=="9")
					{
						echo "<b style='color:red'>Email Address is Already present!</b>";	
					}
					else if(isset($_GET['e']) && $_GET['e']=="10")
					{
						echo "<b style='color:red'>Username is Already present!</b>";	
					}
					else if(isset($_GET['e']) && $_GET['e']=="11")
					{
						echo "<b style='color:red'>Passwords do not match!</b>";	
					}
					
				?>
				
                </td>
            </tr>            
            
            <tr>
            	<td><label for="fname" >First Name:</label><label style="color:red; font-weight:bold">*</label></td>
            	<td><input type="text" name="fname" placeholder="Enter First Name" maxlength="20" value="<?php if(isset($session_fname) && $session_fname!="")echo $session_fname;?>" /></td>
            </tr>
            
            <tr>
            	<td><label for="lname">Last Name:</label><label style="color:red; font-weight:bold">*</label></td>
            	<td><input type="text" name="lname" placeholder="Enter Last Name" maxlength="20" value="<?php if(isset($session_lname) && $session_lname!="")echo $session_lname;?>" /></td>
            </tr>
            
            
            <tr>
            	<td><label for="email">E-mail:</label><label style="color:red; font-weight:bold">*</label></td>
                <td><input type="text" name="email" placeholder="Enter E-mail" maxlength="50" value="<?php if(isset($session_email) && $session_email!="")echo $session_email;?>"/></td>
            </tr>
            
            
            <tr>
            	<td><label for="uname">Username:</label><label style="color:red; font-weight:bold">*</label></td>
                <td><input type="text" name="uname" placeholder="Enter User Name" maxlength="20" value="<?php if(isset($session_uname) && $session_uname!="")echo $session_uname;?>"/></td>
            </tr>
            
            <tr>
            	<td><label for="pwd">Password:</label><label style="color:red; font-weight:bold">*</label></td>
                <td><input type="password" name="pwd" placeholder="Enter Password" maxlength="8" /></td>
            </tr>
            
            <tr>
            	<td><label for="cnfpwd">Confirm Password:</label><label style="color:red; font-weight:bold">*</label></td>
                <td><input type="password" name="cnfpwd" placeholder="Confirm Password" maxlength="8" /></td>
            </tr>
            
            <tr>
            	<td><label for="question">Security Question:</label><label style="color:red; font-weight:bold">*</label></td>
                <td><input type="text" name="question" placeholder="Enter Security Question" maxlength="100" size="50" /></td>
            </tr>
            
            <tr>
            	<td><label for="answer">Security Answer:</label><label style="color:red; font-weight:bold">*</label></td>
                <td><input type="text" name="answer" placeholder="Enter Security Answer" maxlength="100" size="50" /></td>
            </tr>
            
            <tr>	
            	<td colspan="2" align="right"><input type="submit" name="register" value="Register" /></td>
            </tr>
            </table>
  		</form>
        </div>
      </div>
      <!--FIRST COLUMN-->
      
      <!--SECOND COLUMN-->
      <div style="float:left; width:50%; background-color:#FFF">
      <div style="padding:10px">
	  <?php	
        if (isset($_GET['s']) && $_GET['s']!="")
		{
			echo "<h2 align='center' style='color:green'>You Have Successfully registered !</h2>
			<h2 align='center'>Please <a href='index.php'>Login Here</a></h2>";	
		}
      ?>                 	
      </div>
      </div>
        <!--SECOND COLUMN-->
            
    </div> <!--Width-->   
    </div><!-- Content-->
        
</div><!-- Centered-->





</body>
</html>