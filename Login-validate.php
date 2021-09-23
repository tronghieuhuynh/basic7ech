<?php 
session_start(); 
include "db_conn.php";

if (isset($_POST['username']) && isset($_POST['password'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$username = validate($_POST['username']);
	$pass = validate($_POST['password']);

	if (empty($username)) {
		header("Location: Login.php?error=User Name is required");
	    exit();
	}else if(empty($pass)){
        header("Location: Login.php?error=Password is required");
	    exit();
	}else if (($pass == 'admin') && ($username == 'admin')){
        header("Location: admin.php");
	    exit();
	}else{
		$pass = md5($pass);
		$sql = "SELECT * FROM users WHERE User_name='$username' AND Password='$pass' AND ID ='1'";
		$sql2 = "SELECT * FROM users WHERE User_name='$username' AND Password='$pass' AND ID ='2'";
		$result = mysqli_query($conn, $sql);
		$result2 = mysqli_query($conn, $sql2);

		if (mysqli_num_rows($result) === 1) {
			$row = mysqli_fetch_assoc($result);
            if ($row['User_name'] === $username && $row['Password'] === $pass) {
            	$_SESSION['User_name'] = $row['User_name'];
            	header("Location: home.php");
		        exit();
            }else{
				header("Location: Login.php?error=Incorect User name or password");
		        exit();
			}
		}else if (mysqli_num_rows($result2) === 1) {
			$row = mysqli_fetch_assoc($result2);
            if ($row['User_name'] === $username && $row['Password'] === $pass) {
            	$_SESSION['User_name'] = $row['User_name'];
            	header("Location: developer.php");
		        exit();
            }else{
				header("Location: Login.php?error=Incorect User name or password");
		        exit();
			}
		}
		else{
			header("Location: Login.php?error=Incorect User name or , try again");
	        exit();
		}
	}
	
}else{
	header("Location: Login.php");
	exit();
}