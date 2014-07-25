<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="">
		<meta name="author" content="">
	
		<title>Family Life</title>
	
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css">
		<!-- Optional theme -->
		<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap-theme.min.css">
		<!-- Latest compiled and minified JavaScript -->
		<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
	
	</head>
	<body>
		<script src="http://code.jquery.com/ui/1.10.4/jquery-ui.min.js"></script>
		<?php
				$dhost=":/cloudsql/familylife-dash:webapp-back";
				$duser="root";
				$dpassword="";
				$database="familylife2";
				$connection=mysql_connect($dhost, $duser, $dpassword) or die("Could not Connect to SQL Server");
				$db=mysql_select_db($database, $connection) or die(" Check the Database Name from Config.php , wrong database entered ");
			?>
			<script>
				function showUser(str)
				{
				if (str=="")
				  {
				  document.getElementById("txtHint").innerHTML="";
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
					document.getElementById("txtHint").innerHTML=xmlhttp.responseText;
					}
				  }
				xmlhttp.open("GET","/regions.php?q="+str,true);
				xmlhttp.send();
				
				}
				</script>
				
				<script>
				function Steps(str)
				{			
				if (str=="")
				  {
				  document.getElementById("CriticalStp").innerHTML="";
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
					document.getElementById("CriticalStp").innerHTML=xmlhttp.responseText;
					}
				  }
				xmlhttp.open("GET","/CriticalSteps.php?q="+str,true);
				xmlhttp.send();
				}
				
				</script>
				
	<script>
				function Warnings(str)
				{
								
				if (str=="")
				  {
				  document.getElementById("Warn").innerHTML="";
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
					document.getElementById("Warn").innerHTML=xmlhttp.responseText;
					}
				  }
				xmlhttp.open("GET","/warning.php?q="+str,true);
				xmlhttp.send();
				}
				</script>

					<script>
				function SaveStp(str)
								{
				if (str=="")
				  {
				  document.getElementById("SS").innerHTML="";
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
					document.getElementById("SS").innerHTML=xmlhttp.responseText;
					}
				  }
				xmlhttp.open("GET","/SaveStep.php?e="+str,true);
				xmlhttp.send();
				}
				</script>	


					<script>
				function ClearStp(str)
								{
				if (str=="")
				  {
				  document.getElementById("TT").innerHTML="";
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
					document.getElementById("TT").innerHTML=xmlhttp.responseText;
					}
				  }
				xmlhttp.open("GET","/ClearStep.php?e="+str,true);
				xmlhttp.send();
				}
				</script>							
				
				<script>
				function SendIt(loc,sel)
								{
				var nteid="notes_" + loc;
				var dteid="date_" + loc;
				
				//var nte = document.getElementById(nteid).value;
				var dte = document.getElementById(dteid).value;
				var rate = 0;
				var nte = document.getElementById("notes_" + loc).value;
				var e_id = document.getElementById("evid_" + loc).value;
				var cs_id = document.getElementById("CSID_" + loc).value;

				if(document.getElementById("one_" + loc).checked )
				{
				rate = 1;
				}
				if (document.getElementById("two_" + loc).checked )
				{
				rate = 2;
				}
				if (document.getElementById("three_"+loc).checked)
				{
				rate = 3;
				}
				if (document.getElementById("four_"+loc).checked)
				{
				rate = 4;
				}
				if (document.getElementById("five_"+loc).checked)
				{
				rate = 5;
				}
				
				if(sel==1)
				{
				dte = document.getElementById("dte_" + loc).value;
				alert("Step Completed Refresh to see changes");
				}
				
				if(sel==2)
				{
	
				alert("Step Saved Refresh to see changes");
				}
				if(sel==3)
				{
				 dte = "."
				 rate = "."
				 nte = "."
				 alert("Step Reset Refresh to see changes");
				}
				
				var str= cs_id + ","+ e_id + ","+ dte + "," + rate + ","+ nte;
				
				
				
				
				
				SaveStp(str);

				}
				</script>			
					<script>
				function CheckIt(loc,sel)
								{
								
						SendIt(loc,sel);
				}
				</script>			
				<script>
			function ClearIt(loc)
								{
				/*
						

				var e_id = document.getElementById("evid_" + loc).value;
				var cs_id = document.getElementById("CSID_" + loc).value;
	
				
				
				var str= cs_id + ","+ e_id;
				ClearStp(str);
				alert ("Step Cleared!"); 
				*/
				}
				</script>				
	
	
				
		<!-- Fixed navbar -->
		<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="#">Dashboard</a>
				</div>
				<div class="navbar-collapse collapse">
					<ul class="nav navbar-nav">
						<li class="active"><a href="http://7.familylife-dash.appspot.com/">Home</a></li>
						<li><a href="http://7.familylife-dash.appspot.com/index.php"">Admin Login</a></li>
				   
						<li><a href="http://www.familylife.com/">Family Life Website</a></li>
						
							<div  class="navbar-form navbar-right" >
																
							<!-- 	dynamically created	-->		
							<div id="txtHint"><b>SignIn</b></div>
							</div>
					</ul>
						
						</div>
				</div><!--/.nav-collapse -->
			</div>
		</div>	
		

		
		<div class="container theme-showcase">
			<div class="page-header">
				<h1></h1>
			</div>
			
				<div id="profile" class="show">
					<div>
						<span id="name"></span>
					</div>
						
				</div>
				
							
			      <!-- Main jumbotron for a primary marketing message or call to action -->
			<div class="jumbotron" >
				<h1>Welcome to the Dashboard!!!
				<?php				
				//change jumbotron code
				date_default_timezone_set(date_default_timezone_get());
				$result=mysql_query("SELECT C_Date FROM Event");
				$values = mysql_fetch_array($result);
				
				$Event_Date = $values['C_Date'];
				$Today = date('Y-m-d');
									
				$ts1 = strtotime($Today);
				$ts2 = strtotime($Event_Date);
				
				$seconds_diff = $ts2 - $ts1;
				
				//echo floor ($seconds_diff/3600/24);
				//end change
				?>
				</h1>
					<p>Below are tabs that contain the different components of the dashboard.</p>
						<div id="signin-button" align="right">
							<div
								class="g-signin"
								data-callback="loginFinishedCallback"
								data-clientid="598104507698-a6rheidt92cqqemc9k0kec49vh8tuf0s.apps.googleusercontent.com"
								data-cookiepolicy="single_host_origin"
								data-approvalprompt="force"
								data-scope="https://www.googleapis.com/auth/plus.login https://www.googleapis.com/auth/plus.profile.emails.read"
								>
							</div>
							</div>
							
			
			</div>

			
			<!-- start -->
			<div class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title">Dashboard</h3>
  </div>

  
  <div class="panel-body">
    <!--tabs -->
		<!-- Nav tabs -->
		<ul class="nav nav-tabs nav-justified">
		  <li><a href="#Warnings" data-toggle="tab">Warnings</a></li>
		  <li><a href="#CriticalSteps" data-toggle="tab">Critical Steps</a></li>
		</ul>

		<div class="tab-content">
		  <div class="tab-pane fade in active"  id="Warnings">
				  <!--alerts-->
				<div id="Warn"><b>Please Sign In</b></div>
			
				
		  </div>
		
		<div class="tab-pane fade " id="CriticalSteps">
		<div id="CriticalStp"><b>Please Sign In to View Critical Steps or Select Region from above</b></div>

		

			</div>
			</div>
		</div>
		</div>
  </div>
