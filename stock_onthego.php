<?php 
include('header_stocks.php'); 
?> 
<?php require_once 'connection.php' ?>
<!-- Content start here --> 
<link rel="stylesheet" type="text/css" href="css/style.css">
<div class="container" style="margin-top:50px"> 

	<table width="980" border="0" align="center" cellpadding="0" cellspacing="0">

	<tr>

		<td valign="top" class="left_tbl_border"><table width="190" border="0" cellpadding="0" cellspacing="0">

  <body>

    <tr>

      <td style="padding-left: 20px;" width="190" height="26"><a href="stocks.php" class="title_menu" style="text-decoration:none;">OUR STOCK</a></td>

    </tr>

	<tr>

	  <td valign="top">

		<div class="arrowlistmenu">

			
			<h3 class="openheader"><a href="tupperware.php">TUPPERWARE</a></h3>
			<hr>
		<table style="margin-left: 30px;" class="menu_bar">

					<tr>


						<td valign="top" style="padding-top: 6px;"><img src="images/nutrimetics/menu_bullet.gif" width="4" height="4" /></td>

						<td colspan="2" style="padding-left: 3px;"><a href="on_the_go.php">ON THE GO</a></td>

					</tr>	
<tr>

						<td valign="top" style="padding-top: 6px;"><img src="images/nutrimetics/menu_bullet.gif" width="4" height="4" /></td>

						<td colspan="2" style="padding-left: 3px;"><a href="outdoor_storage.php">OUTDOOR STORAGE</a></td>

					</tr>

					<tr>

						<td valign="top" style="padding-top: 6px;"><img src="images/nutrimetics/menu_bullet.gif" width="4" height="4" /></td>

						<td colspan="2" style="padding-left: 3px;"><a href="kitchen_storage.php">KITCHEN STORAGE</a></td>

					</tr>

					<tr>

						<td valign="top" style="padding-top: 6px;"><img src="images/nutrimetics/menu_bullet.gif" width="4" height="4" /></td>

						<td colspan="2" style="padding-left: 3px;"><a href="fridge_freezer.php">FRIDGE & FREEZER</a></td>

					</tr>

					
					<tr>

						<td valign="top" style="padding-top: 6px;"><img src="images/nutrimetics/menu_bullet.gif" width="4" height="4" /></td>

						<td colspan="2" style="padding-left: 3px;"><a href="preparation.php">KITCHEN ESSENTIALS</a></td>

			 		</tr>


				</table></div>

	</td>

  </tr>


  <tr>

      <td style="padding-left: 10px;">&nbsp;</td>

    </tr>

  </tbody>

</table>



</td>

		<td width="787" valign="top">

		<table width="766" border="0" cellpadding="0" cellspacing="0">

			<tbody>

			<tr>

				<td width="14" height="26" style="padding-left:10px;">&nbsp;</td>

				<td width="752" class="path_line">

						<span class="head_path_list"><a href="index.php">Home</a></span>

						<span class="path_arrow" style="margin-left:10px; margin-right:10px ">&gt;</span><span  class="head_path_list"><a href="stocks.php">Stocks</a></span>
						
						<span class="path_arrow" style="margin-left:10px; margin-right:10px ">&gt;</span><span class="path_list_highlight">On the go items<span>
							
						</span>

						<span class="input-group-btn" align="right">
	                	<button type="button" class="input-group-addon btn btn-info">Search</button>
	              	</span>


				</span></span></td>

			</tr>
			<table class="table" id="manageProductTable">
					<thead>
						<tr>
							<th style="width:10%;">Photo</th>							
							<th>Product Name</th>
							<th>Product ID</th>
							<th>Price</th>								
							<th>Quantity</th>
							<th>Category</th>
							<th>Status</th>
							<th style="width:15%;">Option</th>
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
									echo "<th>".$row['product_price']."</th>";
									echo "<th>".$row['categories_id']."</th>";
									echo "<th>".$row['quantity']."</th>";
									echo "<th>".$row['status']."</th></tr>";
								} // while
				      	?>
				</table>
				</div>

					
