<?php
    session_start();
    if (!isset($_SESSION['User_name'])) {
        header('Location: login.php');
        exit();
    }
    include "db_conn.php";
?>
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
        $ID = (string) $_GET['fid'];

        $sql= 'SELECT * FROM application WHERE ID="'.$ID.'" LIMIT 1';
        $result = $conn-> query($sql);
        if($result -> num_rows > 0) {
            $row = $result -> fetch_assoc();
            $name = $row["File"];
        }
        $pid = (string) trim($_GET['pid']);
        $sql2 = "SELECT * FROM users WHERE User_name = '$pid'";
        $result2 = $conn-> query($sql2);
        if($result2 -> num_rows > 0) {
            $row2 = $result2 -> fetch_assoc();
        }
        $conn-> close();
      ?>
<h2> CONFIRM YOUR PAYMENT </h2>
<div class="list-app">
    <h2> <?php echo $row["Name"]; ?> </h2>
    <form action="Download.php?fid=<?php echo $row["ID"]; ?>&&pid=<?php echo $row2["User_name"];?>" method="POST">
        <p>
            <b>Category: </b>
            <b><?php echo $row["Category"]; ?></b>
        </p>
        <p>
            <b>Description: </b>
            <b><?php echo $row["Description"]; ?></b>
        </p>
        <p>
            <b>Price: </b>
            <b><?php echo $row["Price"]; ?></b>
        </p>
        <p>
            <img src="images/<?php echo $row["image"]; ?>"  class="image-container" style="text-align: center;">
        </p>
        <button class="btn btn-success" type="submit">Purchase now</button>
    </form>
    
</div>
</body>