<?php ob_start(); ?>
<?php

session_start();

if (!isset($_SESSION['username'])) 
{
	header('Location:index.php');
}

if(isset($_POST['searchname']) && $_POST['searchname']!="")
{
	include ("./Class_Database.php");
	$db= new database();
	//$db->setup("root", "", "localhost", "jobportaldb");
	$id_user=$_SESSION['userid'];
	if(isset($_POST['keyword']))
		$keyword=$_POST['keyword'];
	if(isset($_POST['positiontype']))
		$positiontype=$_POST['positiontype'];
	if(isset($_POST['employer']))
		$employer=$_POST['employer'];
	if(isset($_POST['experience']))
		$experience=$_POST['experience'];
	if(isset($_POST['salary']))
		$salary=$_POST['salary'];
	if(isset($_POST['locationcity']))
		$locationcity=$_POST['locationcity'];
	if(isset($_POST['locationstate']))
		$locationstate=$_POST['locationstate'];
	if(isset($_POST['locationcountry']))
		$locationcountry=$_POST['locationcountry'];
	if(isset($_POST['workauthorization']))
		$workauthorization=$_POST['workauthorization'];
	if(isset($_POST['functionalarea']))
		$functionalarea=$_POST['functionalarea'];
	if(isset($_POST['industry']))
		$industry=$_POST['industry'];
	if(isset($_POST['searchquery']))
		$searchquery=$_POST['searchquery'];
		
	$id_js=GetJobSeekerID($id_user,$db);
	$name_search=$_POST['searchname'];
	$query="INSERT INTO js_savesearchdetails(id_js, id_user, name_search, keywords, employer, positiontype, experience, salary, locationcity,
	locationstate, locationcountry, workauthorization, functionalarea, industry, searchquery, createdon, updatedon) values($id_js,$id_user,'" .  addslashes(strip_tags($name_search )) . "','" .  addslashes(strip_tags($keyword )) . "','" .  addslashes(strip_tags($employer )) . "','" .  addslashes(strip_tags($positiontype )) . "', '" .  addslashes(strip_tags($experience )) . "', '" .  addslashes(strip_tags($salary )) . "','" .  addslashes(strip_tags($locationcity )) . "','" .  addslashes(strip_tags($locationstate )) . "','" .  addslashes(strip_tags($locationcountry )) . "','" .  addslashes(strip_tags($workauthorization )) . "','" .  addslashes(strip_tags($functionalarea )) . "','" .  addslashes(strip_tags($industry )) . "','" .  addslashes(strip_tags($searchquery )) . "',now(),now())";
	
	if ($res=$db->send_sql($query))
	{
		header("location:jsadvancedsearch.php?s=1");	
	}
		
}
else
{
	header("location:jsadvancedsearchresults.php?e=1");	
}

function GetJobSeekerID($id_user,$db)
{
	$query="Select id_js from js_personalinfo where id_user=$id_user";
	$id_js=0;
		if ($res=$db->send_sql($query))
		{
			while ($row = mysql_fetch_row($res))
			{
				$id_js=$row[0];	
			}				
		}	
	return $id_js;
}

?>