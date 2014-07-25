<?php
$string = strval($_GET['e']);

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
$EID = $pieces[0];
$TWEEK = $pieces[1];
$YLLW = $pieces[2];
$RD = $pieces[3];
$NTS = $pieces[4];
$CSID = $pieces[5];

$sql="UPDATE CS_Specs SET Notes = '".$NTS."', DueDate = '".$TWEEK."', Yellow = '".$YLLW."', Red = '".$RD."' WHERE E_Id = '".$EID."' AND Cs_Id = '".$CSID."';";

if (!mysql_query($sql))
{
	die('Could not connect: ' . mysql_error($con));
}

//echo $sql;

mysql_close($con);
?>