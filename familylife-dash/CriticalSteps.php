
<?php
	
$name = strval($_GET['q']);

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


date_default_timezone_set(date_default_timezone_get());
				$result=mysql_query("SELECT C_Date FROM Event");
				$values = mysql_fetch_array($result);
				
				$Event_Date = $values['C_Date'];
				$Today = date('Y-m-d');
									
				$ts1 = strtotime($Today);
				$ts2 = strtotime($Event_Date);
				
				$seconds_diff = $ts2 - $ts1;
				


				

$event = mysql_fetch_assoc(mysql_query("SELECT E_Id from Event where Name='".$name."'"));

//change sql call to add join
					$result = mysql_query("SELECT * FROM CS INNER JOIN CS_Specs ON CS.CS_Id = CS_Specs.CS_Id
                                WHERE E_Id = '". $event['E_Id'] ."' ORDER BY DueDate asc");
					if (!$result) {
						echo 'Could not run query: ' . mysql_error();
						exit;
					}
					
					//$row = mysql_fetch_row($result);
	
				
				//change again
				$sql = "SELECT * FROM CS INNER JOIN CS_Specs ON CS.CS_Id = CS_Specs.CS_Id
                                WHERE E_Id = '". $event['E_Id'] ."'  ORDER BY DueDate asc";

				$result = mysql_query($sql);

				if (!$result) {
					echo "Could not successfully run query ($sql) from DB: " . mysql_error();
					exit;
				}

				if (mysql_num_rows($result) == 0) {
					echo "Select Region";
					exit;
				}
  echo '	<div class="bodycontainer scrollable"> 	<div class="panel-group" id="accordion">	';
  
  // While a row of data exists, put that row in $row as an associative array
				// Note: If you're expecting just one row, no need to use a loop
				// Note: If you put extract($row); inside the following loop, you'll
				//       then create $userid, $fullname, and $userstatus
				$x=1;
				while ($row = mysql_fetch_assoc($result)) {
					//echo $row["CSNum"];
					//echo $row["SequenceNum"];
					echo	' <div class="container-fluid">';
					echo	'  <div class="row">';	
					echo    '  <div class="col-md-1">';
					// added code for date
					$sub = $row['DueDate'];
					$Cs_Date = strtotime($sub. 'week', strtotime($Event_Date));
					$Cs_Date = date('m/d/y',$Cs_Date);
					echo $Cs_Date. ' ';
					//end addition
					echo	'	</div>';
					echo	'	<div class="col-md-offset-1">';
					echo	'	  <div class="panel panel-info">	';
					echo	'	    <div class="panel-heading">	';
					echo	'	      <h4 class="panel-title">	';
					echo	'	        <a data-toggle="collapse" data-parent="#accordion" href="#'. $x .'">'. $row['Content'] . '</a>';
					echo	'	      </h4>	';
					echo	'	    </div>	';
					echo	'	    <div id="'. $x .'" class="panel-collapse collapse ">	';
					echo	'	      <div class="panel-body">	';
					echo	'			  <div class="row">';	//into row	
												//start first panel
					echo	'				 	<div class="col-md-4"><div class="panel panel-primary"> <div class="panel-heading">Info</div>';
					echo 	'  					<div class="panel-body">';
					
					
						$ts4 = strtotime($Today);
						$ts5 = strtotime($Cs_Date);
											
						$seconds_diff2 = $ts5 - $ts4;
											
						$wktil = floor ($seconds_diff2/3600/24/7);

					echo	'					<form class="form-horizontal" role="form">
												  <div class="form-group">
													<label class="col-sm-4 control-label"><left>Due in:</left></label>
													<div class="col-sm-8">
													  <p class="form-control-static">'. $wktil .' Weeks</p>
													</div>
												  </div>
												  <div class="form-group">
													<label for="datecompleted" class="col-sm-4 control-label" >Date:</label>
													<div class="col-sm-8">
													    <input type="date" class="form-control input-sm" id="date_'. $x .'" value= "'. $row['Complete'] . '">
													</div>
												  </div>
												</form> 
							';
							echo '
							<div>
								<div><p>Rate this Step:</p></div>
								<a href="#" data-toggle="tooltip" title="' . $row['Rating1_info'] . '"><label class="radio-inline"><input type="radio"  name="rating'. $x .'" id="one_'. $x .'" value=1> 1</label></a>
								<a href="#" data-toggle="tooltip" title="' . $row['Rating2_info'] . '" ><label class="radio-inline"><input type="radio" name="rating'. $x .'" id="two_'. $x .'" value=2> 2 </label> </a>
								<a href="#" data-toggle="tooltip" title="' . $row['Rating3_info'] . '" ><label class="radio-inline"><input type="radio" name="rating'. $x .'" id="three_'. $x .'" value=3> 3 </label> </a>
								<a href="#" data-toggle="tooltip" title="' . $row['Rating4_info'] . '"><label class="radio-inline"><input type="radio"  name="rating'. $x .'" id="four_'. $x .'" value=4> 4 </label> </a>
								<a href="#" data-toggle="tooltip" title="' . $row['Rating5_info'] . '" ><label class="radio-inline"><input type="radio" name="rating'. $x .'" id="five_'. $x .'" value=5> 5 </label> </a>
								<div><p>Current Rating:' . $row['Rating'] . '</p></div>
							</div>
							<br>
							';
							
							
												//ToolTip
					echo	'						<a href="#" data-toggle="tooltip" title="' . $row['Tools'] . ' ">Hover for  More Information</a>';
												//Tooltip end
					
					
					
					
					echo	'					</div></div></div>';
												// start second panel
					echo	'				 	<div class="col-md-4"><div class="panel panel-primary">  <div class="panel-heading">Representative Notes</div>';
					echo 	'  					<div class="panel-body">';
					
					echo 	'					<textarea class="form-control" rows="5" id="notes_'. $x .'">'. $row['Notes'] .'</textarea>';
					echo	'					</div></div></div>';
												//start third panel
					echo	'				 	<div class="col-md-4">';
					echo	'						<div class="panel panel-primary">';
					echo 	'  							<div class="panel-body">';
					
					echo	'								<input type="hidden" id="evid_'. $x .'" value="'. $row['E_Id'] .'">			';
					echo	'								<input type="hidden" id="CSID_'. $x .'" value="'. $row['Cs_Id'] .'">			';
					echo	'								<input type="hidden" id="dte_'. $x .'" value="'. $Today .'">			';
															
					echo 	'								<button type="button" class="btn btn-primary btn-lg btn-block" onclick="CheckIt('. $x .',1)"><span class="glyphicon glyphicon-ok"></span></button> ';
					echo 	'								<button type="button" class="btn btn-warning btn-lg btn-block" onclick="SendIt('. $x .',2)"><span class="glyphicon glyphicon-floppy-disk"></span></button> ';
					echo 	'								<button type="button" class="btn btn-danger btn-lg btn-block" onclick="SendIt('. $x .',3)" ><span class="glyphicon glyphicon-trash"></span></button></div></div> ';
					$x++;
					echo	'					</div>';
					echo 	'				</div> ';//end row
					echo	'	      </div>	';
					echo	'	    </div>	';
					echo	'	  </div>	';
					echo	'	      </div>	';
					echo	'	    </div>	';
					echo	'	  </div>	';


		
					

				}
				

				mysql_free_result($result);

mysql_close($con);
?>