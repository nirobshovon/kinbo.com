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
		require_once "../service/orderDetails_service.php";





		if(isset($_GET['pid']))
		{
			$products=getProductUsingId($_GET['pid']);
			$_SESSION['cart'][]=$products;
		}

		if($_SERVER['REQUEST_METHOD']== "POST"){
			$result=addOrder($_SESSION['id'], $_POST['shipadd'], $_SESSION['total_price'],$_POST['phn_num']);
			if($result)
			{
				echo'<script>
						alert("Order Placed Successfully!!");
					</script>';

				for($i=0;$i<count($_SESSION['cart']);$i++)
				{
					$result2=addOrderDetails($_SESSION['cart'][$i]['id'],$_SESSION['cart'][$i]['price'],1,$_SESSION['cart'][$i]['price']);
				}
				unset($_SESSION['cart']);
				header("location: index.php");

			}
		}



?>
<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<title>E-Commerse</title>
</head>
<body>
	<fieldset>
<center>
				<a href="index.php"><h1>Kinbo.com</h1></a>

				<h3>Welcome &nbsp<?php echo $_SESSION['name'];?></h3></br>
	</center>

			<form method="POST">
				<center>
					Phone Number&nbsp&nbsp<input type="Text" name="phn_num" placeholder="Enter Contact Number" value="<?php if (isset($_POST['phn_num'])) { echo $_POST['phn_num']; } ?>" required/></br></br>
					Shipping Address &nbsp&nbsp<input type="text" placeholder="Enter Shipping Address" name="shipadd" value="<?php if (isset($_POST['shipadd'])) { echo $_POST['shipadd']; } ?>" required/></br>


				</br><input type="submit" value="Confirm Order" name="order_btn" id="order_btn" />

				</center>
			</form>

</fieldset>
	</body>
</html>
