<?php

		require_once('../data/dbconnector.php');
		require_once "../service/user_service.php";
		require_once "../service/product_service.php";
		session_start();

		if(isset($_GET['pid']))
		{
			$products=getProductUsingId($_GET['pid']);
			$_SESSION['cart'][]=$products;
		}




?>
<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<title>E-Commerse</title>
</head>
<body>
	<header>
			<fieldset>
				<center><a href="index.php"><h1>Kinbo.com</h1></a>

				<h3>Welcome</h3></center>
				<table width="100%">
					<tr>
						<td align="center"><a href="slider.php">Home</a></td>
						<td align="center"><a href="index.php">Products</a></td>
						<td align="center"><a href="">About</a></td>
						<td align="center"><a href="">Contact </a></td>
						<td align="center"><a href="cart.php">Cart </a></td>
						<td align="center"><a href="login.php">Login</a></td>
					</tr>
				</table></br></br></br></br></br></br>


	</header>

	<div id="cart">
		<?php
			echo '<center><table border="1px" width=50%>
						<tr >
								<td >ID</td>
								<td >Title</td>
								<td >Price</td>
								<td >Quantity</td>
							</tr>';
			if(isset($_SESSION['cart']))
			{
				$total_price=0;
				$q=0;
				for($i=0;$i<count($_SESSION['cart']);$i++)
				{
					$total_price = $total_price + $_SESSION['cart'][$i]['price'];
					$q++;
					echo ' <tr >
									<td >'.$_SESSION['cart'][$i]['id'].'</td>
									<td >'.$_SESSION['cart'][$i]['title'].'</td>
									<td >'.$_SESSION['cart'][$i]['price'].'</td>
									<td >1</td>
							</tr>';

				}
				echo ' <tr >
							<td ></td>
							<td >Total</td>
							<td >'.$total_price.'</td>
							<td >'.$q.'</td>
					</tr>';
				echo '</table></center>';
				$_SESSION['total_price']=$total_price;
				$_SESSION['quantity']=$q;

			}



		?>
		<center></br></br><a href="order.php" ">Place Order</a></center>
	</div>
	// <?php
		// require_once "userLeftMenu.php";
	// ?>

</fieldset>
	</body>
</html>