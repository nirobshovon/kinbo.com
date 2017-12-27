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
						<td align="center"><a href="">About</a></td>
						<td align="center"><a href="">Contact </a></td>
						<td align="center"><a href="cart.php">Cart </a></td>
						<td align="center"><a href="login.php">Login</a></td>
					</tr>
				</table></br></br></br>
				</fieldset>
<fieldset>				

<center><img name="slide" width="600" height="300" /></center>

</fieldset>

</body>
</html>
