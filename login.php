<?php session_start(); 
 
$error='';  
include "connection.php"; 
if(isset($_POST['submit']))
{      
		$idno = mysqli_real_escape_string($connection,$_POST['idno']);   
		$password = mysqli_real_escape_string($connection,$_POST['password']);
		$sql      = "SELECT * FROM user WHERE idno='$idno' and password='$password'";  
		$query    = mysqli_query($connection,$sql);  
		$row      = $query->fetch_array();  
		$count    = $query->num_rows; // if email/password are correct returns must be 1 row 
 
		 if ($count == 1)   
		 {   
		 		$_SESSION['idno']=$row['idno'];   
		 		$_SESSION['level'] = $row['level'];   
		 		$_SESSION['idcno'] = $row['idno'];   
		 		if($row['level'] == "Admin")   
		 		{      
		 				header("Location: admin.php");   
		 			}   
		 			else if($row['level'] == "Member") 
  					{   
   					header("Location: member.php");   
   					}   
   					else   
   					{    
   						$msg = "<div class='alert alert-danger'>      
   						<span class='glyphicon glyphicon-info-sign'></span> &nbsp;
   						Login failed - Incorrect user level!     
   				</div>";   
   						}  
   				}	  
   				else  
   				{   
   						$msg = "<div class='alert alert-danger'>   
   						<span class='glyphicon glyphicon-info-sign'></span> &nbsp; 
   						Username or Password is invalid !    </div>";  
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
	<title>Login</title> 
	<link rel="stylesheet" 
	href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
	<link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css"> 
	<link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css"> 
	<link rel="stylesheet" href="assets/css/form-elements.css"> 
	<link rel="stylesheet" href="assets/css/style.css"> 
 
</head> 

	<body background="assets/img/whie.jpg">
<!-- Top content --> 
<body>
<div class="top-content">   
<div class="inner-bg">    
<div class="container">     
<div class="row">      
<div class="col-sm-6 col-sm-offset-3 form-box">       
<div class="form-top">        
<div class="form-top-left">   
<img src="images/download.png" height=100 width=300>
<p>Enter your ID and Password :</p> 
</div> 
<div class="form-top-right"> 
<i class="fa fa-key"></i> 
</div> 
</div> 
 <div class="form-bottom">
 <form role="form" action="" method="post" class="login-form"> 

<?php if (isset($msg)) {  echo $msg; 
} 
?> 
 
<div class="form-group"> 
<label class="sr-only" for="form-idno">User ID</label> 
<input type="text" name="idno" placeholder="Your ID..." class="form-idno form-control" id="form-idno"> 
</div>
<div class="form-group"> 
<label class="sr-only" for="form-password">Password</label>
<input type="password" name="password" placeholder="Password..." class="formpassword form-control" id="form-password"> </div> 
<button type="submit" name="submit" class="btn">Sign in!</button> 
</form>   
						</div>  
					</div>      
				</div>    
			</div>   
		</div> 

 <footer> 

	     <td><span class="footer2" style="padding-left:15px "><a href="private_policy.php">PRIVACY POLICY</a></span><span style="margin-left:10px"> <span class="footer2"><a href="http://www.tupperwarebrands.com/" target="_blank">TUPPERWARE BRANDS CORPORATION</a></span></span></td>

		

			    <td align="right" style="padding-right:15px "><span style="color:#e6e6e6;font-size:10px;" class="footer_font_small">Powered by <a href="http://www.mobiweb.com.my" title="Online Business Solution" style="color:#e6e6e6;font-size:10px;text-decoration:none;">Mobiweb</a></span>&nbsp;<span class="footer_font_small">Copyright © 2009-2018 Tupperware Brands Malaysia Sdn. Bhd.</span></td>
		

			<div class="clear"></div>
		   </div>
</footer>

</body> 
</html>