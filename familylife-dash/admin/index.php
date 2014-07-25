<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Dashboard - SB Admin</title>

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
  </head>

  <body>
	<?php
		$dhost=":/cloudsql/familylife-dash:webapp-back";
		$duser="root";
		$dpassword="";
		$database="familylife2";
		$connection=mysql_connect($dhost, $duser, $dpassword) or die("Could not Connect to SQL Server");
		$db=mysql_select_db($database, $connection) or die(" Check the Database Name from Config.php , wrong database entered ");
	?>

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
            <li class="active"><a href="http://7.familylife-dash.appspot.com/index.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="http://7.familylife-dash.appspot.com/steps.php"><i class="fa fa-bar-chart-o"></i> Steps</a></li>
            <li><a href="http://7.familylife-dash.appspot.com/users.php"><i class="fa fa-table"></i> Users</a></li>
            <li><a href="http://7.familylife-dash.appspot.com/arch.php"><i class="fa fa-desktop"></i> Archives</a></li>
          </ul>

          <ul class="nav navbar-nav navbar-right navbar-user">
            <li class="dropdown user-dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> John Smith <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="http://localhost/dist/Learning%20Family%20Life/Dashboard.php"><i class="fa fa-power-off"></i> Log Out</a></li>
              </ul>
            </li>
          </ul>
        </div><!-- /.navbar-collapse -->
      </nav>

      <div id="page-wrapper">

        <div class="row">
          <div class="col-lg-12">
            <h1>Dashboard</h1>
            <div class="alert alert-success alert-dismissable">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              Welcome the Dashboard!
            </div>
          </div>
        </div><!-- /.row -->

        <div class="row">         
          <div class="col-lg-3">
            <div class="panel panel-warning">
              <div class="panel-heading">
                <div class="row">
                  <div class="col-xs-6">
                    <i class="fa fa-check fa-5x"></i>
                  </div>
                  <div class="col-xs-6 text-right">
                    <p class="announcement-heading">
					<?php
						$Yellow_result = mysql_query("SELECT COUNT((C_Date - INTERVAL (DueDate + Yellow) WEEK)) AS Total
														FROM CS_Specs
														LEFT JOIN Event ON CS_Specs.E_Id=Event.E_Id
														WHERE (C_Date - INTERVAL (DueDate + Yellow) WEEK) < CURDATE() 
														AND (C_Date - INTERVAL (DueDate + Red) WEEK) > CURDATE();");
						$Yellow = mysql_result($Yellow_result, 0);
						echo $Yellow;
					?>
					</p>
                    <p class="announcement-text">Yellow Lights</p>
                  </div>
                </div>
              </div>
              <a href="#">
                <div class="panel-footer announcement-bottom">
                  <div class="row">
                    <div class="col-xs-6">
                      View Yellow Lights
                    </div>
                    <div class="col-xs-6 text-right">
                      <i class="fa fa-arrow-circle-right"></i>
                    </div>
                  </div>
                </div>
              </a>
            </div>
          </div>
          <div class="col-lg-3">
            <div class="panel panel-danger">
              <div class="panel-heading">
                <div class="row">
                  <div class="col-xs-6">
                    <i class="fa fa-tasks fa-5x"></i>
                  </div>
                  <div class="col-xs-6 text-right">
                    <p class="announcement-heading">
					<?php
						$Red_result = mysql_query("SELECT COUNT((C_Date - INTERVAL (DueDate + Red) WEEK)) AS Total
													FROM CS_Specs
													LEFT JOIN Event ON CS_Specs.E_Id=Event.E_Id
													WHERE (C_Date - INTERVAL (DueDate + Red) WEEK) < CURDATE();");
						$Red = mysql_result($Red_result, 0);
						echo $Red;
					?>
					</p>
                    <p class="announcement-text">Total Red Lights</p>
                  </div>
                </div>
              </div>
              <a href="#">
                <div class="panel-footer announcement-bottom">
                  <div class="row">
                    <div class="col-xs-6">
                      View Red Lights
                    </div>
                    <div class="col-xs-6 text-right">
                      <i class="fa fa-arrow-circle-right"></i>
                    </div>
                  </div>
                </div>
              </a>
            </div>
          </div>
          <div class="col-lg-3">
            <div class="panel panel-success">
              <div class="panel-heading">
                <div class="row">
                  <div class="col-xs-6">
                    <i class="fa fa-comments fa-5x"></i>
                  </div>
                  <div class="col-xs-6 text-right">
                    <p class="announcement-heading">
					<?php
						$Green_result = mysql_query("SELECT COUNT((C_Date - INTERVAL (DueDate + Yellow) WEEK)) AS Total
														FROM CS_Specs
														LEFT JOIN Event ON CS_Specs.E_Id=Event.E_Id
														WHERE (C_Date - INTERVAL (DueDate + Yellow) WEEK) > CURDATE();");
						$Green = mysql_result($Green_result, 0);
						echo $Green;
					?>
					</p>
                    <p class="announcement-text">Total Green Lights</p>
                  </div>
                </div>
              </div>
              <a href="#">
                <div class="panel-footer announcement-bottom">
                  <div class="row">
                    <div class="col-xs-6">
                     View Green Lights
                    </div>
                    <div class="col-xs-6 text-right">
                      <i class="fa fa-arrow-circle-right"></i>
                    </div>
                  </div>
                </div>
              </a>
            </div>
          </div>
        </div><!-- /.row -->
      </div><!-- /#page-wrapper -->
    </div><!-- /#wrapper -->
  </body>
</html>
