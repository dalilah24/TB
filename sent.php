<?php 
require_once 'includes/header.php';
require_once 'connection.php'; ?>

<head>

<?php
$orderID=$_GET['or'];
if(isset($_POST['sent']))
{ 

		$tracking = mysqli_real_escape_string($connection,$_POST['tracking']);
		
		$sql = "SELECT * FROM orders WHERE order_id = '$orderID'";
		$result = $connection->query($sql);
		$row = $result->fetch_array();

$name = $row['client_name'];
$to = $row['client_contact'];
$status = "Product Shipping";
$subject = "Product Shipping";
$message = "<html><body>";
$message .= "<table width='100%' bgcolor='#e0e0e0' cellpadding='0' cellspacing='0' border='0'>";
$message .= "<tr><td>";
$message .= "<table align='center' width='100%' border='0' cellpadding='0' cellspacing='0' style='max-width:650px; background-color:#fff; font-family:Verdana, Geneva, sans-serif;'>";
$message .= "<thead>
<tr height='80'>
<th style='background-color:#f5f5f5; border-bottom:solid 1px #bdbdbd; font-family:Verdana, Geneva, sans-serif; color:#333; font-size:28px;' >
<img src='/images/download.png' height='100' width='200' /></th>
<th style='background-color:#f5f5f5; border-bottom:solid 1px #bdbdbd; font-family:Verdana, Geneva, sans-serif; color:#333; font-size:28px;' >Tupperware Brand </th>
</tr>
</thead>";
$message .= "<tbody>
<tr align='center' height='50' style='background-color:#00a2d1;'>
<td colspan='4' style='background-color:#00a2d1;'></td>
</tr>
<tr>
<td colspan='4' style='padding:15px;'>
<p style='font-size:20px;'>Hi! ".$row['client_name'].",</p>
<hr />
<p style='font-size:25px;'>Notice Shipping Status</p>
<p style='font-size:15px; font-family:Verdana, Geneva, sans-serif;'>Your product have been sent.</p>
<p style='font-size:15px; font-family:Verdana, Geneva, sans-serif;'>Tracking No.: ".$tracking."</p>
</td>
</tr>
</tbody>";
$message .= "</table>";
$message .= "</td></tr>";
$message .= "</table>";
$message .= "</body></html>";

// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
// More headers
$headers .= 'From: Tupperware Brand Administrator <dalilahsabidi24@gmail.com>' . "\r\n";
$headers .= 'Cc: dalilahsabidi24@gmail.com' . "\r\n";
$mail = mail($to,$subject,$message,$headers);
if(!$mail) {
echo '<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Error sending email !</div>';
} else {
echo '<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Your email was sent successfully..</div>';
$reject = mysqli_query($connection, "UPDATE orders SET order_status=1 WHERE order_id='$orderID'"); // query for removing data
		if($reject){ // if delete query successful
			echo '<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Successfully rejected.</div>'; // display message data removed'
		}else{ // if delete query unsuccessful
			echo '<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Cannot reject.</div>'; // display message cannot remove data'
		}



}
}

?>

<style type="text/css">
	.ui-datepicker-calendar {
		display: none;
	}
</style>

</head>
<body>
		<div class="row">
	<div class="col-md-12">

		<ol class="breadcrumb">
		  <li><a href="admin.php">Home</a></li>		  
		  <li class="active">Send</li>
		</ol>

		<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<i class="glyphicon glyphicon-check"></i>	Send Order
			</div>
			<!-- /panel-heading -->
			<div class="panel-body">
				
				<form class="form-horizontal" method="post">
				  <div class="form-group">
				    <label for="startDate" class="col-sm-2 control-label">Tracking No.</label>
				    <div class="col-sm-10">
				      <input type="text" class="form-control" id="startDate" name="tracking" placeholder="Tracking No." />
				    </div>
				  </div>
				  <div class="form-group">
				    <div class="col-sm-offset-2 col-sm-10">
				      <button type="submit" class="btn btn-success" name="sent"> <i class="glyphicon glyphicon-ok-sign"></i> Send</button>
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