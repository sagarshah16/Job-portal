<?php
global $_SERVER;
$ipaddress=$_SERVER['REMOTE_ADDR'];
date_default_timezone_set('America/New_York');
$date=date("jnY");
$message="$ipaddress.$date\r\n ";


$open=fopen("./admin/admincountuserinfo.txt","a+");
if($open)
{
	fwrite($open,"$message");
	fclose($open);
	
}











?>