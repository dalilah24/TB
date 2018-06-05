<!-- Header for public unprotected pages -->
<!DOCTYPE html>
<html>
<head>
<title>Arau High School Computer Club</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- CSS -->
<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
<link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="assets/bootstrap/css/bootstrap-datepicker.css">
<link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">
<link rel="stylesheet" href="assets/css/style.css" >
<!-- JS -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/tooltip.js"></script>
<script src="assets/js/bootstrap-datepicker.js"></script>
<script>
$(document).ready(function(){
$('[data-toggle="tooltip"]').tooltip();
});
</script>
</head>
<body>
<!-- top navigation-->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
<div class="container">
<div class="navbar-header">
<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
	<span class="icon-bar"></span>
	<span class="icon-bar"></span>
	<span class="icon-bar"></span>
</button>
<a class="navbar-brand hidden-xs hidden-sm" href="index.php" target="_blank">Arau High School Computer Club</a>
</div>
<div class="collapse navbar-collapse" id="myNavbar">
<ul class="nav navbar-nav">
	<li class="active"><a href="index.php"><span class="glyphicon glyphicon-home"></span> Home </a></li>
	<li><a href="aboutus.php" data-toggle="tooltip" data-placement="bottom" title="About Us Page"> About Us</a></li>
	<li><a href="signup.php" data-toggle="tooltip" data-placement="bottom" title="Sign Up" ><span class="glyphicon glyphicon-pencil"></span> Sign Up</a></li>
	<li><a href="login.php" data-toggle="tooltip" data-placement="bottom" title="Login" ><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
</ul>
</div>
</div>
</nav>