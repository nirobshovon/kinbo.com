<?php require_once "dbconnector.php"; ?>
<?php
	function addNewOrder($cus_id, $cus_add,$amount,$phn_num)
	{
		$query="INSERT INTO `order`(`customer_id`,`phn_num`, `customer_address`, `order_date`, `shipping_date`, `order_amount`, `delivery_status`)VALUES ('$cus_id','$phn_num', '$cus_add',curdate(), curdate(), '$amount', 'pending');";
		$result = executeSQL($query);
		return $result;
	}

	function findOrderByDvStatus($status)
	{
		$query="SELECT * FROM `order` WHERE delivery_status='$status'";
		$result = executeSQL($query);
		return $result;

		$orders = array();
		for($i=0; $row = mysqli_fetch_assoc($result); ++$i){
			$orders[$i] = $row;
		}

		return $orders;
	}

	function findOrderByDvStatus2($status,$id)
	{
		$query="SELECT * FROM `order` WHERE delivery_status='$status' and customer_id=$id";
		$result = executeSQL($query);
		return $result;

		$orders = array();
		for($i=0; $row = mysqli_fetch_assoc($result); ++$i){
			$orders[$i] = $row;
		}

		return $orders;
	}

	
