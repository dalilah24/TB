<?php 
include('header.php'); 
?> 
<!-- Content start here --> 
<div class="container" style="margin-top:45px">

<div class="collapse navbar-collapse" id="myNavbar">
<ul class="nav navbar-nav">
<li class="active"><a href="index.php"><span class="glyphicon glyphicon-home"></span> HOME </a></li>
<li><a href="stocks.php" data-toggle="tooltip" data-placement="bottom" title="Stocks" ><span class="glyphicon glyphicon-log-in"></span> PRODUCT</a></li>
<li><a href="signup.php" data-toggle="tooltip" data-placement="bottom" title="Sign Up" ><span class="glyphicon glyphicon-log-in"></span> SIGN UP</a></li>
<li><a href="login.php" data-toggle="tooltip" data-placement="bottom" title="Admin/Customer Login" ><span class="glyphicon glyphicon-log-in"></span> LOGIN</a></li>
</ul>
</div>

<h5><br>Developed by Dalilah Sabidi </h5> </br>
<div class="w3-content w3-section" style="max-width:2000px">
  <img class="mySlides" src="assets/img/feb-2018-cat2.jpg" style="width:100%">
  <img class="mySlides" src="assets/img/feb-2018-chic.gif" style="width:100%">
  
</div>

<script>
var myIndex = 0;
carousel();

function carousel() {
    var i;
    var x = document.getElementsByClassName("mySlides");
    for (i = 0; i < x.length; i++) {
       x[i].style.display = "none";  
    }
    myIndex++;
    if (myIndex > x.length) {myIndex = 1}    
    x[myIndex-1].style.display = "block";  
    setTimeout(carousel, 2000); // Change image every 2 seconds
}
</script>
<body>
	<link rel="stylesheet" type="text/css" href="css/style.css">
<div id="cta"> 
	<div class="wrapper"> 
	<h3>INSPIRE ME</h3> 
	<p>I’d love to get amazing offers and smart bottle collection !!</p>
	<P>Let's bring on the good vibes !</p>
	<a href="stocks.php" class="button-2">Be First To Know</a> 
	</div> 
</div>



<footer> 

	     <td><span class="footer2"><a href="private_policy.php">PRIVACY POLICY</a></span><span style="margin-left:10px"> <span class="footer2"><a href="http://www.tupperwarebrands.com/" target="_blank">TUPPERWARE BRANDS CORPORATION</a></span></span></td>

		

			    <td align="right" style="padding-right:15px "><span style="color:#e6e6e6;font-size:10px;" class="footer_font_small">Powered by <a href="http://www.mobiweb.com.my" title="Online Business Solution" style="color:#e6e6e6;font-size:10px;text-decoration:none;">Mobiweb</a></span>&nbsp;<span class="footer_font_small">Copyright © 2009-2018 Tupperware Brands Malaysia Sdn. Bhd.</span></td>
		

			<div class="clear"></div>
		   </div>
</footer>
</body> 
</html> 