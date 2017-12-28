<<<<<<< HEAD
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
		<div >
				<h3>Welcome</h3>
				<h3><?php echo $_SESSION['name'];?></h3>
		</div>
			</th>
	</tr>

	<div >
		<ul>
			<tr>
				<td>
					<h3>Dashboard</h3>
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
			</ul>
			<li><a href="logout.php"><input type="button" value="Logout"/></a></li></br>
		</ul>
	</div>
	</td>


	<td>

			<div>
				<h2>Select Category</h2>
				<form method="POST">
					<center>
						<select name="cat" id="cat" >
							<option  value="">Select Category</option>
							<?php

								while($row=mysqli_fetch_assoc($result))
								{
									echo '<option value="'.$row['category_name'].'">'.$row['category_name'].'</option>';
								}

							?>
						</select></br>

						</br><input type="submit" name="selectCat" id="selectCat" value="Select"/></br></br>


					</center>
				</form>
			</div>
		<div><center>
			<?php
				echo '<table border="1px">
						<tr >
								<td>ID</td>
								<td>Title</td>
								<td>Price</td>
								<td> </td>
							</tr>';
				while($row=mysqli_fetch_assoc($products))
				{
					echo ' <tr >
								<td>'.$row['id'].'</td>
								<td>'.$row['title'].'</td>
								<td>'.$row['price'].'</td>
								<td> <a href="confirmDeleteProduct.php?id='.$row['id'].'">delete</a></td>
							</tr>';
				}
				echo '</table>';

			?>

		</center>
		</div>

		</td>
</tr>
</table>


</body>
</html>
=======
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
		<div >
				<a href="index.php"><h1>Kinbo.com</h1></a>
				<h3>Welcome</h3>
				<h3><?php echo $_SESSION['name'];?></h3>
		</div>
			</th>
	</tr>

	<div >
		<ul>
			<tr>
				<td>
					<li><input type="button" value="Dashboard"/></li>
						<li><input type="button" name="product" value="Products"/>
				<ul>
					<li><a href="addProduct.php">Add Product</a></li>
					<li><a href="deleteProduct.php">Delete Product</a></li>
					<li><a href="updateProduct.php">Update Proudct</a></li>
				</ul>
						</li>
			<li><input type="button" value="Category"/>
				<ul>
					<li><a href="addCategory.php">Add Category</a></li>
					<li><a href="#">Delete Category</a></li>
					<li><a href="#">Update Category</a></li>
				</ul>
			</li>
			<li><input type="button" value="Orders"/></li>
			<li><input type="button" value="Users"/></li>
			<li><a href="logout.php"><input type="button" value="Logout"/></a></li>
		</ul>
	</div>
	</td>


	<td>

			<div>
				<h2>Select Category</h2>
				<form method="POST">
					<center>
						<select class="gender_class" name="cat" id="cat" >
							<option class="option_class" value="">Select Category</option>
							<?php

								while($row=mysqli_fetch_assoc($result))
								{
									echo '<option value="'.$row['category_name'].'">'.$row['category_name'].'</option>';
								}

							?>
						</select></br>

						<input type="submit" name="selectCat" id="selectCat" value="Select"/>


					</center>
				</form>
			</div>
		<div>
			<?php
				echo '<table border="1px">
						<tr >
								<td>ID</td>
								<td>Title</td>
								<td>Price</td>
								<td> </td>
							</tr>';
				while($row=mysqli_fetch_assoc($products))
				{
					echo ' <tr >
								<td>'.$row['id'].'</td>
								<td>'.$row['title'].'</td>
								<td>'.$row['price'].'</td>
								<td> <a href="confirmDeleteProduct.php?id='.$row['id'].'">delete</a></td>
							</tr>';
				}
				echo '</table>';

			?>


		</div>

		</td>
</tr>
</table>


</body>
</html>
>>>>>>> 2d556dfa317cfe228450064e036b418b0ea7b8a1
