<?php ob_start(); ?>
<?php

session_start();

if (!isset($_SESSION['username'])) 
	{
		header('Location:index.php');
	}
include("./Class_Database.php");
$db= new database();
//$db->setup("kaushal", "kaushal", "localhost", "jobportaldb");	
$userid=$_GET['id'];
$query="Select * from users where id_user=$userid";
$res=$db->send_sql($query);	
if (mysql_num_rows($res)>0)
		{
				while ($row = mysql_fetch_array($res))
				{
				$to=stripslashes($row["email_user"]);
				}
		}
			
		if(isset($res))
					unset($res);
		
			$username = $_SESSION['username'];
			$query1="Select * from admin where username='$username' and usertype='admin'";
			$res1=$db->send_sql($query1);	
			if (mysql_num_rows($res1)>0)
			{
				while ($row = mysql_fetch_array($res1))
				{
				$from=stripslashes($row["email"]);
				}
			}
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Send Message</title>
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
		if(form.elements[i].value.length > 500)
		{
			document.getElementById("errormessage").innerHTML="<b style='color:red'>Message limit is 500 character.</b>";
			form.elements[i].focus();
			return false;
		}
		
	} 
	return true;
	
}
</script>
</head>

<body>
<div id="centered"><!-- Centered-->
<div align="right" style="color:#045"><a href="admindashboard.php" style="color:#045">Welcome <b style='color:#933'><?php  if (isset($_SESSION['username'])) echo $_SESSION['username']; ?></b></a>  , <a href="logout.php" style="color:#045">Logout</a></div>
	
	<?php include("header.html"); ?>
    
	<div class="content"><!-- Content-->
  	<div style="width:100%"><!--Width-->
        	
      <!--FIRST COLUMN-->
      <div style="float:left; width:30%; background-color:#FFF;">
      	<div style="padding:10px; min-height:680px; background-color:#CCC">
        	<table border="0" cellpadding="0" cellspacing="0">
				<tr>
            	<td><label style="font-size:14px; font-weight:bold; cursor:pointer" onClick="">Users Detail</label></td>
            </tr>
            <tr>
               	<td>
                <ul>
                    <li><a href="adminuserdetail.php" style="font-size:12px; font-weight:bold; cursor:pointer">Job Seeker Detail</a></li>
                    <li><a href="adminemployerdetail.php" style="font-size:12px; font-weight:bold; cursor:pointer" onClick="">Employer Detail</a></li>
		     		<li><a href="admincountuser.php" style="font-size:12px; font-weight:bold; cursor:pointer; color:#000;">Web Visitor Counter</a></li>
                </ul>
               </td>
            </tr>
            </tr>
                  <tr>
            	<td><label style="font-size:14px; font-weight:bold; cursor:pointer" onClick=""><br/>Page Content Change</label></td>
            </tr>
            <tr>
                <td>
					<ul>
						<li><a href="adminhomeedit.php" style="font-size:12px; font-weight:bold; cursor:pointer;">Home Page</a></li>
						<li><a href="admincontactusedit.php" style="font-size:12px; font-weight:bold; cursor:pointer" onClick="">Contact Us</a></li>
						<li><a href="adminaboutusedit.php" style="font-size:12px; font-weight:bold; cursor:pointer" onClick="">About Us</a></li>
					</ul>
                </td>
            </tr> 
             <tr>
              <td>
            	 <li><a href="adminsentmessage.php" style="font-size:12px; font-weight:bold; cursor:pointer">Sent Message</a></li>
                 </td>
            </tr>
            <tr>
             <td>
            	 <li><a href="admintrash.php" style="font-size:12px; font-weight:bold; cursor:pointer">Trash</a></li>
                 </td>
            </tr>
            <tr>
             <td>
            	 <li><a href="admininbox.php" style="font-size:12px; font-weight:bold; cursor:pointer">Inbox</a></li>
                 </td>
            </tr>
            </table>
      	</div>
      </div>
      <!--FIRST COLUMN-->
      
      <!--SECOND COLUMN-->
      <div style="float:left; width:70%; background-color:#FFF">
      	<div style="padding:10px">
	         <h2>Send Message</h2>
          
          <?php   
				$query2="Select * from admin_message where to_user='$to' and from_user='$from'and blockmessage= 1";
				//echo $query2;
					$res2=$db->send_sql($query2);	
				if (mysql_num_rows($res2)>0)
				{
						 echo "You are blocked by $to";
				}
				else
				{	
			?>
             <form action="adminsavesendmessage.php" name="frmmessage" method="post"  onSubmit="return ValidateForm(this)">
           	 <table border="0" cellpadding="2" cellspacing="0" style="font-family:Verdana, Geneva, sans-serif; font-size:12px">
				 <tr>
					<td id="errormessage" colspan="2" align="left">
					<?php
						if(isset($_GET['e']) && $_GET['e']==1)
							echo "<b style='color:red'>Please Enter Subject Name!</b>";	
						else if(isset($_GET['e']) && $_GET['e']=="2")
					{
						echo "<b style='color:red'>Please Enter Message Body!</b>";	
					}
					else if(isset($_GET['e']) && $_GET['e']=="3")
					{
						echo "<b style='color:red'>Message limit is 500 character!</b>";	
					}
					?>
					</td>
				 </tr>
             	<tr>
					<td align="right"><label style="font-weight:bold"> <strong>From</strong>:</label><label style="color:red; font-weight:bold"></label></td>
					<td><input type="text" name="from" size="40" value="<?php if(isset($from)&& $from!="")echo $from; ?>"  readonly="readonly"  placeholder="" />
					</td>
				 </tr>
					
				 <tr>
					<td align="right"><label style="font-weight:bold" > <strong>To</strong>:</label><label style="color:red; font-weight:bold"></label></td>
					<td><input type="text" name="to"   readonly="readonly" size="40"  value="<?php if(isset($to)&& $to!="")echo $to; ?>" placeholder="" />
					</td>
				 </tr>
              	                   
                 <tr>
					<td align="right"><label style="color:red; font-weight:bold">*</label><label style="font-weight:bold"> <strong>Subject</strong>:</label><label style="color:red; font-weight:bold"></label></td>
					<td><input type="text" name="subject" size="40"value="<?php if(isset($subject)&& $subject!="")echo $subject; ?>" placeholder="Enter Subject Name"/>
					</td>
				 </tr>
              	 <tr>
              	 <tr>
                	<td align="right"><label style="color:red; font-weight:bold">*</label><label style="font-weight:bold"> <strong>Body</strong>:</label><label style="color:red; font-weight:bold"></label></td>
                    <td> <textarea name="body" id="body" rows="6" cols="50" placeholder="Enter Message Body"><?php if(isset($body)&& $body!="")echo $body; ?></textarea></td>	
                 </tr>
				</table>
            	 <div align="right"><input class="button" type="submit" name="send" id="send" value="Send"/> 
		 <?php
            }
            ?>	
                <a class="button" name="cancel" value="Cancel" href="adminuserdetail.php" />Cancel</a>
             </div>
            </form>
      	</div>
    </div>
        <!--SECOND COLUMN-->
        
    </div> <!--Width-->   
    </div><!-- Content-->
        
</div><!-- Centered-->
</body>
</html>