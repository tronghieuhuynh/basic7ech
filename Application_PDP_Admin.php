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
    include "db_conn.php";
?>

<h2>Welcome to THE APP STORE</h2>
Click here to <a href="Login.php" title="Login page">Logout.</a>
<?php 
	$pid = (int) trim($_GET['pid']); 
	if($pid == 0){
		//you can show error or redirect to other page 
		header('Location : home.php'); 
	} 
	$sql= 'SELECT * FROM application WHERE ID="'.$pid.'" LIMIT 1';
    $result = $conn-> query($sql);
    if($result-> num_rows > 0) {
        $row = $result-> fetch_assoc();
    }
?>
<div class="list-app">
        <form action="Update.php?pid=<?php echo $row["ID"]; ?>" method="POST">
            <p> Application Info </p>
            <p>
                <label>Name</label>
                <?php echo $row["Name"]; ?>
            </p>
            <p>
                <label>Category</label>
                <?php echo $row["Category"]; ?>
            </p>
            <p>
                <label>Description</label>
                <?php echo $row["Description"]; ?>
            </p>
            <p>
                <label>Detail</label>
                <?php echo $row["Detail"]; ?>
            </p>
            <select name="Approve-dropdown" id="approve">
                <option value="Approve">Approve</option>
                <option value="Deny">Deny</option>
            </select>
            <p>
                <button type="submit" id="btn" value="Confirm"> Confirm </button>
            </p>    
        </form>   
</div>

  
</body>
</html>