<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Archives - SB Admin</title>

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
            <li><a href="http://7.familylife-dash.appspot.com/users.php"><i class="fa fa-table"></i> Users</a></li>
            <li class="active"><a href="http://7.familylife-dash.appspot.com/arch.php"><i class="fa fa-desktop"></i> Archives</a></li>
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
            <h1>Archives</h1>
            <ol class="breadcrumb">
              <li><a href="index.html"><i class="icon-dashboard"></i> Dashboard</a></li>
              <li class="active"><i class="icon-file-alt"></i> Archives</li>
            </ol>
          </div>
        </div><!-- /.row -->
		<div class="lead">
		  <h4>Instructions for Reset</h4>
		</div>
		<div class="well">
		  <p>These are the instructions on how to use Reset Properly: ....</p>
		</div>
		<div class="row-fluid">
		    <div class = "col-md-4 col-md-offset-8">
			  <div class="btn-group">
			    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
				  Name of Year <span class="caret"></span>
			    </button>
			    <ul class="dropdown-menu" role="menu">
				  <li><a href="#">Action</a></li>
			    </ul>
			  </div> 
			    <button onclick="newFunction()" type="button" id="newUser" class="btn btn-lg btn-default">Reset Year</button>
            </div>				
		</div><!-- /.row -->
        <div class = "container-fluid">
		  <div class = "row-fluid">
			  <div class="btn-group">
			    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
				  Choose Year Name from table, "Year" <span class="span4 caret"></span>
			    </button>
			    <ul class="dropdown-menu" role="menu">
				  <li><a href="#">Action</a></li>
			    </ul>
			  </div>		  
		  </div><!-- row-->
		  <h3>Regions</h3>
		  <table class="table table-striped table-bordered">
		    <thead>
			  <tr>
			    <th>Name</th>
				<th>Event(s)</th>
				<th>Rep(s) in Charge</th>
			  </tr>
			</thead>
            <tbody>
		      <tr>
			    <td>Test</td>
				<td>Test2</td>
				<td>Test3</td>
			  </tr>
            </tbody>			
		  </table><!-- table -->
		  <h3>Events</h3>
		  <table class="table table-striped table-bordered">
		    <thead>
			  <tr>
			    <th>Name</th>
				<th>Date</th>
				<th>Rep(s) in Charge</th>
			  </tr>
			</thead>
            <tbody>
			 <tr>
			   <td>Test</td>
			   <td>Test2</td>
			   <td>Test3</td>
			 </tr> 
            </tbody>			
		  </table><!-- table -->
		  <h3>Critical Steps</h3>
		  <table class="table table-striped table-bordered">
		    <thead>
			  <tr>
			    <th>Due Date</th>
				<th>Completion Date</th>
				<th>Red Date</th>
				<th>Yellow Date</th>
				<th>Rating</th>
				<th>Notes</th>
				<th>Content?</th>
			  </tr>
			</thead>
            <tbody>
			 <tr>
			   <td>Test</td>
			   <td>Test2</td>
			   <td>Test3</td>
			   <td>Test4</td>
			   <td>Test5</td>
			   <td>Test6</td>
			   <td>Test7</td>
			 </tr> 			
            </tbody>			
		  </table><!-- table -->		  
		</div><!--container-->
      </div><!-- /#page-wrapper -->

    </div><!-- /#wrapper -->

    <!-- JavaScript -->
    <script src="js/jquery-1.10.2.js"></script>
    <script src="js/bootstrap.js"></script>

  </body>
</html>