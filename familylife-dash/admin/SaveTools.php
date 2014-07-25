<?php
$tools = strval($_GET['t']);

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

$pieces= explode('~',$tools);
$CS_ID = $pieces[0];
$count = count($pieces);
$TLS = "";
for ($i = 1; $i <= $count; $i++){
	$TLS .= $pieces[$i];
}

$sql="UPDATE CS SET Tools = '".$TLS."' WHERE Cs_Id = '".$CS_ID."'";

if (!mysql_query($sql))
{
	die('Could not connect: ' . mysql_error($con));
}

echo $sql;

mysql_close($con);
?>