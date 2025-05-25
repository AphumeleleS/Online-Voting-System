<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Statistics</title>
    <!-- Bootstrap -->
	<link href="css/bootstrap.css" rel="stylesheet">
	<style type="text/css">
    </style>
	<link href="css/homestyle.css" rel="stylesheet" type="text/css">

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
  </head>
  <body>
	<div class="container-fluid" id="wrap">
	  <nav class="navbar navbar-default">
	    <div class="container">
	      <!-- Brand and toggle get grouped for better mobile display -->
	      <div class="navbar-header">
	        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#defaultNavbar1" aria-expanded="false"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
	        <a class="navbar-brand" href="http://localhost/eVoting/index.html">The Election</a></div>
	      <!-- Collect the nav links, forms, and other content for toggling -->
	      <div class="collapse navbar-collapse" id="defaultNavbar1">
<ul class="nav navbar-nav navbar-right">
          <li><a href="http://localhost/eVoting/index.html">Home</a></li>
	          <li><a href="http://localhost/eVoting/register.html">Register</a></li>
	          <li><a href="http://localhost/eVoting/login.php">Login</a></li>
	          <li><a href="http://localhost/eVoting/profile.php">Candidate Profiles</a></li>
	          <li><a href="http://localhost/eVoting/statistics.php">Statistics</a></li>
	        </ul>
          </div>
	      <!-- /.navbar-collapse -->
        </div>
        <body>
    <div class="container">
        <!-- Current Winning Candidate Section -->
        <div class="current-winner">
            <h1>Previous Winning Candidate 2023: <span style="color: blue;">Mathew: The Socials</span></h1>
            <div style="display: flex; align-items: center;">
                <img src="images/Matthew.png" alt="Picture of Mathew" style="width: 150px; height: auto; margin-right: 20px;">
                <p><strong>Total Votes:</strong> 85</p>
            </div>
        </div>

        <hr>

        <!-- Running Candidates Section -->
        <div class="running-candidates">
            <h2>Running Candidates</h2>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Candidate</th>
                        <th>Total Votes</th>
                        <th>Rank</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Menzi</td>
                        <td>50</td>
                        <td>2nd Place</td>
                    </tr>
                    <tr>
                        <td>Mariam</td>
                        <td>40</td>
                        <td>3rd Place</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <hr>

        <!-- Previous Winners Section -->
        <div class="previous-winners">
            <h2>Previous Winners</h2>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Year</th>
                        <th>Winner</th>
                        <th>Total Votes</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>2022</td>
                        <td>Mariam</td>
                        <td>90</td>
                    </tr>
                    <tr>
                        <td>2021</td>
                        <td>Mathew</td>
                        <td>80</td>
                    </tr>
                    <tr>
                        <td>2020</td>
                        <td>Menzi</td>
                        <td>95</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>