<?php ob_start(); ?>
<?php

session_start();

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Admin Page</title>
<link rel="stylesheet" type="text/css" media="screen" href="css/maincss.css">

<script type="text/javascript">
function ShowadminLogin()
{
	document.getElementById("admin").style.color="#045";
	document.getElementById("L1").innerHTML="<form action='login.php' method='post' name='loginform'><label for='username'>Username:</label><input type='text' name='username' placeholder='Username' /><label for='password'>Password:</label><input type='password' name='password' placeholder='Password' /><input type='hidden' name='usertype' value='admin' /><br /></form>";
}
</script>

</head>

<body>

<div id="centered"><!-- Centered-->
    <div align="right" style="color:#045; height:14px">
    <?php if (isset($_SESSION['username']) && isset($_SESSION['usertype']) && $_SESSION['usertype']=="admin")
    {
    ?>
        <a href="admindashboard.php" style="color:#045">Welcome <b style='color:#933'><?php echo $_SESSION['username']; ?></b></a>  , 
        <a href="logout.php" style="color:#045">Logout</a>
     
    <?php	
    
    }?>
    
  
    
    </div>
	
    <?php include("header.html"); ?>
	<div class="content"> <!-- Content-->
  	<div style="width:100%" ><!--Width-->
        	
       <!--FIRST COLUMN-->
      <div style="float:left; width:726px; height:700px; background-color:#FFF"></div>
      <!--FIRST COLUMN-->
      
      <!--SECOND COLUMN-->
      <div style="float:left; width:274px; height:700px; background-color:#FFF">
			
            <!--Login Header -->
            <div class="loginbox">
    			<table align="center" style="margin-top:-15px">
        		<tr>
        			<td><p id="admin" onclick="ShowadminLogin();" style="cursor:pointer; color:#045">Administrator Login</p></td>
            		
        		</tr>
        		</table>
    		</div>
            <!--Login Header -->
            
            <!--Login form -->
            <div id="L1" style="height:130px; background-color:#D3EFF1; padding:10px" align="center">
                	<form action="login.php" method="post" name="loginform"><label for="username">Username:</label><input type="text" name="username" placeholder="Username" maxlength="20" /><label for="password">Password:</label><input type="password" name="password" placeholder="Password" maxlength="8" /><input type="hidden" name="usertype" value="admin" /><br /><input type="submit" name="login" value="Login" /></form>
           </div> 
            <!--Login form -->
    	
        </div>
        <!--SECOND COLUMN-->
            
    </div> <!--Width-->   
    </div><!-- Content-->
        
</div><!-- Centered-->





</body>
</html>