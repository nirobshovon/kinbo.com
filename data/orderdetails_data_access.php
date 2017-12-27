<?php require_once "dbconnector.php"; ?>
<?php
	function addNewOrderDetails($pro_id, $price,$quantity,$amount)
	{
		$query="INSERT INTO `order_details`(`order_id`, `product_id`, `price`, `quantity`, `total_price`) VALUES ((select MAX(id) FROM `order`),'$pro_id','$price','$quantity','$amount')";
		$result = executeSQL($query);
		return $result;
	}
?>