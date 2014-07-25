
<?php
$q = intval($_GET['q']);

$con = mysqli_connect(':/cloudsql/familylife-dash:webapp-back','root','','familylife2');
if (!$con)
  {
  die('Could not connect: ' . mysqli_error($con));
  }

mysqli_select_db($con,"familylife2");
$sql="Select Distinct Name from Event Where R_Id = (Select P_Id from Permission where U_Id = sha1( '".$q."' ) and P_Type = 1) OR E_Id = (Select P_Id from Permission where U_id =  sha1( '".$q."') And P_Type = 0);";

$result = mysqli_query($con,$sql);

echo "
  		<select name='res' class='form-control'>"
;


while($row = mysqli_fetch_array($result))
  {

  echo "
  
		<option value='1'>". $row['Name'] . "</option>";
		   }
echo "</select>";

mysqli_close($con);
?>