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


	   // adding product category

	   if($_SERVER['REQUEST_METHOD']== "POST"){

			if(isset($_POST['add_category_btn']))
			{
				$cat_title=$_POST['cat_title'];
				$textarea=$_POST['textarea'];

					if($_POST['cat_title']!="" and $_POST['textarea']!="")
					{
						if(!preg_match('/^[a-zA-Z ]+$/', $cat_title))
						{
							echo'<script>
									alert("Title can have upper case and or lower case letter!!");
								</script>';
						}else{

							if(addNewCategory($cat_title,$textarea)){

								echo'<script>
									alert("Category Added!!");
									var x=1;
								</script>';
							}else
							{
								echo'<script>
									alert("Category not Added!!");
									var x=1;
								</script>';
							}
						}


					}else{
						echo'<script>
								alert("No filed can not be empty!!");
								var x=1;
							</script>';
					}




			}


		}


?>


<!DOCTYPE HTML>
<html>
<head>
	<title>E-Commerse</title>
</head>
<table border="2" width="100%">
<tr>
<body>

	<th colspan="2">

				<h3>Welcome</h3>
				<h3><?php echo $_SESSION['name'];?></h3>
			</div>
		</div>
				</th>
	</tr>

	<div >
		<ul>
			<tr><td><h3>Dashboard</h3>
			<li>Product
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
			<li>Orders</li>
			<ul>
				<li><a href="adminPendingOrder.php">Pending Orders</a></li>
				<li><a href="adminDeliveredOrder.php">Delivered Orders</a></li>
			</ul>
			<li><a href="logout.php"><input type="button" value="Logout"/></a></li>
		</ul>
	</div>
	</td>



	<td>

	<div class="add_category_area">

		<div class="login_area">
<<<<<<< HEAD
			<h2>Add Category</h2>
=======
			<h2 >Add Category</h2>
>>>>>>> 2d556dfa317cfe228450064e036b418b0ea7b8a1
			<form method="POST">
				<center>
					<input type="text" placeholder="Category Title" name="cat_title" value="<?php if (isset($_POST['cat_title'])) { echo $_POST['cat_title']; }  ?>" /></br>

					<textarea name="textarea"  placeholder="Short Description"  ><?php if (isset($_POST['textarea'])) { echo $_POST['textarea']; }?></textarea>

					<input type="submit" name="add_category_btn" id="add_category_btn" value="Add Category"/>


				</center>
			</form>
		</div>
	</div>



</td>
</tr>
</table>
</body>
</html>
