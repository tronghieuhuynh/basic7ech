<?php 
session_start();
include "db_conn.php"; 

$fid = (string) trim($_GET['fid']);
$sql2 = "SELECT * FROM users WHERE User_name = '$fid'";
$result = $conn-> query($sql2);
if($result -> num_rows > 0) {
    $row = $result -> fetch_assoc();
}
$balance = $row["Balance"];
if ($balance < 2000){
  echo "Your balance is not enought to upgrade your account";
  ?> <a href="Login.php">Go back to the Login page</a> <?php
  ?> <p> 
  <a href="Unit_code.php?fid=<?php echo $row["User_name"]; ?>">Add unit to your balance</a>
    </p>
  <?php
}
else {
  $sql = "UPDATE users SET ID = '2' WHERE User_name = '$fid'";  
  if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
    ?> <a href="Login.php">Go back to the Login page</a> <?php
} else {
  echo "Error updating record: " . $conn->error;
}
}
$conn->close();
?>