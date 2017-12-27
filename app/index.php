<?php

	session_start();
	if(isset($_SESSION['email'])){
		if($_SESSION['id']==1)
		{
			require_once('header.php');
		}else{
			require_once('header.php');
		}

	}else if(isset($_COOKIE['email']))
	{

		$_SESSION['id']=$_COOKIE['id'];
		$_SESSION['name']=$_COOKIE['name'];
		$_SESSION['password']=$_COOKIE['password'];
		$_SESSION['email']=$_COOKIE['email'];
		require_once('header.php');
	}else{
		require_once('header.php');
	}

	require_once "../service/product_service.php";
	$products = ProductByPaiging();
	require_once('../data/dbconnector.php');
	//for pagination
	$result_per_page=5;

	$number_of_pages = getNumberOfPages();

?>



<center><fieldset>

				<?php
					//for showing products


						foreach($products as $row)
						{

							echo'<div >'
									.'<img  src="images\\'.$row['img_path'].'" height="200" />'
									.'<h2 id="pro_title">'.$row['title'].'</h2>'
									.'<h3 id="pro_price">Price: '.$row['price'].' tk</h3>'
									.'<h3 id="pro_stock">Stock: '.$row['stock'].'</h3>
									<h3><a href="cart.php?pid='.$row['id'].'" >Add to cart</a></h3>
								</div>';

						}

				?>

				<?php
				//for showing page numbers
				echo'<center>
						<div >';
							for($page=1;$page<=$number_of_pages;$page++)
							{
								echo '<a  href="index.php?page='.$page.'">Page'.$page.'</a>  ';
							}
				    echo'</div>
					</center>';
				?>


</body>
</html>
