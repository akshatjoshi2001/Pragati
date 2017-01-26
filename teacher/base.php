<?php
include 'checksession.php';


?>

<!doctype html>
<html lang="en">

	<head>

		<title>Pragati-Teacher Dashboard (BETA)</title>

		<meta charset="utf-8">
		<meta name="author" content="Akshat Joshi">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>    
                <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
        <!-- Bootstrap -->
                <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css" rel="stylesheet">
				<link rel="stylesheet" href="http://theonlinetimes.esy.es/normalize.css">
<link rel="stylesheet" href="http://theonlinetimes.esy.es/skeleton.css">
				<link href="style.css" rel="stylesheet">
              
				</head>
		
	<body>
		<div class="mast-head">
			<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="pull-left" href="dashboard.php"><img src="../logo.png" alt="Pragati" height="60vh"  /></a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav ">
       
       
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">More <span class="caret"></span></a>
          <ul class="dropdown-menu">
           
            <li role="separator" class="divider"></li>
            <li><a href="#">Help</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">About Pragati</a></li>
          </ul>
        </li>
      </ul>
      <form class="navbar-form navbar-right" role="search" action="search.php">
        <div class="form-group">
          <input type="text" class="form-control search-bar" placeholder="Search For Lessons" name="q" style="width:40vw;">
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
      </form>
    
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
			
		</div>
<br /><br /><br />
		<div class="container">
