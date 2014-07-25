<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Critical Steps - SB Admin</title>

    <!-- Bootstrap core CSS --
    <link href="css/bootstrap.css" rel="stylesheet"> -->
	<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css">

    <!-- Add custom CSS here -->
    <link href="/stylesheets/css/sb-admin.css" rel="stylesheet">
    <!-- <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css"> -->
	<link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css" rel="stylesheet">
    <!-- Page Specific CSS -->
    <link rel="stylesheet" href="http://cdn.oesmith.co.uk/morris-0.4.3.min.css">
	<!-- JavaScript --
    <script src="js/jquery-1.10.2.js"></script>
    <script src="js/bootstrap.js"></script> -->
	<script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>

    <!-- Page Specific Plugins -->
    <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="http://cdn.oesmith.co.uk/morris-0.4.3.min.js"></script>
    <!-- <script src="js/morris/chart-data-morris.js"></script>
    <script src="js/tablesorter/jquery.tablesorter.js"></script>
    <script src="js/tablesorter/tables.js"></script> -->
	
	<script>
		function editContentFunction(i){
			$("#content"+i).removeAttr("disabled", "disabled");
		}
		function editEventFunction(i, j){
			$("#dueDate"+i+"_"+j).removeAttr("disabled", "disabled");
			$("#yellow"+i+"_"+j).removeAttr("disabled", "disabled");
			$("#red"+i+"_"+j).removeAttr("disabled", "disabled");
			$("#notes"+i+"_"+j).removeAttr("disabled", "disabled");
		}
		function newTableRow(x){
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
				'<td>...</td>'+
				'<td>...</td>'+
				'<td>...</td>'+
				'<td>...</td>'+
				'<td>...</td>'+
			'</tr>';
			$('#eventTable'+x).prepend(newRow);
		}
		function saveTools(str)
		{			
			if (str=="")
			{
				document.getElementById("DJ").innerHTML="";
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
						document.getElementById("DJ").innerHTML=xmlhttp.responseText;
					}
				  }
			xmlhttp.open("GET","/steps.php/SaveTools.php?t="+str,true);
			xmlhttp.send();
		}
		function saveContent(str)
		{			
			if (str=="")
			{
				document.getElementById("JD").innerHTML="";
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
						document.getElementById("JD").innerHTML=xmlhttp.responseText;
					}
				  }
			xmlhttp.open("GET","/steps.php/SaveContent.php?c="+str,true);
			xmlhttp.send();
		}
		function saveRatings(str)
		{			
			if (str=="")
			{
				document.getElementById("DD").innerHTML="";
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
						document.getElementById("DD").innerHTML=xmlhttp.responseText;
					}
				  }
			xmlhttp.open("GET","/steps.php/SaveRatings.php?r="+str,true);
			xmlhttp.send();
		}
		function saveEventInfo(str)
		{			
			if (str=="")
			{
				document.getElementById("DD").innerHTML="";
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
						document.getElementById("DD").innerHTML=xmlhttp.responseText;
					}
				  }
			xmlhttp.open("GET","/steps.php/SaveEventInfo.php?e="+str,true);
			xmlhttp.send();
		}
		function sendTools(loc)
		{
			var tools = document.getElementById("tools" + loc).value;
			var cs_id = document.getElementById("CS_ID" + loc).value;
						
			var str= cs_id + "~"+ tools;				
			saveTools(str);
		}
		function sendContent(loc)
		{
			var content = document.getElementById("content" + loc).value;
			var cs_id = document.getElementById("CS_ID" + loc).value;
						
			var str= cs_id + "~"+ content;				
			saveContent(str);
			$("#content"+loc).attr("disabled", "disabled");
		}
		function sendRatings(loc)
		{
			var rat1 = document.getElementById("rating1" + loc).value;
			var rat2 = document.getElementById("rating2" + loc).value;
			var rat3 = document.getElementById("rating3" + loc).value;
			var rat4 = document.getElementById("rating4" + loc).value;
			var rat5 = document.getElementById("rating5" + loc).value;
			var cs_id = document.getElementById("CS_ID" + loc).value;
						
			var str= cs_id + "~"+ rat1 + "~"+ rat2 + "~"+ rat3 + "~"+ rat4 + "~"+ rat5;				
			saveRatings(str);
		}
		function sendEventInfo(loc, eid)
		{
			var tarweek = document.getElementById("dueDate"+loc+"_"+eid).value;
			var yellow = document.getElementById("yellow"+loc+"_"+eid).value;
			var red = document.getElementById("red"+loc+"_"+eid).value;
			var notes = document.getElementById("notes"+loc+"_"+eid).value;
			var cs_id = document.getElementById("CS_ID" + loc).value;
						
			var str= eid + "~"+ tarweek + "~"+ yellow + "~"+ red + "~"+ notes + "~"+ cs_id;				
			saveEventInfo(str);
			$("#dueDate"+loc+"_"+eid).attr("disabled", "disabled");
			$("#yellow"+loc+"_"+eid).attr("disabled", "disabled");
			$("#red"+loc+"_"+eid).attr("disabled", "disabled");
			$("#notes"+loc+"_"+eid).attr("disabled", "disabled");
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
            <li class="active"><a href="http://7.familylife-dash.appspot.com/steps.php"><i class="fa fa-bar-chart-o"></i> Steps</a></li>
            <li><a href="http://7.familylife-dash.appspot.com/users.php"><i class="fa fa-table"></i> Users</a></li>
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
            <h1>Critical Steps</h1>
            <ol class="breadcrumb">
              <li><a href="index.php"><i class="icon-dashboard"></i> Dashboard</a></li>
              <li class="active"><i class="icon-file-alt"></i> Critical Steps</li>
            </ol>
          </div>
        </div><!-- /.row -->
		
		<div class="row">
			<button type="button" id="newCS" class="btn btn-lg btn-default pull-right">+ New Step</button>
		</div><!-- /.row -->
		
		<div class="bodycontainer scrollable">
			<div class="panel-group" id="accordion">
			<?php
			$dhost=":/cloudsql/familylife-dash:webapp-back";
			$duser="root";
			$dpassword="";
			$database="familylife2";
			$con=mysql_connect($dhost, $duser, $dpassword) or die("Could not Connect to SQL Server");
			mysql_select_db($database);
			$allStepsResult = mysql_query("SELECT Content, Cs_Id, Tools, Rating1_info, Rating2_info, Rating3_info,
											Rating4_info, Rating5_info from CS;");
			if (!$allStepsResult){
				echo 'Could not run query: ' . mysql_error();
				exit;
			}
			
			$i = 1;
			
			while ($allStepsRow = mysql_fetch_assoc($allStepsResult)){	
				echo
				'<div class="container-fluid">
					<div class="row">
						<div class="col-md">
							<div class="panel panel-info">	
								<div class="panel-heading">								
									<h4 class="panel-title">	
										<a data-toggle="collapse" data-parent="#accordion" href="#'. $i .'">
											<textarea id="content'. $i .'" class="form-control" rows="2" disabled>'. $allStepsRow['Content'] .'</textarea>
										</a>										
										<button onclick="editContentFunction('. $i .')"  type="button" id="editContentButton'. $i .'" class="btn btn-default btn-xs">
											<i class="fa fa-edit"></i>
										</button>
										<button onclick="sendContent('. $i .')" type="button" id="savebutton'. $i .'" class="btn btn-default btn-xs">
											<i class="fa fa-save"></i>
										</button>
									</h4>	
								</div>
								<div id="'. $i .'" class="panel-collapse collapse ">
									<div class="panel-body">
										<div class="row">													
											<div class="col-md-4">
												<div class="panel panel-primary"> 
													<div class="panel-heading">
														Tools
													</div>
														<div class="panel-body">
															<form class="form-horizontal" role="form">																
																<div class="form-group">
																	<label for="tools" class="col-sm-4 control-label">
																		Tools:
																	</label>
																		<div class="col-sm-8">
																			<input type="hidden" id="CS_ID'. $i .'" value="'. $allStepsRow['Cs_Id'] .'">
																			<textarea id="tools'. $i .'" class="form-control" rows="3">
																				'. $allStepsRow['Tools'] .'
																			</textarea>
																			<button onclick="sendTools('. $i .')"  type="button" id="saveToolsButton'. $i .'" class="btn btn-md btn-default pull-right">
																				Save Tools
																			</button>
																		</div>
																</div>																
															</form>	
														</div>	
												</div>	
											</div>
											<div class="col-md-8">
												<div class="panel panel-primary"> 
													<div class="panel-heading">
														Ratings
													</div>
														<div class="panel-body">
															<form class="form-horizontal" role="form">	
																<div class="col-md-6">
																	<div class="form-group">
																		<label for="rating1'. $i .'" class="col-sm-4 control-label">
																			1:
																		</label>
																		<div class="col-sm-8">
																			<textarea id="rating1'. $i .'" class="form-control" rows="2">'.
																				$allStepsRow['Rating1_info']
																			.'</textarea>
																		</div>
																		<label for="rating2'. $i .'" class="col-sm-4 control-label">
																			2:
																		</label>
																		<div class="col-sm-8">
																			<textarea id="rating2'. $i .'" class="form-control" rows="2">'.
																				$allStepsRow['Rating2_info']
																			.'</textarea>
																		</div>
																		<label for="rating3'. $i .'" class="col-sm-4 control-label">
																			3:
																		</label>
																		<div class="col-sm-8">
																			<textarea id="rating3'. $i .'" class="form-control" rows="2">'.
																				$allStepsRow['Rating3_info']
																			.'</textarea>
																		</div>
																	</div>
																</div>
																<div class="col-md-6">
																	<div class="form-group">
																		<label for="rating4'. $i .'" class="col-sm-4 control-label">
																			4:
																		</label>
																		<div class="col-sm-8">
																			<textarea id="rating4'. $i .'" class="form-control" rows="2">'.
																				$allStepsRow['Rating4_info']
																			.'</textarea>
																		</div>
																		<label for="rating5'. $i .'" class="col-sm-4 control-label">
																			5:
																		</label>
																		<div class="col-sm-8">
																			<textarea id="rating5'. $i .'" class="form-control" rows="2">'.
																				$allStepsRow['Rating5_info']
																			.'</textarea>
																		</div>
																	</div>
																	<button onclick="sendRatings('. $i .')" type="button" id="saveRatingsButton'. $i .'" class="btn btn-md btn-default pull-right">
																				Save Ratings
																	</button>
																</div>
															</form>	
														</div>	
												</div>	
											</div>		
										</div>			
									</div>
									<div>
										<button onclick="newTableRow('. $i .')" type="button" id="addStepToEvent'. $i .'" class="btn btn-md btn-default">
											Add Step to Another Event
										</button>
										<table  id="eventTable'. $i .'" class="table tablesorter"> 
											<thead> 
												<tr> 
													<th>Delete</th>
													<th>Event</th> 
													<th>Target Week</th> 
													<th>Yellow</th> 
													<th>Red</th> 
													<th>Notes</th>
												</tr> 
											</thead> 
											<tbody>';
											$allEventsResult = mysql_query("SELECT Event.E_Id, Name, Red, Yellow, Notes, DueDate
																			from Event
																			INNER JOIN CS_Specs ON Event.E_Id = CS_Specs.E_Id
																			WHERE Cs_Id = ".$allStepsRow['Cs_Id'].";");
											if (!$allEventsResult){
												echo 'Could not run query: ' . mysql_error();
												exit;
											}
											while ($allEventsRow = mysql_fetch_assoc($allEventsResult)){
												echo
												'<tr> 
													<td>
														<button onclick="editEventFunction('. $i .','.$allEventsRow['E_Id'].')" type="button" id="editEventButton" class="btn btn-default btn-xs">
															<i class="fa fa-edit"></i>
														</button>
														<button type="button" id="deleteEventButton" class="btn btn-default btn-xs">
															<i class="fa fa-trash-o"></i>
														</button>
														<button onclick="sendEventInfo('. $i .','.$allEventsRow['E_Id'].')" type="button" id="saveEventButton" class="btn btn-default btn-xs">
															<i class="fa fa-save"></i>
														</button>											
													</td>
													<td>
														'.$allEventsRow['Name'].'
													</td>
													<td>
														<input type="text" id="dueDate'. $i .'_'.$allEventsRow['E_Id'].'" class="form-control" value="'.$allEventsRow['DueDate'].'" disabled>
													</td>
													<td>
														<input type="text" id="yellow'. $i .'_'.$allEventsRow['E_Id'].'" class="form-control" value="'.$allEventsRow['Yellow'].'" disabled>
													</td>
													<td>
														<input type="text" id="red'. $i .'_'.$allEventsRow['E_Id'].'" class="form-control" value="'.$allEventsRow['Red'].'" disabled>
													</td>
													<td>
														<textarea id="notes'. $i .'_'.$allEventsRow['E_Id'].'" class="form-control" disabled>'.$allEventsRow['Notes'].'</textarea>
													</td>					
												</tr>';
											}
											echo
											'</tbody> 
										</table>
									</div>
								</div>					
							</div>
						</div>
					</div>
				</div>';
				$i++;
			}
			?>
			</div>
		</div>
		
		<div id="DJ"><b>.</b></div>
		<div id="JD"><b>.</b></div>
		<div id="DD"><b>.</b></div>

      </div><!-- /#page-wrapper -->

    </div><!-- /#wrapper -->

    <!-- JavaScript 
    <script src="js/jquery-1.10.2.js"></script>
    <script src="js/bootstrap.js"></script> -->

  </body>
</html>