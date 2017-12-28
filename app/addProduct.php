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

			//for adding product
			if(isset($_POST['add_product_btn']))
			{

						$cname=$_POST['cat'];
						$title = $_POST['title'];
						$short_desc = $_POST['short_desc'];
						$price =$_POST['price'];
						$stock = $_POST['stock'];


						if($_POST['cat']!="" and $_POST['title']!="" and $_POST['short_desc']!="" and $_POST['price']!="" and $_POST['stock']!="")
						{

							if(!preg_match('/^[a-zA-Z0-9 ]+$/', $title))
							{
								echo'<script>
									alert("Title can number and letter!!");
									var x=1;
								</script>';
							}else if(!preg_match('/^[0-9]+$/', $price)){
								echo'<script>
									alert("Price should be in number!!");
									var x=1;
								</script>';
							}else if(!preg_match('/^[0-9]+$/', $stock)){
								echo'<script>
									alert("Stock should be in number!!");
									var x=1;
								</script>';
							}else
							{
								$check = @getimagesize($_FILES["file"]["tmp_name"]);

								if ($check!==false)
									{
										$filename = $_FILES['file']['name'];
										$filename = time().$filename;
										move_uploaded_file($_FILES['file']['tmp_name'], "images\\".$filename);

										if($rw=mysqli_fetch_assoc(getCategoryByName($cname))){

											$cat_id=$rw['id'];
										}

										$addproduct = AddProduct($cat_id, $title, $short_desc, $filename, $price, $stock);

										if($addproduct){

											echo'<script>
												alert("Product Added!!");
												var x=1;
											</script>';
										}else
										{
											echo'<script>
												alert("Not Added!!");
												var x=1;
											</script>';
										}

									}else{
										echo'<script>
											alert("Only .jpg or .jpeg or .png can be upload\n and file size must be less than 2mb!!");
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


?>


<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<title>E-Commerse</title>
</head>
<body>
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


					<h2 >Add Product</h2>
					<form method="POST" enctype="multipart/form-data">
						<center>

							Product Name: &nbsp&nbsp<input type="text" placeholder="Product Title" name="title" value="<?php if (isset($_POST['title'])) { echo $_POST['title']; } ?>"/></br>

						</br>Product Price:&nbsp&nbsp<input type="text" placeholder="Price" name="price" value="<?php if (isset($_POST['price'])) { echo $_POST['price']; } ?>" /></br>

					</br>Stock amount:&nbsp&nbsp<input type="text" placeholder="Stock" name="stock" value="<?php if (isset($_POST['stock'])) { echo $_POST['stock']; } ?>" /></br>

							</br><textarea name="short_desc" placeholder="Short Description"><?php if (isset($_POST['short_desc'])) { echo $_POST['short_desc']; }?></textarea>

						</br></br><select name="cat" id="cat" ></br>
								<option value="">Select Category</option>
								<?php

									while($row=mysqli_fetch_assoc($result))
									{
										echo '<option value="'.$row['category_name'].'">'.$row['category_name'].'</option>';
									}

								?>
							</select></br>
							</br><input name="file" type="file"/></br>
							</br><input type="submit" name="add_product_btn" id="add_product_btn" value="Add Product"/>
</br></br></br>

						</center>
					</form>






</td>

</body>
</html>
