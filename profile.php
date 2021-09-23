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
    <?php if (isset($_GET['error'])) { ?>
     	<p class="error"><?php echo $_GET['error']; ?></p>
    <?php } ?>

    <?php if (isset($_GET['success'])) { ?>
        <p class="success"><?php echo $_GET['success']; ?></p>
    <?php } ?>
    <?php
        $name = $_SESSION["User_name"];
        $sql = "SELECT * from users WHERE User_name='$name'";
        $result = $conn-> query($sql);
        if($result -> num_rows > 0) {
            $row = $result -> fetch_assoc();
            if ($row["Avatar"]) {
                $ava = $row["Avatar"];
              }
              else {
                $ava = "profile.png";
              }
        }
    ?>
    <div class="list-app">
    <h2> PROFILE </h2>
    <form action="update_profile.php?fid=<?php echo $row["User_name"]; ?>" method="POST" enctype="multipart/form-data">
        <p>
            <b>USER NAME: </b>
            <b><?php echo $row["User_name"]; ?></b>
        </p>
        <p>
            <b>Email: </b>
            <b><?php echo $row["User_mail"]; ?></b>
        </p>
        <p>
            <b>Balance: </b>
            <b><?php echo $row["Balance"]; ?></b>
            <a href="Unit_code.php?fid=<?php echo $row["User_name"]; ?>">
                <button type="button">Add more unit</button>
            </a>
        </p>
        <p>
            <b>Avatar: </b>
            <img src="images/<?php echo $ava?>"  class="image">
            <input type="file" value="Upload Image" name="image">
        </p>
        <button class="btn btn-success" type="submit" name="update">Update</button>
        <p>
            <a href="Upgrade.php?pid=<?php echo $row2["User_name"]; ?>" title="Upgrade page">
                <button class="btn btn-success">Upgrade your account.</button>
            </a>
        </p>
    </form>
    
</div>
</body>
