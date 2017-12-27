<?php require_once "../data/orderdetails_data_access.php"; ?>

<?php

	function addOrderDetails($pro_id, $price,$quantity,$amount)
	{
		return addNewOrderDetails($pro_id, $price,$quantity,$amount);
	}

?>

