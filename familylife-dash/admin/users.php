<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Users Page - SB Admin</title>
	
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
	<script type="text/javascript" src="/stylesheets/bootstrap-select.js"></script>
	<link rel="stylesheet" type="text/css" href="/stylesheets/bootstrap-select.css">
	<link href="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet">

    <!-- Add custom CSS here -->
    <link href="/stylesheets/css/sb-admin.css" rel="stylesheet">
	<link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css" rel="stylesheet">

    <script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery.tablesorter/2.13.3/jquery.tablesorter.min.js"></script>
	<script>
		$(document).ready(function(){
			$('.selectpicker').selectpicker();
			$.tablesorter.addParser({ 
				// set a unique id 
				id: 'input', 
				is: function(s) { 
				// return false so this parser is not auto detected 
					return false; 
				}, 
				format: function(s, table, cell) { 
				// format your data for normalization 
				return $('input', cell).val(); 
				}, 
				// set type, either numeric or text 
				type: 'text' 
			}); 
			
			$(function(){
				$("#userTable").tablesorter({
					// pass the headers argument and assing a object
					headers: {
						// assign the secound column (we start counting zero)
						1: {
							sorter:'input'
						},
						2: {
							sorter:'input'
						}
					}
				});
			});
		});
		function editFunction(i){
			$("#name"+i).removeAttr("disabled", "disabled");
			$("#email"+i).removeAttr("disabled", "disabled");
			$("#event"+i).prop('disabled', false);
			$("#event"+i).selectpicker('refresh');
			$("#region"+i).prop('disabled', false);
			$("#region"+i).selectpicker('refresh');
		}
		function saveFunction(i){
			$("#name"+i).attr("disabled", "disabled");
			$("#email"+i).attr("disabled", "disabled");
			$("#event"+i).prop('disabled',true);
			$("#event"+i).selectpicker('refresh');
			$("#region"+i).prop('disabled', true);
			$("#region"+i).selectpicker('refresh');
			
			var name = document.getElementById("name" + i).value;
			var email = document.getElementById("email" + i).value;
			var region = document.getElementById("region" + i).value;
			var event = document.getElementById("event" + i).vaule;
			
			alert(name + " " + email + " " + event + " " + region);
			
		}
		var x = 1000;
		function newFunction(){
			var newRow = 
			'<tr>' + 
				'<td>'+
					'<button onclick="editFunction('+x+')" id="editbutton'+x+'" type="button" class="btn btn-default btn-xs">'+
						'<i class="fa fa-edit"></i>'+
					'</button>'+
					'<button type="button" class="btn btn-default btn-xs">'+
						'<i class="fa fa-trash-o"></i>'+
					'</button>'+
					'<button onclick="saveFunction('+x+')" id="savebutton'+x+'" type="button" class="btn btn-default btn-xs">'+
						'<i class="fa fa-save"></i>'+
					'</button>'+
				'</td>'+
				'<td><input id="name'+x+'" type="text" class="form-control" value="New User Name" disabled></td>'+
				'<td><input id="email'+x+'" type="text" class="form-control" value="New User Email" disabled></td>'+
				'<td>'+	
						'<select id="event'+x+'" class="selectpicker" data-width="250px" multiple disabled>'+	
							'<option>NorthEast</option>'+	
							'<option>New York</option>'+	
							'<option>South West</option>'+	
							'<option>Georgia</option>'+	
							'<option>Portland</option>'+	
						'</select>'+	
				'</td>'+
				'<td>'+	
						'<select id="region'+x+'" class="selectpicker" data-width="250px" multiple disabled>'+	
							'<option>North</option>'+		
							'<option>South</option>'+	
							'<option>East</option>'+	
							'<option>West</option>'+	
						'</select>'+	
				'</td>'+
			'</tr>';
			$('#userTable').prepend(newRow);
			$('.selectpicker').selectpicker();
			$.tablesorter.addParser({ 
				// set a unique id 
				id: 'input', 
				is: function(s) { 
				// return false so this parser is not auto detected 
					return false; 
				}, 
				format: function(s, table, cell) { 
				// format your data for normalization 
				return $('input', cell).val(); 
				}, 
				// set type, either numeric or text 
				type: 'text' 
			}); 
			x++;
		}
		function InsUser(str)
				{
				if (str=="")
				  {
				  document.getElementById("inuser").innerHTML="";
				  return;
				  } 
				if (window.XMLHttpRequest)
				  {// code for IE7+, Firefox, Chrome, Opera, Safari
				  xmlhttp=new XMLHttpRequest();
				  }
				else
				  {// code for IE6, IE5
				  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
				  }
				xmlhttp.onreadystatechange=function()
				  {
				  if (xmlhttp.readyState==4 && xmlhttp.status==200)
					{
					document.getElementById("inuser").innerHTML=xmlhttp.responseText;
					}
				  }
				xmlhttp.open("GET","/InsertUser.php?q="+str,true);
				xmlhttp.send();
				
				}
	</script>	
	
  </head>

  <body>

    <div id="wrapper">

      <!-- Sidebar -->
      <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="http://7.familylife-dash.appspot.com">Home</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
          <ul class="nav navbar-nav side-nav">
            <li><a href="http://7.familylife-dash.appspot.com/index.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="http://7.familylife-dash.appspot.com/steps.php"><i class="fa fa-bar-chart-o"></i> Steps</a></li>
            <li class="active"><a href="http://7.familylife-dash.appspot.com/users.php"><i class="fa fa-table"></i> Users</a></li>
            <li><a href="http://7.familylife-dash.appspot.com/arch.php"><i class="fa fa-desktop"></i> Archives</a></li>
          </ul>

          <ul class="nav navbar-nav navbar-right navbar-user">
            <li class="dropdown user-dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> John Smith <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="#"><i class="fa fa-power-off"></i> Log Out</a></li>
              </ul>
            </li>
          </ul>
        </div><!-- /.navbar-collapse -->
      </nav>

      <div id="page-wrapper">

        <div class="row">
          <div class="col-lg-12">
            <h1>Users and Permissions</h1>
            <ol class="breadcrumb">
              <li><a href="index.php"><i class="icon-dashboard"></i> Dashboard</a></li>
              <li class="active"><i class="icon-file-alt"></i> Users and Permissions</li>
            </ol>
          </div>
        </div><!-- /.row -->
		
		<div class="row">
			<button onclick="newFunction()" type="button" id="newUser" class="btn btn-lg btn-default pull-right">+ New User</button>
		</div><!-- /.row -->
		
		<table  id="userTable" class="table tablesorter"> 
			<thead> 
				<tr> 
					<th>Edit/Delete</th>
					<th>Name</th> 
					<th>Email</th> 
					<th>Event(s)</th> 
					<th>Regions(s)</th> 
				</tr> 
			</thead> 
			<tbody>
				<?php
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
					
					$userResult = mysql_query("SELECT FirstName, LastName, Email, IsAdmin, Name, P_Type, Users.U_Id from Permission 
												LEFT JOIN Users ON Users.U_Id=Permission.U_Id
												LEFT JOIN Event ON P_Id=Event.E_Id
												WHERE P_Type = 0
											UNION
											SELECT FirstName, LastName, Email, IsAdmin, Name, P_Type, Users.U_Id from Permission 
												LEFT JOIN Users ON Users.U_Id=Permission.U_Id
												LEFT JOIN Region ON P_Id=Region.R_Id
												WHERE P_Type = 1 order by LastName, P_Type;");
					if (!$userResult) {
						echo 'Could not run query: ' . mysql_error();
						exit;
					}
					
					$i = 1;
					
					while ($row = mysql_fetch_assoc($userResult)){
						$numEventsResult = mysql_query("SELECT COUNT(P_Type) from Permission WHERE P_Type = 0 AND U_Id ='".$row['U_Id']."';");
						$numRegionsResult = mysql_query("SELECT COUNT(P_Type) from Permission WHERE P_Type = 1 AND U_Id ='".$row['U_Id']."';");
						$numEvents = mysql_result($numEventsResult, 0);
						$numRegions = mysql_result($numRegionsResult, 0);
						$firstName = $row['FirstName'];
						$lastName = $row['LastName'];
						$firstLastName = $firstName . " " . $lastName;
						
							echo 
							'<tr> 
							<td>
								<button onclick="editFunction('. $i .')" type="button" id="editbutton'. $i .'" class="btn btn-default btn-xs">
									<i class="fa fa-edit"></i>
								</button>
								<button type="button" class="btn btn-default btn-xs">
									<i class="fa fa-trash-o"></i>
								</button>
								<button onclick="saveFunction('. $i .')" type="button" id="savebutton'. $i .'" class="btn btn-default btn-xs">
									<i class="fa fa-save"></i>
								</button>
							</td>
							<td><input id="name'. $i .'" type="text" class="form-control" value="'. $firstLastName .'" disabled></td> 
							<td><input id="email'. $i .'" type="text" class="form-control" value="'. $row['Email'] .'" disabled></td>';
						
						if ($numEvents == 0){
							$eventResult = mysql_query("SELECT E_Id, Name from Event order by Name;");
							echo
							'<td>	
								<select id="event'. $i .'" class="selectpicker" data-width="250px" multiple disabled>';
							while ($eventRow = mysql_fetch_assoc($eventResult)){	
								echo	'<option>'. $eventRow['Name'] .'</option>';
							}								
							echo	'</select>
							</td>';
						}
						else{
								$eventResult = mysql_query("SELECT E_Id, Name from Event order by Name;");
								echo
								'<td>	
									<select id="event'. $i .'" class="selectpicker" data-width="250px" multiple disabled>';
								$arrayCount = 0;
								while ($eventRow = mysql_fetch_assoc($eventResult)){
									$events[$arrayCount] = $eventRow['Name'];
									$arrayCount++;
								}
								$userEvents = array();
								for ($k = 0; $k < $numEvents; $k++){
									if($k > 0){
										$row = mysql_fetch_assoc($userResult);
									}
									$userEvents[$k] = $row['Name'];
								}
								for ($b= 0; $b < count($events); $b++){
									$equal = 0;
									for ($c = 0; $c < count($userEvents); $c++){
										if($userEvents[$c] == $events[$b]){
											echo	'<option selected>'. $userEvents[$c] .'</option>';
											$equal = 1;
										}
									}
									if ($equal == 0){
										echo	'<option>'. $events[$b] .'</option>';
									}
								}
								echo	'</select>
								</td>';
							}
						if ($numRegions == 0){
							$regionResult = mysql_query("SELECT R_Id, Name from Region order by Name;");
							echo
							'<td>	
								<select id="region'. $i .'" class="selectpicker" data-width="250px" multiple disabled>';
							while ($regionRow = mysql_fetch_assoc($regionResult)){	
								echo	'<option>'. $regionRow['Name'] .'</option>';
							}								
							echo	'</select>
								</td>
							</tr>';
						}
						else{
							$row = mysql_fetch_assoc($userResult);
							$regionResult = mysql_query("SELECT R_Id, Name from Region order by Name;");
							echo
							'<td>	
								<select id="region'. $i .'" class="selectpicker" data-width="250px" multiple disabled>';
							$arrayCount = 0;
							while ($regionRow = mysql_fetch_assoc($regionResult)){
								$regions[$arrayCount] = $regionRow['Name'];
								$arrayCount++;
							}
							$userRegions = array();
							for ($l = 0; $l < $numRegions; $l++){
								if($l > 0){
									$row = mysql_fetch_assoc($userResult);
								}
								$userRegions[$l] = $row['Name'];
							}
							for ($d= 0; $d < count($regions); $d++){
								$equal = 0;
								for ($e = 0; $e < count($userRegions); $e++){
									if($userRegions[$e] == $regions[$d]){
										echo	'<option selected>'. $userRegions[$e] .'</option>';
										$equal = 1;
									}
								}
								if ($equal == 0){
									echo	'<option>'. $regions[$d] .'</option>';
								}
							}
							echo	'</select>
								</td>
							</tr>';
						}						
						
						$i++;
					}
				?>	
				<div id="inuser"><b>.</b></div>
			</tbody> 
		</table>
      </div><!-- /#page-wrapper -->
    </div><!-- /#wrapper -->
  </body>
</html>