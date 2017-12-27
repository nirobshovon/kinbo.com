<?php

		session_start();
		if(!isset($_SESSION['email']))
		{
			header("location: login.php");
		}
		require_once('../data/dbconnector.php');
		require_once "../service/user_service.php";
		require_once "../service/product_service.php";
		require_once "../service/order_service.php";
		$orders=findOrderUsingStatus("pending");



?>
<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<title>E-Commerse</title>
</head>
<body>
	<table border="2" width="100%">
	<tr>
	<body>

		<th colspan="2">
			<div >
					<h3>Welcome</h3>
					<h3><?php echo $_SESSION['name'];?></h3>
			</div>
				</th>
		</tr>

		<div >
			<ul>
				<tr>
					<td>
						<h3>Dashboard</h3>
							<li>Products
					<ul>
						<li><a href="addProduct.php">Add Product</a></li>
						<li><a href="deleteProduct.php">Delete Product</a></li>
						<li><a href="updateProduct.php">Update Proudct</a></li>
					</ul>
							</li>
				<li>Category
					<ul>
						<li><a href="addCategory.php">Add Category</a></li>
						<li><a href="#">Delete Category</a></li>
						<li><a href="#">Update Category</a></li>
					</ul>
				</li>
				<li>Orders
				<ul>
					<li><a href="adminPendingOrder.php">Pending Orders</a></li>
					<li><a href="adminDeliveredOrder.php">Delivered Orders</a></li>
				</ul>
				<li><a href="logout.php"><input type="button" value="Logout"/></a></li></br>
			</ul>
		</div>
		</td>
		<td>





			<?php
				echo '<center><table border="1px">
						<tr >
								<td >Order Id</td>
								<td >Customer Id</td>
								<td >Phone Number</td>
								<td >Customer Address</td>
								<td >Total Amount</td>
								<td >Shipping Date</td>
								<td >Status</td>
								<td ></td>
							</tr>';
				foreach($orders as $row)
				{
					echo ' <tr >
								<td>'.$row['id'].'</td>
								<td>'.$row['customer_id'].'</td>
								<td>'.$row['phn_num'].'</td>
								<td>'.$row['customer_address'].'</td>
								<td>'.$row['order_amount'].'</td>
								<td>'.$row['shipping_date'].'</td>
								<td>'.$row['delivery_status'].'</td>
								<td> <a href="deliver.php?id='.$row['id'].'">Deliver</a></td>
							</tr>';
				}
				echo '</table></center>';

			?>






</body>
</html>
