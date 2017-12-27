<?php

		session_start();
		if(!isset($_SESSION['email']))
		{
			header("location: login.php");
		}
		require_once('../data/dbconnector.php');
		require_once "../service/user_service.php";
		require_once "../service/product_service.php";




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
		</div>
				</th>
	</tr>
	<table>
	<?php
		if($_SESSION['id']==1)
		{
			require_once "adminLeftMenu.php";
		}else{
			require_once "userLeftMenu.php";
		}
	?>

</tr>
</table>
</body>
</html>
