<?php ob_start(); ?>
<?php

session_start();

include("./Class_Database.php");
	$db= new database();
	//$db->setup("kaushal", "kaushal", "localhost", "jobportaldb");	
  	$query="Select * from admin where id_admin='1'";
	if($res=$db->send_sql($query))
	{
		if (mysql_num_rows($res)>0)
		{
			while ($row = mysql_fetch_array($res))
			{
				$contactus=str_replace("\n","<br/>",stripslashes($row["contactus"]));
			}
		}
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Contact Us</title>
<link rel="stylesheet" type="text/css" media="screen" href="css/maincss.css">

<script type="text/javascript">
function ShowJsLogin()
{
	document.getElementById("JS").style.color="#FFF";
	document.getElementById("EMP").style.color="#045";
	document.getElementById("L1").innerHTML="<form action='login.php' method='post' name='loginform'><label for='username'>Username:</label><input type='text' name='username' placeholder='Username' /><label for='password'>Password:</label><input type='password' name='password' placeholder='Password' /><input type='hidden' name='usertype' value='JobSeeker' /><br /><input type='submit' name='login' value='Login' /></form><form action='register.php' method='post' name='registerform' style='font-size:10px'><br /><label style='font-family:Verdana, Geneva, sans-serif'>Don't Have a JobSeeker Account?</label><input type='submit' style='border:none; background:none; cursor:pointer; padding:0; font-family:Tahoma, Geneva, sans-serif; font-size:11px; font-weight:bold' name='register' value='Register'  /><br /><br /><a href='forget.php' style='text-decoration:none; color:#000'>Forgot your Username/Passwod?</a><input type='hidden' name='usertype' value='JobSeeker' /></form>";
}

function ShowEmpLogin()
{
	
	document.getElementById("EMP").style.color="#FFF";
	document.getElementById("JS").style.color="#045";
	document.getElementById("L1").innerHTML="<form action='login.php' method='post' name='loginform'><label for='username'>Username:</label><input type='text' name='username' placeholder='Username' /><label for='password'>Password:</label><input type='password' name='password' placeholder='Password' /><input type='hidden' name='usertype' value='Employer' /><br /><input type='submit' name='login' value='Login' /></form><form action='register.php' method='post' name='registerform' style='font-size:10px'><br /><label style='font-family:Verdana, Geneva, sans-serif'>Don't Have an Employer Account?</label><input type='submit' style='border:none; background:none; cursor:pointer; padding:0; font-family:Tahoma, Geneva, sans-serif; font-size:11px; font-weight:bold' name='register' value='Register'  /><br /><br /><a href='forget.php' style='text-decoration:none; color:#000'>Forgot your Username/Passwod?</a><input type='hidden' name='usertype' value='Employer' /></form>";
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
	<div class="content"> <!-- Content-->
  	<div style="width:100%" ><!--Width-->
        	
       <!--FIRST COLUMN-->
      <div style="float:left; width:726px; height:700px; background-color:#FFF">
      <?php 
	  echo "<table width='70%' style='margin-left:30px'>";
	  echo "<br/><br/>";
	  echo "<tr>";
  	  echo "<td align='justify'>";
	  if(isset($contactus)) echo $contactus; else echo "Default Text for CONTACT US";
  	  echo "</td>";
  	  echo "</tr>";
  	  echo "</table>";
	  ?>
      </div>
      <!--FIRST COLUMN-->
      
      <!--SECOND COLUMN-->
      <div style="float:left; width:274px; height:700px; background-color:#FFF">
			
            <!--Login Header -->
            <div class="loginbox">
    			<table align="center" style="margin-top:-15px">
        		<tr>
        			<td><p id="JS" onclick="ShowJsLogin();" style="cursor:pointer; color:#FFF">Jobseeker Login</p></td>
                    <td> | </td>
            		<td><p id="EMP" onclick="ShowEmpLogin();" style="cursor:pointer; color:#045">Employer Login</p></td>
        		</tr>
        		</table>
    		</div>
            <!--Login Header -->
            
            <!--Login form -->
            <div id="L1" style="height:130px; background-color:#D3EFF1; padding:10px" align="center">
                	<form action="login.php" method="post" name="loginform"><label for="username">Username:</label><input type="text" name="username" placeholder="Username" maxlength="20" /><label for="password">Password:</label><input type="password" name="password" placeholder="Password" maxlength="8" /><input type="hidden" name="usertype" value="JobSeeker" /><br /><input type="submit" name="login" value="Login" /></form><form action="register.php" method="post" name="registerform" style="font-size:10px"><br /><label style="font-family:Verdana, Geneva, sans-serif">Don't Have a JobSeeker Account?</label><input type="submit" style="border:none; background:none; cursor:pointer; padding:0; font-family:Tahoma, Geneva, sans-serif; font-size:11px; font-weight:bold" name="register" value="Register"  /><br /><br /><a href="forget.php" style="text-decoration:none; color:#000">Forgot your Username/Passwod?</a><input type="hidden" name="usertype" value="JobSeeker" /></form>
           </div> 
            <!--Login form -->
    	
        </div>
        <!--SECOND COLUMN-->
            
    </div> <!--Width-->   
    </div><!-- Content-->
        
</div><!-- Centered-->





</body>
</html>