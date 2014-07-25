
<?php
	
$warn = strval($_GET['q']);

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
//database connection done
date_default_timezone_set(date_default_timezone_get());
				
//time set done

$sql = "Select * from (Select Cs_Id, Yellow, Red, Notes, Complete, Rating,  More_info, DueDate, Name, R_Id, P_date, C_Date, A_Date, Event.E_Id 
from (Select CS_Specs.E_Id, Cs_Id, Yellow, Red, Notes, Complete, Rating, More_info, DueDate 
from (Select E_Id from Event Where R_Id = (Select P_Id  from Permission where U_Id = '".$warn."' and  P_Type = 1) 
OR E_Id = (Select P_Id from Permission where U_id = '".$warn."' And P_Type = 0)) a  
Left Join CS_Specs ON a.E_Id = CS_Specs.E_Id) a Left Join Event ON a.E_Id = Event.E_Id) b 
Left Join CS ON b.CS_Id = CS.CS_Id ORDER BY DueDate asc";

$result = mysql_query($sql);


while ($row = mysql_fetch_assoc($result)) {
				
				$Today = date('Y-m-d');
				$Event_Date = $row['C_Date'];
				$sub = $row['DueDate'];
				$Cs_Date = strtotime($sub. 'week', strtotime($Event_Date));
				$Cs_Date = date('m/d/y',$Cs_Date);
			
			
									
				$ts1 = strtotime($Today);
				$ts2 = strtotime($Event_Date);
				
				$seconds_diff = $ts2 - $ts1;

				$ts4 = strtotime($Today);
				$ts5 = strtotime($Cs_Date);
										
				$seconds_diff2 = $ts5 - $ts4;
				
				//$Week_till_event = ($seconds_diff2/3600/24/7);
				$wktil = floor ($seconds_diff2/3600/24/7);
				
				//warning code
				$subY = $row['Yellow'];
				$subR = $row['Red'];
				$YellowDate = strtotime($subY. 'week', strtotime($Cs_Date));
				$YellowDate = date('m/d/y',$YellowDate);
				
				$RedDate = strtotime($subR. 'week', strtotime($Cs_Date));
				$RedDate = date('m/d/y',$RedDate);
				
				
				$tsR = strtotime($YellowDate);
				$tsY = strtotime($RedDate);
								
				//end warning code
				

if ($ts4 >= $tsR)
				  {
echo '<div class="alert alert-danger alert-dismissable">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<strong>Warning!</strong> Step: ' . $row['Content']. '  in  <strong>' . $row['Name']. '</strong> is Overdue! '. $Cs_Date.'
				</div>';
				  } 
if (($ts4 >= $tsY) && ($ts4 < $tsR))
{
echo '				<div class="alert alert-warning alert-dismissable">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<strong>Caution Step: </strong> ' . $row['Content']. '  in  <strong>' . $row['Name']. '</strong> is Due Soon!'. $Cs_Date .'
				</div>';
}

}
mysql_close($con);
?>