<?php 
session_start();
require_once 'connection.php' ?>
<?php require_once 'includes/header.php'; ?>


<?php

if(isset($_GET['act'])){

$productID=$_GET['or'];
$query = "DELETE FROM product WHERE product_id=$productID;";

$del = mysqli_query($connection, $query); // query for removing data
		if($del){ // if delete query successful
			echo '<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Successfully Delete.</div>'; // display message data removed'
		}else{ // if delete query unsuccessful
			echo '<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Cannot Delete.</div>'; // display message cannot remove data'
		}
}

?>

<?php
if(isset($_POST['add']))
{      
		
		$productName = mysqli_real_escape_string($connection,$_POST['productName']);
		$quantity = mysqli_real_escape_string($connection,$_POST['quantity']);
		$status = mysqli_real_escape_string($connection,$_POST['status']);
		$categories_id = mysqli_real_escape_string($connection,$_POST['categories_id']);
		$product_id = mysqli_real_escape_string($connection,$_POST['product_id']);
		$productPrice = mysqli_real_escape_string($connection,$_POST['productPrice']);

		$query = "INSERT INTO product(product_name,quantity,status,categories_id,product_id,price) VALUES 
		('$productName','$quantity','$status','$categories_id','$product_id','$productPrice')";
		{

			$file_full=$_FILES['pic'];
			$full_name=$file_full['name'];
			$full_tmp=$file_full['tmp_name'];
			$full_size=$file_full['size'];
			$full_ext=explode('.',$full_name);
			$full_ext=strtolower(end($full_ext));
			echo "3";

			if(($full_ext == 'jpg' || $full_ext == 'png' || $full_ext == "gif" || $full_ext == "jpeg"))
			{
				if ($full_size <=1000000)
				{
					$file_destination_full="assets/img/product/".$productName.".".$full_ext;
					if ((move_uploaded_file($full_tmp,$file_destination_full)))
					{	
						$sql = mysqli_query($connection,$query);
	   					$update_query=mysqli_query($connection,"UPDATE product SET `product_image`='$file_destination_full' WHERE product_id='$product_id'");
	 					header("Location: product.php");
	 				}
					else
					{
						echo "<script language=javascript>
          				alert ('Upload Failed!Server Error!');
          				window.location.href='product.php';
          				</script> ";
					}
				}
				else
				{
    				echo "<script language=javascript>
    				alert ('File too large!');
    				window.location.href='product.php';
    				</script> ";
				}
			}	
			else
			{
				echo "<script language=javascript>
    			alert ('Format file not supported!');
    			window.location.href='product.php';
    			</script> ";
			}
		}
}
?>

<div class="row">
	<div class="col-md-12">

		<ol class="breadcrumb">
		  <li><a href="admin.php">Home</a></li>		  
		  <li class="active">Product</li>
		</ol>

		<div class="panel panel-default">
			<div class="panel-heading">
				<div class="page-heading"> <i class="glyphicon glyphicon-edit"></i> Manage Product</div>
			</div> <!-- /panel-heading -->
			<div class="panel-body">

				<div class="remove-messages"></div>

				<div class="div-action pull pull-right" style="padding-bottom:20px;">
					<button class="btn btn-default button1" data-toggle="modal" id="addProductModalBtn" data-target="#addProductModal"> <i class="glyphicon glyphicon-plus-sign"></i> Add Product </button>
				</div> <!-- /div-action -->				
				
				<table class="table" id="manageProductTable">
					<thead>
						<tr>
							<th style="width:10%;">Photo</th>							
							<th>Product Name</th>
							<th>Product ID</th>
							<th>Price (RM)</th>								
							<th>Category</th>
							<th>Quantity</th>
							<th>Status</th>
							<th>Option</th>
						</tr>
					</thead>
					<?php 
				      		$sql = "SELECT * FROM product";
								$result = $connection->query($sql);

								while($row = $result->fetch_array()) {
									$n=$row['product_name'];//getting info from upload_db for image info
								$select_upload=mysqli_query($connection,"SELECT product_image FROM product WHERE product_name='$n' ");
								$row2=mysqli_fetch_array($select_upload);
								?>								
								<tr>
									<th>
									<a href="#" class="thumbnail"><img src="<?php echo $row2['product_image']?>" alt=''></a>
									</th>
									<?php
									echo "<th>".$row['product_name']."</th>";
									echo "<th>".$row['product_id']."</th>";
									echo "<th>".$row['price']."</th>";
									echo "<th>".$row['categories_id']."</th>";
									echo "<th>".$row['quantity']."</th>";
									echo "<th>".$row['status']."</th>";
									?>
									<th><a href="product.php?act=del<?php echo "&or=".$row['product_id'];?>"><button class="btn btn-danger">Delete</button></a>&nbsp;<a href="editproduct.php?or=<?php echo $row['product_id'];?>"><button class="btn btn-info">Edit</button></a></th>
									<?php
									echo "</tr>";
								} // while
				      	?>
				</table>
				<!-- /table -->
			</div> <!-- /panel-body -->
		</div> <!-- /panel -->		
	</div> <!-- /col-md-12 -->
