<?php
$string = strval($_GET['r']);

$dhost=":/cloudsql/familylife-dash:webapp-back";
				$duser="root";
				$dpassword="";
				$database="familylife2";
				$con=mysql_connect($dhost, $duser, $dpassword) or die("Could not Connect to SQL Server");
if (!$con)
  {
  die('Could not connect: ' . mysql_error($con));
  }
mysql_select_db($database);

$pieces= explode('~',$string);
$CS_ID = $pieces[0];
$RAT1 = $pieces[1];
$RAT2 = $pieces[2];
$RAT3 = $pieces[3];
$RAT4 = $pieces[4];
$RAT5 = $pieces[5];

$sql="UPDATE CS SET Rating1_info = '".$RAT1."', Rating2_info = '".$RAT2."', Rating3_info = '".$RAT3."',
		Rating4_info = '".$RAT4."', Rating5_info = '".$RAT5."' WHERE Cs_Id = '".$CS_ID."'";

if (!mysql_query($sql))
{
	die('Could not connect: ' . mysql_error($con));
}

echo $sql;

mysql_close($con);
?>