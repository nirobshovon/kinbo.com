<?php require_once "../data/order_data_access.php"; ?>

<?php

	function addOrder($cus_id, $cus_add, $amount,$phn_num)
	{
		return addNewOrder($cus_id, $cus_add,$amount,$phn_num);
	}

	function findOrderUsingStatus($status)
	{
		return findOrderByDvStatus($status);
	}

	function findOrderUsingStatus2($status,$id)
	{
		return findOrderByDvStatus2($status,$id);
	}

	function deliverOrder($id)
	{
		return deliverOrderById($id);
	}
?>
