<?php 
session_start();
require_once 'connection.php' ?>
<?php require_once 'includes/header.php'; ?>


<?php

$productID=$_GET['or'];

if(isset($_POST['edit']))
{      
		$productName = mysqli_real_escape_string($connection,$_POST['name']);
		$quantity = mysqli_real_escape_string($connection,$_POST['quantity']);
		$status = mysqli_real_escape_string($connection,$_POST['status']);
		$categories_id = mysqli_real_escape_string($connection,$_POST['category']);
		$product_id = mysqli_real_escape_string($connection,$_POST['id']);
		$productPrice = mysqli_real_escape_string($connection,$_POST['price']);

		$edit = mysqli_query($connection, "UPDATE product SET product_name='$productName', quantity='$quantity', status='$status', categories_id='$categories_id', product_id='$product_id', price='$productPrice' WHERE product_id='$productID'");
		if($edit){ // if delete query successful
			echo '<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Successfully Edit.</div>'; // display message data removed'
		}else{ // if delete query unsuccessful
			echo '<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Cannot Edit.</div>'; // display message cannot remove data'
		}
}

$sql = "SELECT * FROM product WHERE product_id=$productID";
$result = $connection->query($sql);
$row = $result->fetch_array();

?>
<head>
</head>
<body>
		<div class="row">
	<div class="col-md-12">

		<ol class="breadcrumb">
		  <li><a href="admin.php">Home</a></li>		  
		  <li class="active">Edit Product</li>
		</ol>

		<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<i class="glyphicon glyphicon-check"></i>	Edit Product
			</div>
			<!-- /panel-heading -->
			<div class="panel-body">
				
				<form class="form-horizontal" method="post">
				  <div class="form-group">
				    <label for="startDate" class="col-sm-2 control-label">Product Name</label>
				    <div class="col-sm-10">
				      <input type="text" class="form-control" id="startDate" name="name" value="<?php echo $row['product_name'];?>" />
				    </div>
				  </div>
				  <div class="form-group">
				    <label for="startDate" class="col-sm-2 control-label">Product ID</label>
				    <div class="col-sm-10">
				      <input type="text" class="form-control" id="startDate" name="id" value="<?php echo $row['product_id'];?>" />
				    </div>
				  </div>
				  <div class="form-group">
				    <label for="startDate" class="col-sm-2 control-label">Price (RM)</label>
				    <div class="col-sm-10">
				      <input type="text" class="form-control" id="startDate" name="price" value="<?php echo $row['price'];?>" />
				    </div>
				  </div>
				  <div class="form-group">
				    <label for="startDate" class="col-sm-2 control-label">Category</label>
				    <div class="col-sm-10">
				      <input type="text" class="form-control" id="startDate" name="category" value="<?php echo $row['categories_id'];?>" />
				    </div>
				  </div>
				  <div class="form-group">
				    <label for="startDate" class="col-sm-2 control-label">Quantity</label>
				    <div class="col-sm-10">
				      <input type="text" class="form-control" id="startDate" name="quantity" value="<?php echo $row['quantity'];?>" />
				    </div>
				  </div>
				  <div class="form-group">
				    <label for="startDate" class="col-sm-2 control-label">Status</label>
				    <div class="col-sm-10">
				      <input type="text" class="form-control" id="startDate" name="status" value="<?php echo $row['status'];?>" />
				    </div>
				  </div>
				  <div class="form-group">
				    <div class="col-sm-offset-2 col-sm-10">
				      <button type="submit" class="btn btn-success" name="edit"> <i class="glyphicon glyphicon-ok-sign"></i> Update</button>
				    </div>
				  </div>
				</form>
			</div>
			<!-- /panel-body -->
		</div>
	</div>
	<!-- /col-dm-12 -->
</div>
</div>
</div>
</body>