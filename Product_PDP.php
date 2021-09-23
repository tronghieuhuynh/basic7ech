<!DOCTYPE html>
<html>
<head>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"> 
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="style.css" type="text/css"/>
</head>
<body>
<?php
    session_start();
    if (!isset($_SESSION['User_name'])) {
        header('Location: login.php');
        exit();
    }
    include "db_conn.php";
?>
<?php
	$pid = (int) trim($_GET['pid']); 
	if($pid == 0){
		//you can show error or redirect to other page 
		header('Location: home.php');
	}
    $fid = (string) trim($_GET['fid']); 
	if($fid == '0'){
		//you can show error or redirect to other page 
		header('Location: home.php'); 
	} 
	$sql= 'SELECT * FROM application WHERE ID="'.$pid.'" LIMIT 1';
    $result = $conn-> query($sql);
    if($result-> num_rows > 0) {
        $row = $result-> fetch_assoc();
    }
    $sql2 = "SELECT * FROM users WHERE User_name = '$fid'";
    $result2 = $conn-> query($sql2);
    if($result2 -> num_rows > 0) {
    $row2 = $result2 -> fetch_assoc();
}
?>
<div class="image-PDP">
    <img src="images/<?php echo $row["image"]; ?>"  class="image-pdp">
</div>
<div class="Login-title">
    <p>
        <b>Description: </b>
        <?php echo $row["Description"]; ?>
    </p>
    <br>
    <p>
        <b>Detail: </b>
        <?php echo $row["Detail"]; ?>
    </p>
    <p>
        <b>Price: </b>
        <?php echo $row["Price"]; ?>
    </p>
    <a href="Confirm-payment.php?fid=<?php echo $row["ID"]; ?>&&pid=<?php echo $row2["User_name"];?>">
        <button class="btn btn-success" type="submit">Download</button>
    </a>
</div>
</body>