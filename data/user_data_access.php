<?php require_once "dbconnector.php"; ?>
<?php

	function login($email, $pass)
	{
		$email=$email;
		$password=$pass;
		
		$query="select * from user where email='".$email."'";
		$result=mysqli_fetch_assoc(executeSQL($query));
		return $result;
	}
	
	function addUser($name,$email,$password,$gender)
	{
		$query="INSERT INTO user(name,email,password,gender,user_type_id) VALUES ('$name','$email', '$password','$gender',2)";
		$result=executeSQL($query);
		return $result;
	}

?>