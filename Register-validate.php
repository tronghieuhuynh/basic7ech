<?php 
session_start(); 
include "db_conn.php";

if (isset($_POST['email']) && isset($_POST['username']) && isset($_POST['password']) && isset($_POST['re_password'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$email = validate($_POST["email"]);
	$username = validate($_POST['username']);
	$password = validate($_POST['password']);
	$re_password = validate($_POST['re_password']);


    $user_data = 'username='. $username;
    echo $user_data;

	if (empty($_POST["email"])) {
		header("Location: Register.php?error=Email is required&$user_data");
	    exit();
	} else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		header("Location: Register.php?error=Invalid Email format&$user_data");
		exit();
	}else if (empty($username)) {
		header("Location: Register.php?error=User Name is required&$user_data");
	    exit();
	}else if(empty($password)){
        header("Location: Register.php?error=Password is required&$user_data");
	    exit();
	}
	else if(empty($re_password)){
        header("Location: Register.php?error=The confirmation password is required&$user_data");
	    exit();
	}

	else if($password !== $re_password){
        header("Location: Register.php?error=The confirmation password does not match&$user_data");
	    exit();
    }
    else{

		//hashing the password
        $password = md5($password);

	    $sql = "SELECT * FROM users WHERE User_name='$username' ";
		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) > 0) {
			header("Location: Register.php?error=The username is taken try another&$user_data");
	        exit();
		}else {
           $sql2 = "INSERT INTO users (ID,User_mail,User_name, Password) VALUES('1','$email','$username', '$password')";
           $result2 = mysqli_query($conn, $sql2);
           if ($result2) {
           	 header("Location: Register.php?success=Your account has been created successfully");
	         exit();
           }else {
	           	header("Location: Register.php?error=unknown error occurred&$user_data");
		        exit();
           }
		}
	}    
	
}else{
	header("Location: Register.php");
	exit();
}
?>