</div> <!-- /row -->


<!-- add product -->
<div class="modal fade" id="addProductModal" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
    	<form class="form-horizontal" action="" method="POST" enctype="multipart/form-data">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title"><i class="fa fa-plus"></i> Add Product</h4>
	      </div>

	      <div class="modal-body" style="max-height:450px; overflow:auto;">

	      	<div id="add-product-messages"></div>

	      	<div class="form-group">
	        	<label for="productImage" class="col-sm-3 control-label">Product Image: </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
					    <!-- the avatar markup -->
							<div id="kv-avatar-errors-1" class="center-block" style="display:none;"></div>							
					    <div class="kv-avatar center-block">					        
					        <input type="file" class="form-control" id="productImage" name="pic" class="file-loading" style="width:auto;"/>
					    </div>
				      
				    </div>
	        </div> <!-- /form-group-->	     	           	       

	        <div class="form-group">
	        	<label for="productName" class="col-sm-3 control-label">Product Name: </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
				      <input type="text" class="form-control" id="productName" placeholder="Product Name" name="productName" autocomplete="off">
				    </div>
	        </div> <!-- /form-group-->	

	          <div class="form-group">
	        	<label for="rate" class="col-sm-3 control-label">Product ID: </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
				      <input type="text" class="form-control" id="product_id" placeholder="Product Id" name="product_id" autocomplete="off">
				    </div>
	        </div> <!-- /form-group-->	     	        
	        

	        <div class="form-group">
	        	<label for="productPrice" class="col-sm-3 control-label">Price(RM): </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
				      <input type="text" class="form-control" id="productPrice" placeholder="Price" name="productPrice" autocomplete="off">
				    </div>
	        </div> <!-- /form-group-->  

	        <div class="form-group">
	        	<label for="quantity" class="col-sm-3 control-label">Quantity: </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
				      <input type="text" class="form-control" id="quantity" placeholder="Quantity" name="quantity" autocomplete="off">
				    </div>
	        </div> <!-- /form-group-->	


	        <div class="form-group">
	        	<label for="rate" class="col-sm-3 control-label">Category: </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
				      <select class="form-control" id="rate" name="rate">
				      	<option value="">~~SELECT~~</option>
				      	<option value="1">On the go</option>
				      	<option value="2">Outdoor Storage</option>
				      	<option value="3">fREEDGE $ FREEZER</option>
				      	<option value="4">kITCHEN eSSENTIAL</option>
				      </select>
				    </div> 
				   </div> <!-- /form-group-->	        	 

	     
	        <div class="form-group">
	        	<label for="productStatus" class="col-sm-3 control-label">Status: </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
				      <select class="form-control" id="productStatus" name="productStatus">
				      	<option value="">~~SELECT~~</option>
				      	<option value="1">Available</option>
				      	<option value="2">Not Available</option>
				      </select>
				    </div>
	        </div> <!-- /form-group-->	   

	      <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal"> <i class="glyphicon glyphicon-remove-sign"></i> Close</button>
	        
	        <button type="submit" class="btn btn-primary" name="add"> <i class="glyphicon glyphicon-ok-sign"></i> Save Changes</button>
	      </div> <!-- /modal-footer -->	      
     	</form> <!-- /.form -->	     
    </div> <!-- /modal-content -->    
  </div> <!-- /modal-dailog -->
</div> 
<!-- /add categories -->


<?php require_once 'includes/footer.php'; ?>