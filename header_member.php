
<!DOCTYPE html>
<html>
<head>
<title>MEMBER PAGE</title>
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
<body background="assets/img/whie.jpg">
<!-- top navigation-->

<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
<div class="container">
<div class="navbar-header">
<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
<span class="icon-bar"></span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
</button>
<td><a href="index.php"><img src="images/TWB-black-logo.png" width="253" height="50" border="0"></a></td> &nbsp;
</div>
<div class="collapse navbar-collapse" id="myNavbar">
<ul class="nav navbar-nav">
<li class="active"><a href="member.php"><span class="glyphicon glyphicon-home"></span> Member Home</a></li>
<li><a href="stocks.php" data-toggle="tooltip" data-placement="bottom" title="View details"><span class="glyphicon glyphicon-list"></span> View Product</a></li>
</ul>
</div>
</div>
<div class="container">
<div class="pull-left">
Welcome, 
</div>
<div class="pull-right">
<a class="navbar-link" href="logout.php">Logout</a>
</div>
</div>
</nav>
</body>
</html>
