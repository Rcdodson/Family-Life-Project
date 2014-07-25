<?php
$content = strval($_GET['c']);

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

$pieces= explode('~',$content);
$CS_ID = $pieces[0];
$count = count($pieces);
$CONT = "";
for ($i = 1; $i <= $count; $i++){
	$CONT .= $pieces[$i];
}

$sql="UPDATE CS SET Content = '".$CONT."' WHERE Cs_Id = '".$CS_ID."'";

if (!mysql_query($sql))
{
	die('Could not connect: ' . mysql_error($con));
}

echo $sql;

mysql_close($con);
?>