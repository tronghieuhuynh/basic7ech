<?php
session_start();
include "db_conn.php";

if (isset($_POST['name']) && isset($_POST['Category']) && isset($_POST['des']) && isset($_POST['detail']) && isset($_POST['payment']) && isset($_FILES['image'])&& isset($_FILES['file'])) {
    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $name = validate($_POST['name']);
    $des = validate($_POST['des']);
    $detail = validate($_POST['detail']);
    $payment = validate($_POST['payment']);
    $Category = validate($_POST['Category']);
    $image = $_FILES["image"]["name"];
    $price = validate($_POST['price']);
    $target = "images/".basename($image);
    $file = $_FILES["file"]["name"];
    $target2 = "files/".basename($file);


    if (empty($name)) 
    {
        header("Location: developer.php?error=Name is required");
	    exit();
    }
    else if (empty($des)) 
    {
        header("Location: developer.php?error=Description is required");
	    exit();
    }
    else if (empty($detail)) 
    {
        header("Location: developer.php?error=Detail is required");
	    exit();
    }
    else if (empty($payment))
    {
        header("Location: developer.php?erroe=Payment method is required");
    }
    else {
           $msg = "";
           $devname= $_SESSION["User_name"]; 
           $sql2 = "INSERT INTO application(Name, Category, Description, Detail, Payment, image, Status, developer, File, Price) VALUES('$name','$Category','$des', '$detail', '$payment','$image','Pending' ,'$devname','$file','$price')";
           $result2 = mysqli_query($conn, $sql2);
           if ($result2) {
           	 header("Location: developer.php?success=Your Application has been appplied successfully");
             if ((move_uploaded_file($_FILES['image']['tmp_name'], $target)) && (move_uploaded_file($_FILES['file']['tmp_name'], $target2)))  {
                    $msg = " uploaded successfully";
            }else{
                    $msg = "Failed to upload image";
              }   
	         exit();
           }else {
	           	header("Location: developer.php?error=unknown error occurred&$user_data");
		        exit();
                 }
        }

}
?>
