<?php
    session_start();
    if (!isset($_SESSION['User_name'])) {
        header('Location: login.php');
        exit();
    }
    include "db_conn.php";
?>
<?php
    if(isset($_FILES['image'])){
        $fid = (string) trim($_GET['fid']);
        $sql = "SELECT * from users WHERE User_name='$fid'";
        $result = $conn-> query($sql);
        if($result -> num_rows > 0) {
        $row = $result -> fetch_assoc();
                                    }
        $msg = "";
        $image = $_FILES["image"]["name"];
        $target = "images/".basename($image);
        $sql2 = "UPDATE users SET Avatar='$image' WHERE User_name = '$fid'";
        $result2 = mysqli_query($conn, $sql2);
        if ($result2) {
            header("Location: profile.php?success=Your profile is updated successfully");
        if (move_uploaded_file($_FILES['image']['tmp_name'], $target))  {
                $msg = " uploaded successfully";
        }else{
                $msg = "Failed to upload image";
        }   
        exit();
    }else {
            $msg = "Error";
            exit();
            }
            }
?>