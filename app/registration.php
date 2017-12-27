<?php
	//for registration
	require_once('../data/dbconnector.php');
	require_once('../service/user_service.php');
	if($_SERVER['REQUEST_METHOD']== "POST"){
		if($_POST['name']!="" and $_POST['password']!="" and $_POST['email']!="" and $_POST['gender']!="")
		{
			$name=$_POST['name'];
			$password=$_POST['password'];
			$email=$_POST['email'];
			$gender=$_POST['gender'];
			if(str_word_count($name)< 2 or !preg_match('/^[a-zA-Z ]+$/', $name))
			{
				echo'<script>
						alert("Name can contain at least two word and \ncan have upper case and or lower case letter!!");
					</script>';
			}else if(!preg_match('/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/',$email)){
				echo'<script>
						alert("Invalid Email Address!!");
					</script>';
			}else if(strlen($password)<6 or !preg_match('/^[a-zA-Z0-9]+$/',$password))
			{
				echo'<script>
						alert("Password must be greater than 6 character\n and can conatin letters and number!!");
					</script>';
			}
			else{


					if(AddNewUser($name,$email,$password,$gender)){

						//header( 'Location: login.php' ) ;
						echo'<script>
										alert("Registration successful!!");
							</script>';
							header( 'Location: login.php' ) ;
					}else
					{
						echo'<script>
										alert("Not successful!!");
							</script>';
					}

				}

		}else
		{
			echo'<script>
					alert("No filed can not be empty!!");
				</script>';
		}
	}
?>
<fieldset>
<?php require_once('header.php'); ?>
	<div>
			<form method="POST">
				<center>
					Name&nbsp&nbsp<input type="text" placeholder="Enter Name" name="name" value="<?php if (isset($_POST['name'])) { echo $_POST['name']; } ?>" /></br>

				</br>Email&nbsp&nbsp<input type="text" placeholder="Enter Email" name="email" value="<?php if (isset($_POST['email'])) { echo $_POST['email']; } ?>"/></br>

			</br>Password&nbsp&nbsp<input type="password" placeholder="Enter Password" name="password" value="<?php if (isset($_POST['password'])) { echo $_POST['password']; } ?>" /></br>

		</br><select class="gender_class" name="gender" >
						<option class="option_class" value="">Select Gender</option>
						<option class="option_class" value="male">Male</option>
						<option class="option_class" value="female">Female</option>
					</select></br>

				</br><input type="submit" value="Sign Up"/>

				&nbsp&nbsp<a href="login.php"><input  type="button" value="Back" /></a>

				</center>
			</form>
		</div>
</fieldset>
</body>
</html>
