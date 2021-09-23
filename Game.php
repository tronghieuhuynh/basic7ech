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
        $sql = "SELECT * from application WHERE status='Approve' && Category='Game'";
        $result = $conn-> query($sql);
        $name = $_SESSION["User_name"];
        $sql2 = "SELECT * from users WHERE User_name='$name'";
        $result2 = $conn-> query($sql2);
        if($result2 -> num_rows > 0) {
            $row2 = $result2 -> fetch_assoc();
        }
        $conn-> close();
      ?>
<h2>Welcome to THE APP STORE</h2>
  <b>Welcome</b> <?php echo $_SESSION["User_name"];?>.
  <p> 
  Click here to <a href="Login.php" title="Login page">Logout.</a>
  </p>
  <p>
  Click here to <a href="Upgrade.php?pid=<?php echo $row2["User_name"]; ?>" title="Upgrade page">Upgrade your account.</a>
  </p>
  <p>
  Click here to <a href="Unit_code.php?fid=<?php echo $row2["User_name"]; ?>" title="Add unit">add unit to your balance.</a>
  </p>
<br><br>
<div class="topnav">
  <a class="active" href="home.php">Home</a> 
  <a href="Education.php">Education</a>
  <a href="Game.php">Game</a>
  <a href="Book.php">Book</a>
  <a href="Movie.php">Movie</a>
</div>
<div class="list-app">
    <table>
        <?php if($result-> num_rows > 0) {
          while ($row = $result-> fetch_assoc()) {
            echo "<td>";
            ?> <a href="Product_PDP.php?pid=<?php echo $row["ID"]; ?>&&fid=<?php echo $row2["User_name"]; ?>"><?php 
            ?> <img src="images/<?php echo $row["image"]; ?>"  class="image"><?php
            ?> </a><?php
            ?> <a href="Product_PDP.php?pid=<?php echo $row["ID"]; ?>&&fid=<?php echo $row2["User_name"]; ?>"><?php           
            ?> <button type="button" class="btn btn-success">View More</button><?php
            ?> </a><?php
            ?> <br> <?php
            ?> <a href="Download.php?fid=<?php echo $row["File"]; ?>&&pid=<?php echo $row2["User_name"];?>"><?php 
            ?> <button type="button" class="btn btn-success">Download</button><?php
            ?> </a><?php   
            echo "</td>";
          }
          echo "</table>"; 
                                    }
              else {
                echo "There are no available product now";}
        ?>
    </table>   
</div>

  
</body>
</html>