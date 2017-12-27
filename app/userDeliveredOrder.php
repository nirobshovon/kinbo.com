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
		$orders=findOrderUsingStatus2("delivered",$_SESSION['id']);



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

				<li>Orders
				<ul>
					<li><a href="userPendingOrder.php">Pending Orders</a></li>
					<li><a href="userDeliveredOrder.php">Delivered Orders</a></li>
				</ul>
			</br></br><li><a href="cart.php" ><input type="button" value="Cart"/></a></li>
		</br></br>	<li><a href="slider.php"><input type="button" value="Logout"/></a></li>
			</ul>
		</div>
		</td>
		<td>


			<?php
				echo '<center><table border="1px" >
						<tr >
								<td>Order Id</td>
								<td>Customer Id</td>
								<td>Customer Address</td>
								<td>Total Amount</td>
								<td>Shipping Date</td>
								<td>Status</td>

							</tr>';
				foreach($orders as $row)
				{
					echo ' <tr >
								<td>'.$row['id'].'</td>
								<td>'.$row['customer_id'].'</td>
								<td>'.$row['customer_address'].'</td>
								<td>'.$row['order_amount'].'</td>
								<td>'.$row['shipping_date'].'</td>
								<td>'.$row['delivery_status'].'</td>

							</tr>';
				}
				echo '</table></center>';

			?>




	</div>


</body>
</html>
