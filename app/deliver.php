<?php 
	require_once "../service/order_service.php";
	if(isset($_GET['id'])){
        $ord_id = trim($_GET['id']);
			if(deliverOrder($ord_id)==true)
			{
				echo '<script type="text/javascript">alert("Delivered!!");</script>';
				
				//header("location: adminPendingOrder.php");
			}
		}
		else{
			die();
		}
?>
<a href="adminPendingOrder.php">Back</a>