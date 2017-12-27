<?php 
	require_once "../service/product_service.php";
	if(isset($_GET['id'])){
        $product_id = trim($_GET['id']);
			if(DeleteProduct($product_id)==true)
			{
				//echo '<script type="text/javascript">alert("Product Added!!");</script>';
				header("location: deleteProduct.php");
			}
		}
		else{
			die();
		}
?>