
<?php
	
$email = strval($_GET['q']);




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


	
	
	$U_id_query = sprintf("SELECT U_Id FROM Users WHERE Email = '%s'", mysql_real_escape_string($email));
								
	$U_id_result = mysql_query($U_id_query);
	$U_id = mysql_result($U_id_result, 0);
  

$sql="Select Distinct Name from Event Where R_Id = (Select P_Id from Permission where U_Id = '".$U_id."' and  P_Type = 1) OR E_Id = (Select P_Id from Permission where U_id = '".$U_id."' And P_Type = 0)";

$result = mysql_query($sql);

//echo "<select name='res' class='form-control' id='Event_Control' onmouseover='Warnings('".$U_id."')' onchange='Steps(this.value)'>";
echo "<select name='res' class='form-control' id='Event_Control'  onchange='Steps(this.value)' >";

echo '<option value="1">Select Region</option>';

 $i=2;
while($row = mysql_fetch_array($result))
  {
 echo "<option value='". $row['Name']."'>". $row['Name'] . "</option>";

  }
echo "</select>";

echo "<button onmouseover=Warnings('".$U_id."') >View Warnings</button>";

mysql_close($con);
?>