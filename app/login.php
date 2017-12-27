<?php

	 require_once "../service/user_service.php";
?>
<?php
	//for login
	require_once('../data/dbconnector.php');
	if($_SERVER['REQUEST_METHOD']=="POST")
	{
			$email=$_POST['email'];
			$password=$_POST['password'];

			$result=login_service($email,$password);

			if($result['password']==$password and $result['password']!=null)
			{
				if(isset($_POST['remember']))
				{
					setcookie('id',$result['id'],time()+(60*60*60));
					setcookie('email',$result['email'],time()+(60*60*24));
					setcookie('name',$result['name'],time()+(60*60*24));
					setcookie('password',$result['password'],time()+(60*60*24));
				}
				session_start();
				//$_SESSION['loggedIn']=true;
				$_SESSION['id']=$result['id'];
				$_SESSION['name']=$result['name'];
				$_SESSION['email']=$result['email'];
				$_SESSION['password']=$result['password'];
				header('Location:dashboard.php');
			}
			else
			{
				echo'<script>
							alert("Email or passwrod is invalid!!");
					</script>';
			}






	}
?>


<!DOCTYPE HTML>

<head>
<title>E-Commerse</title>
</head>
<body>

<fieldset>
	<header>

		<div>
			<div>
				<center><h1>Log In</h1></center>
			</div>
			<div align="center">
			<table width="100%">
			<tr>

				<td align="center">	<a href="slider.php">Home</a></td>
				<td align="center">	<a href="index.php">Products</a></td>
				<td align="center">	<a href="">Contact </a></td>
				<td align="center">	<a href="login.php">login</a></td>
					</tr>
				</table></br></br></br></br>

				</div>

		</div>
	</header>




<div >
			<form method="POST">
				<center>
					Enter Email&nbsp&nbsp&nbsp<input type="text" placeholder="Enter Email" name="email" value="<?php if (isset($_POST['email'])) { echo $_POST['email']; } ?>" /></br>

				</br></br>Password&nbsp&nbsp&nbsp<input type="password" placeholder="Enter Password" name="password" value="<?php if (isset($_POST['password'])) { echo $_POST['password']; } ?>" /></br>

					</br></br><input  type="checkbox"  name="remember"   />REMEMBER ME</br></br>
					<input type="submit" value="Login" name="login_btn" /></br></br>

					<a href="registration.php"><input class="reg_btn" type="button" value="Register" name="reg_btn" /></a>

				</center>
			</form>
</div>
</fieldset>

</body>
</html>
