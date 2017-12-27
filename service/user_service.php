<?php require_once "../data/user_data_access.php"; ?>
<?php
   
    
    function login_service($email,$pass){
        return login($email,$pass);
    }
	
	function AddNewUser($name,$email,$password,$gender)
	{
		return addUser($name,$email,$password,$gender);
	}
 
?>