<?php

		session_start();
		if(!isset($_SESSION['email']))
		{
			header("location: login.php");
		}
		require_once('../data/dbconnector.php');
		require_once "../service/user_service.php";
		require_once "../service/product_service.php";
		$result = getProductCategory();
		$cid=0;
		if(isset($_POST['selectCat']))
		{
			$cname=$_POST["cat"];
			global $cid;
			$cid=getCategoryIdByName($cname);

		}
		$products = getProductByCategoryId($cid);





?>


<!DOCTYPE HTML>
<html >
<head>

	<title>E-Commerse</title>
</head>

<table border="2" width="100%">
<tr>
<body>
	<th colspan="2">

		<div>
				<h3>Welcome</h3>
				<h3><?php echo $_SESSION['name'];?></h3>
		</div
	</th>
	</tr>



	<div>
		<ul>
			<tr>
				<td>
					<h3>Dashboard</h3></br>
			<li>Products
				<ul>
					<li><a href="addProduct.php">Add Product</a></li>
					<li><a href="deleteProduct.php">Delete Product</a></li>
					<li><a href="updateProduct.php">Update Proudct</a></li>
				</ul>
			</li>
			<li>Category
				<ul>
					<li><a href="addCategory.php">Add Category</a></li>
					<li><a href="#">Delete Category</a></li>
					<li><a href="#">Update Category</a></li>
				</ul>
			</li>
			<li>Orders
			<ul>
				<li><a href="adminPendingOrder.php">Pending Orders</a></li>
				<li><a href="adminDeliveredOrder.php">Delivered Orders</a></li>
			</ul></br>
			<li><a href="logout.php"><input type="button" value="Logout"/></a></li></br>
		</ul>
</div>
				</td>
	<td>

				<h2 color:"#FFF">Choose Category to update</h2>
				<form method="POST">
					<center>
						<select  name="cat" id="cat" >
							<option value="">Select Category</option>
							<?php

								while($row=mysqli_fetch_assoc($result))
								{
									echo '<option value="'.$row['category_name'].'">'.$row['category_name'].'</option>';
								}

							?>
						</select></br>

						</br><input type="submit" name="selectCat" id="selectCat" value="Select"/></br>


					</center>
				</form>
</br></br><center>
			<?php
				echo '<table border="1px">
						<tr >
								<td >ID</td>
								<td >Title</td>
								<td >Price</td>
							</tr>';
				while($row=mysqli_fetch_assoc($products))
				{
					echo ' <tr >
								<td>'.$row['id'].'</td>
								<td>'.$row['title'].'</td>
								<td >'.$row['price'].'</td>
								<td > <a href="editProduct.php?id='.$row['id'].'">update</a></td>
							</tr>';
				}
				echo '</table>';

			?>
		</center>


</td>
</tr>
</table>

</body>
</html>
