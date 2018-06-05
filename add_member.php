<?php 
session_start(); 
$icno = $_SESSION['icno']; 
 
//check if user has login 
include('member.php'); //check if member logged in 
include('header_member.php'); //load header content for member page 
include("connection.php"); // connction to database 
?>
<div class="container" style="margin-top:50px"> 
<div class="content"> 
<h2>Add Member Data  &raquo;</h2>
 <hr />     

 <?php //Default status and position    
 $status   = 'Inactive'; 
 $position = 'Member';     

 if(isset($_POST['add'])){ // if button Add clicked  
 $name  = $_POST['name'];  
 $gender = $_POST['gender'];  
 $dob  = $_POST['dob'];  
 $address = $_POST['address'];  
 $telephone = $_POST['telephone']; 
 $email  = $_POST['email'];  
 $class  = $_POST['class'];      
 
 $check = mysqli_query($connection, "SELECT * FROM student WHERE 
 icno='$icno'"); // query for selected ic number 

if(mysqli_num_rows($check) == 0){ // check if ic number do not exist in database  
$insert = mysqli_query($connection, "INSERT INTO student(icno, name, 
gender, dob, address, telephone, email, class, status, position) 
VALUES('$icno','$name', '$gender', '$dob', '$address', '$telephone', 
 '$email', '$class', '$status', '$position')") or die(mysqli_error()); // 
 query for adding data into database  

 if($insert){ // if query executed successfully   
 	echo '<div class="alert alert-success alert-
	 dismissable"><button type="button" class="close" data-dismiss="alert" ariahidden="true">&times;</button>Data for new member added.. <a href="member.php"><- Back</a></div>'; // display message data saved successfully.'  
		}else{ // if query unsuccessfull   
			echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" ariahidden="true">&times;</button>Ups, Cannot add data for new member! <a 
			href="member.php"><- Back</a></div>'; // display message data unsuccessfull added!'  
		} 
		}else{ // if ic number exist in database 
			 echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" ariahidden="true">&times;</button>IC Number already exist! You are registered member<a 
			 	href="member.php"><- Back</a></div>'; // display message ic number already exist..!' 
			 	}
			 	} ?> 
<!-- Form for collecting member data --> 
<form class="form-horizontal" action="" method="post"> 
 
<div class="form-group"> 
<label class="col-sm-3 control-label">IC No</label> 
<div class="col-sm-2"> 
<input type="text" name="icno" class="form-control" placeholder="<?php 
echo $icno; ?>" disabled> 
</div> </div> 
 
<div class="form-group"> 
<label class="col-sm-3 control-label">Name</label> 
<div class="col-sm-4"> 
<input type="text" name="name" class="form-control" placeholder="Name" required> </div> </div> 
 
<div class="form-group"> 
<label class="col-sm-3 control-label">Gender</label>
<div class="col-sm-2"> 
<select name="gender" class="form-control" required> 
<option value=""> - Select Gender - </option>  
<option value="Male">Male</option>  
<option value="Female">Female</option> 
</select> </div> </div> 

 
<div class="form-group"> 
<label class="col-sm-3 control-label">Date of Birth</label> 
<div class="col-sm-3"> 
<input type="text" name="dob" class="input-group datepicker form-control" date="" data-date-format="dd-mm-yyyy" placeholder="dd-mm-yyyy" required> </div> </div> 
 
<div class="form-group"> 
<label class="col-sm-3 control-label">Address</label> 
<div class="col-sm-3">
<textarea name="address" class="form-control" placeholder="Address"></textarea> 
</div> </div> 
 
<div class="form-group">
<label class="col-sm-3 control-label">Telephone No</label>
<div class="col-sm-3"> 
<input type="text" name="telephone" class="form-control" placeholder="Telephone No" required> </div> </div> 
 
<div class="form-group"> 
<label class="col-sm-3 control-label">Email</label> 
<div class="col-sm-3"> 
<input type="email" name="email" class="form-control" placeholder="Email" required> </div> </div> 
 
<div class="form-group"> 
<label class="col-sm-3 control-label">Class</label> 
<div class="col-sm-2"> 
<select name="class" class="form-control" required>  
<option value=""> - Select Class - </option>  
<option value="Form 1">Form 1</option>  
<option value="Form 2">Form 2</option>  
<option value="Form 3">Form 3</option>  
<option value="Form 4">Form 4</option> 
<option value="Form 5">Form 5</option> 
</select> </div> </div> 
 
<div class="form-group"> 
<label class="col-sm-3 control-label">&nbsp;</label>
 <div class="col-sm-6"> <input type="submit" name="add" class="btn btn-sm btn-primary" value="Save" data-toggle="tooltip" title="Save member data"> 
 <a href="member.php" class="btn btn-sm btn-danger" data-toggle="tooltip" title="Cancel">Cancel</a> 
</div> </div> </form>
</div>
</div> 
<script>  
$('.datepicker').datepicker({   format: 'dd-mm-yyyy',  
})  
</script> </body> </html> 