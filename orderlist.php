<?php 
require_once 'includes/header.php';
require_once 'connection.php'; ?>

<head>

<style type="text/css">
	.ui-datepicker-calendar {
		display: none;
	}
</style>


<?php

if(isset($_GET['act'])){

$orderID=$_GET['or'];
$query = "DELETE FROM orders WHERE order_id=$orderID;";

$del = mysqli_query($connection, $query); // query for removing data
		if($del){ // if delete query successful
			echo '<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Successfully Delete.</div>'; // display message data removed'
		}else{ // if delete query unsuccessful
			echo '<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Cannot Delete.</div>'; // display message cannot remove data'
		}
}

?>

</head>
<body>
	<div class="row">
	<div class="col-md-12">

		<ol class="breadcrumb">
		  <li><a href="admin.php">Home</a></li>		  
		  <li class="active">Orders</li>
		</ol>

		<div class="panel panel-default">
			<div class="panel-heading">
				<div class="page-heading"> <i class="glyphicon glyphicon-edit"></i> Manage Orders</div>
			</div> <!-- /panel-heading -->
			<div class="panel-body">

				<div class="remove-messages"></div>
 <!-- /div-action -->				
				<table class="table" id="manageProductTable">
					<thead>
						<tr>
							<th>Order ID</th>							
							<th>Order Date</th>
							<th>Client Name</th>
							<th>Client Contact</th>								
							<th>Amount</th>
							<th>Payment Type</th>
							<th>Payment Status</th>
							<th>Order Status</th>
							<th style="width:15%;">Option</th>
						</tr>
					</thead>
					<?php 
				      		$sql = "SELECT * FROM orders";
								$result = $connection->query($sql);

								while($row = $result->fetch_array()) {
								?>								
								<tr>
									<?php
									echo "<th>".$row['order_id']."</th>";
									echo "<th>".$row['order_date']."</th>";
									echo "<th>".$row['client_name']."</th>";
									echo "<th>".$row['client_contact']."</th>";
									echo "<th>".$row['total_amount']."</th>";
									echo "<th>".$row['payment_type']."</th>";
									echo "<th>".$row['payment_status']."</th>";
									echo "<th>".$row['order_status']."</th><th>";
									if($row['order_status']==0){
									echo "<a href='sent.php?or=".$row['order_id']."'><button class='btn btn-primary'>Sent</button></a>&nbsp;";
									}
									?>
										<a href="orderlist.php?act=del<?php echo $row['order_id']."&or=".$row['order_id'];?>"><button class="btn btn-danger">Delete</button></a></th>
									<?php
									echo "</tr>";
								} // while
				      	?>
				</table>
				<!-- /table -->
			</div> <!-- /panel-body -->
		</div> <!-- /panel -->		
	</div> <!-- /col-md-12 -->
</div> 
</body>