<?php
session_start();
$idno = $_SESSION['idno'];
//check if user has login
include('check_member.php'); //check if member logged in
require_once 'includes/header_member.php';  //load header content for member page 
include("connection.php"); // connction to database
?>

<div class="container" style="margin-top:50px">
<div class="content">
<h2>Edit Profile Member &raquo;</h2>
<hr />

<!DOCTYPE html>
<html>
<body>

<?php

$query = "SELECT * FROM customer WHERE idno='$idno'";
$result = mysqli_query($connection, $query);
$row = mysqli_fetch_assoc($result);

if(isset($_POST['update'])){ // if button Update clicked
$name = $_POST['name'];
$gender = $_POST['gender'];
$address = $_POST['address'];
$telephone = $_POST['telephone'];
$email = $_POST['email'];
$update = mysqli_query($connection, "UPDATE customer SET name='$name', gender='$gender', address='$address', telephone='$telephone',
email='$email' WHERE idno='$idno' " ); // query for selected ic number

if($update){ // if query executed successfully
	header('Location:member_profile.php');
}else{ // if query unsuccessfull 
	echo '<div class="alert alert-danger alert-dismissable"><button
type="button" class="close" data-dismiss="alert" ariahidden="true">&times;</button>Ups, Cannot add data for new member! 
<a href="member.php"><- Back</a></div>'; // display message data unsuccessfull added!'
}
}
?>
<!-- Form for collecting member data -->
<form class="form-horizontal" action="" method="post">
<div class="form-group">
<label class="col-sm-3 control-label">ID No</label>
<div class="col-sm-2">
<input type="text" name="icno" class="form-control" placeholder="<?php echo $idno; ?>" disabled>
</div>
</div>
<div class="form-group">
<label class="col-sm-3 control-label">Name</label>
<div class="col-sm-4">
<input type="text" name="name" class="form-control" value="<?php echo $row['name'];?>" required>
</div>
</div>
<div class="form-group">
<label class="col-sm-3 control-label">Gender</label>
<div class="col-sm-2">
<select name="gender" class="form-control" required>
<option value="<?php echo $row['gender'];?>"><?php echo $row['gender'];?> </option>
<option value="Male">Male</option>
<option value="Female">Female</option>
</select>
</div>
</div>
<div class="form-group">
<label class="col-sm-3 control-label">Address</label>
<div class="col-sm-3">
<textarea name="address" class="form-control"> <?php echo $row['address'];?></textarea>
</div>
</div>
<div class="form-group">
<label class="col-sm-3 control-label">Telephone No</label>
<div class="col-sm-3">
<input type="text" name="telephone" class="form-control" value="<?php echo $row['telephone'];?>" required>
</div>
</div>
<div class="form-group">
<label class="col-sm-3 control-label">Email</label>
<div class="col-sm-3">
<input type="email" name="email" class="form-control" value="<?php echo $row['email'];?>" required>
</div>
</div>
<div class="form-group"> 
<label class="col-sm-3 control-label">&nbsp;</label> 
<div class="col-sm-6"> 
<input type="submit" name="update" class="btn btn-sm btn-primary" value="Update" data-toggle="tooltip" title="Update member data"> 
<a href="member.php" class="btn btn-sm btn-danger" data-toggle="tooltip" title="Cancel">Cancel</a> 
</div> 
</div> 
</form> <!-- /form --> 
</div> <!-- /.content --> 
</div> <!-- /.container --> 
<script> 
$('.datepicker').datepicker({ 
format: 'dd-mm-yyyy', 
}) 
</script> 
</body> 
</html>