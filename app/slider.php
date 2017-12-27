<script>
	var i = 0;
  var images = [];
  var time = 3000;

  // Image List
  images[0] = "1.jpg";
  images[1] = "2.jpg";
  images[2] = "3.jpg";
  images[3] = "4.jpg";
  images[4] = "5.jpg";

  // Change Image
  function changeImg(){
  	document.slide.src = images[i];

  	if(i < images.length - 1){
  	  i++;
  	} else {

  		i = 0;
  	}


	setTimeout("changeImg()", time);
}
window.onload=changeImg;

</script>



<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<title>E-Commerse</title>
</head>
<body>
			<fieldset>

				<center><h1><a href="index.php">Kinbo.com</a></h1></center></br>

				<table width="100%">
					<tr>
						<td align="center"><a href="slider.php">Home</a></td>
						<td align="center"><a href="index.php">Products</a></td>
						<td align="center"><a href="aboutpage.php">About</a></td>
						<td align="center"><a href="contact.php">Contact </a></td>
						<td align="center"><a href="cart.php">Cart </a></td>
						<td align="center"><a href="login.php">Login</a></td>
					</tr>
				</table></br></br></br>

				</fieldset></br>
				<center >
				<form  action="searching.php" method="post">
				 <input type="text" name="ItemToSearch" placeholder="Item To Search" required><br><br>
                 <input type="submit" name="search" value="Search item"><br><br>
				</form>
				</center>

			</fieldset></br>

<fieldset>

<center><img name="slide" width="600" height="300" /></center>


</fieldset>

<fieldset>
	<table border="" width="100%">
		<tr >
			<td>
				<h4>Customer Service</h4></br>
				<a href="help.php">Help center</a></br>
				<a href="">How to shop on Kinbo.com</a></br>
				<a href="">Track order</a></br>
				<a href="">Why shop with Kinbo</a></br>
				<a href="">returns & Refunds</a></br>
				<a href="">Contact us</a></br>
			</td>

			<td>
				<h4>About Us</h4></br>
				<a href="">About Kinbo.com</a></br>
				<a href="">Corporate Sales</a></br>
				<a href="">Terms And Conditions</a></br>
				<a href="">Privacy Policy</a></br>
				<a href="">Careers</a></br>

			</td>

			<td>
				<h4>Join Us</h4></br>
				<a><img width="32px" height="32px" src="C:\xampp\htdocs\kinbo.com\image\facebook.png"></img>
				</a>
				<a><img width="32px" height="32px" src="C:\xampp\htdocs\kinbo.com\image\gmail.png"></img>
				</a>
				<a><img width="32px" height="32px" src="C:\xampp\htdocs\kinbo.com\image\twitter.png"></img>
				</a>

			</td>


		</tr>
	</table>


</fieldset>
</body>
</html>
