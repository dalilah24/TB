<?php
session_start();
$idno = $_SESSION['idno']; 
include('check_member.php');
 //check if member logged in 
require_once 'includes/header_member.php';  //load header content for member page 
include("connection.php"); // connction to database 
?>

<div class="container" style="margin-top:50px"> 
<div class="content"> 
</br><h2>Your Details &raquo;</h2> 
<hr />
<!DOCTYPE html>
<html>
<body> 

<?php
	
	$check = mysqli_query($connection, "SELECT * FROM customer WHERE idno='$idno'"); // query for selected id number 
	if(mysqli_num_rows($check) == 0){ // check if id number do not exist in database 
	
	echo " Please insert the infomation below";
	}
	
	else{
		$row = mysqli_fetch_assoc($check);
	}
?>
<!-- Display member details -->
<center><img src="assets/img/g1.jpg" width="400" height="200"></br></br>
<table class="table table-striped table-condensed">
<tr>
<th>Full Name</th>
<td><?php echo $row['name']; ?></td>
</tr>
<tr>
<th>Gender</th>
<td><?php echo $row['gender']; ?></td>
</tr>

<tr>
<th>Address</th>
<td><?php echo $row['address']; ?></td>
</tr>
<tr>
<th>Telephone</th>
<td><?php echo $row['telephone']; ?></td>
</tr>
<tr>
<th>Email</th>
<td><?php echo $row['email']; ?></td>
</tr>

</table>
<a href="member.php" class="btn btn-sm btn-primary" data-toggle="tooltip" title="Back">Back</a> 
<a href="edit_member.php" class="btn btn-sm btn-danger" data-toggle="tooltip">Update Data</a> 

<br/><br/>
</center>
</body>
</html>