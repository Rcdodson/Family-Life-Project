
<?php
	

$info = strval($_GET['e']);

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

$piece= explode(',',$info);
$CSID= $piece[0];
$EID= $piece[1];


$sql="UPDATE CS_Specs SET Complete = NULL ,Rating = NULL , Notes = NULL WHERE Cs_Id = '".$CSID."' AND E_Id = '".$EID."' ";

if (!mysql_query($sql))
  {
  die('Could not connect: ' . mysql_error($con));
  }


echo $sql;




mysql_close($con);
?>