</div>
			<!--end-->
			
		 
			<div class="page-header">
				<h1>Instructions for Use</h1>
			</div>
			<div class="well">
		    	<p>Click on the designated tabs above to navigate to the warnings and critical steps sections. Tools & training, messages, and ratings can be found in the individual critical steps under the critical steps tab.</p>
			</div>
	  	</div>
		 
		
<script type="text/javascript">
  //Global variables to hold the profile and email data.
  var profile, email;
	
  //Triggered when the user accepts the sign in, cancels, or closes the
  //authorization dialog.
  function loginFinishedCallback(authResult) {
    if (authResult) {
      if (authResult['error'] == undefined){
        
        gapi.client.load('plus','v1', loadProfile);  // Trigger request to get the email address.
		toggleElement('signin-button'); // Hide the sign-in button after successfully signing in the user.

		
      } else {
        console.log('An error occurred');
      }
    } else {
      console.log('Empty authResult');  // Something went wrong
    }
  }
  /**
   * Uses the JavaScript API to request the user's profile, which includes
   * their basic information. When the plus.profile.emails.read scope is
   * requested, the response will also include the user's primary email address
   * and any other email addresses that the user made public.
   */
  function loadProfile(){
    var request = gapi.client.plus.people.get( {'userId' : 'me'} );
    request.execute(loadProfileCallback);
  }
  
  /**
   * Callback for the asynchronous request to the people.get method. The profile
   * and email are set to global variables. Triggers the user's basic profile
   * to display when called.
   */
  function loadProfileCallback(obj) {
    profile = obj;

    // Filter the emails object to find the user's primary account, which might
    // not always be the first in the array. The filter() method supports IE9+.
    email = obj['emails'].filter(function(v) {
        return v.type === 'account'; // Filter out the primary email
    })[0].value; // get the email from the filtered results, should always be defined.
	
    displayProfile(profile);
		
  }
  
  //Display the user's basic profile information from the profile object.
  function displayProfile(profile){
    //document.getElementById('name').innerHTML = profile['displayName'];
    //document.getElementById('email').innerHTML = email;
	//$.post('main.php', { "email" : email});
	//$.ajax({type: "POST", url: 'main.php', data: { email : email }});
	//jQuery.post('main.php', {email: email});
	//window.location.href = "main.php?email=" + email;
	//toggleElement('email');
    //toggleElement('profile');

	showUser(email);


  }
  
  //Utility function to show or hide elements by their IDs.
  function toggleElement(id) {
    var el = document.getElementById(id);
    if (el.getAttribute('class') == 'hide') {
      el.setAttribute('class', 'show');
    } else {
      el.setAttribute('class', 'hide');
    }
  }
</script>
	
	<!-- Place this asynchronous JavaScript just before your </body> tag -->
    <script type="text/javascript">
      (function () {
       var po = document.createElement('script'); 
	   po.type = 'text/javascript'; 
	   po.async = true;
       po.src = 'https://apis.google.com/js/client:plusone.js';
       var s = document.getElementsByTagName('script')[0]; 
	   s.parentNode.insertBefore(po, s);
      })();
	</script>		
		
	</body>
	
	<!-- <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script> -->
   <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
   <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
</html>

