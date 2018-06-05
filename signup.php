<?php 
session_start(); 
 
if($_SESSION){  
			if($_SESSION['level']=="Administrator")  
			{   
				header("Location: admin.php");  
			} 
			if($_SESSION['level']=="Member")  
			{  
				 header("Location: member.php");  
			} 
		} 
		require_once 'connection.php'; 
 
		if(isset($_POST['btn-signup'])) { 
 
$idno=mysqli_real_escape_string($connection,$_POST['idno']);  
$username=mysqli_real_escape_string($connection,$_POST['username']);  
$password=mysqli_real_escape_string($connection,$_POST['password']); // Encrypted Password 
$level = "Member"; 
 
$check_idno = $connection->query("SELECT idno FROM user WHERE idno='$idno'"); 
$countic = $check_idno->num_rows; 
 
$check_username = $connection->query("SELECT username FROM user WHERE 
username='$username'"); 
$countun = $check_username->num_rows;   
if (($countic==0) && ($countun==0)){  
	$query = "INSERT INTO user(username,password,level,idno) VALUES 
('$username','$password','$level','$idno')";
	$query2 = "INSERT INTO customer(idno) VALUES 
	('$idno')";
	if (($connection->query($query))&& ($connection->query($query2))) {  
		$msg = "<div class='alert alert-success'>  
		<span class='glyphicon glyphicon-info-sign'></span> &nbsp; Successfully registered - Now you're the members of Tupperware Brands !   
				</div>";  
			} else {  
			$msg = "<div class='alert alert-danger'> 
			<span class='glyphicon glyphicon-info-sign'></span> &nbsp; Error while registering ! 
  			</div>";  
  		}   
  		} else {  
  				 $msg = "<div class='alert alert-danger'>   <span class='glyphicon glyphicon-info-sign'></span> &nbsp; Sorry.. 
  				 Username or ID Number already exist!    
  				</div>";  
  			}    
  		$connection->close(); 
  	} 
 
?> 
<!DOCTYPE html> 
<html lang="en"> 
<head> 
<meta charset="utf-8"> 
<meta http-equiv="X-UA-Compatible" content="IE=edge"> 
<meta name="viewport" content="width=device-width, initial-scale=1"> 
<title>Sign Up</title> 
<link rel="stylesheet" 
href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500"> 
<link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css"> 
<link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css"> 
<link rel="stylesheet" href="assets/css/form-elements.css"> 
<link rel="stylesheet" href="assets/css/style.css"> 

 </head>
<body background="assets/img/whie.jpg"> 
        
 <div class="top-content">          
 <div class="inner-bg">                 
 <div class="container">                    
 <div class="row">                         
 <div class="col-sm-6 col-sm-offset-3 form-box">                          
 <div class="form-top">                           
 <div class="form-top-left">                           
<img src="images/download.png" height=100 width=300>        
 <h4>Sign-Up Now !! Members will get 20% discount</h4>                          
 </div>                           
 <div class="form-top-right">                            
 <i class="fa fa-key"></i>                           
 </div>                             
 </div>                             
 <div class="form-bottom"> 

 <form role="form" class="login-form" method="post" id="register-form"> 
 <?php  
 		if (isset($msg)) {   
 			echo $msg;  
 		} 
 ?> 
 <div class="form-group"> 
 <input type="text" class="form-control" placeholder="ID Number" name="idno" required  /> </div>             
 <div class="form-group"> 
 <input type="text" class="form-control" placeholder="Username" name="username" required  /> </div> 
 <div class="form-group"> 	
 <input type="password" class="form-control" placeholder="Password" name="password" required  /> </div>          
 <div class="form-group"> 
 <button type="submit" class="btn btn-default" name="btn-signup">  <span class="glyphicon glyphicon-log-in"></span> &nbsp; Create Account 
 </button> 
 <hr /> 
 <a href="login.php" class="btn btn-default">Log In Here</a> 
</div>  
</form> 
</div> </div> </div> </div> </div> </div>    

<footer> 

	     <td><span class="footer2" style="padding-left:15px "><a href="private_policy.php">PRIVACY POLICY</a></span><span style="margin-left:10px"> <span class="footer2"><a href="http://www.tupperwarebrands.com/" target="_blank">TUPPERWARE BRANDS CORPORATION</a></span></span></td>

		

			    <td align="right" style="padding-right:15px "><span style="color:#e6e6e6;font-size:10px;" class="footer_font_small">Powered by <a href="http://www.mobiweb.com.my" title="Online Business Solution" style="color:#e6e6e6;font-size:10px;text-decoration:none;">Mobiweb</a></span>&nbsp;<span class="footer_font_small">Copyright © 2009-2018 Tupperware Brands Malaysia Sdn. Bhd.</span></td>
		

			<div class="clear"></div>
		   </div>
</footer>
</body> 
</html> 