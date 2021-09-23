<?php
session_start();
if (!isset($_SESSION['User_name'])) {
    header('Location: login.php');
    exit();
}
include "db_conn.php";
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
$price = $row["Price"];
$balance = $row2["Balance"];
if($balance < $price){
  ?> <div>
        <h2>Your balance is not enough to download the app</h2>
    </div>
    <a href="Login.php">Go back to the Login page</a>
    <p> 
        <a href="Unit_code.php?fid=<?php echo $row2["User_name"]; ?>">Add unit to your balance</a>
    </p>
  <?php
}
else{
    $remain = $price - $balance;
    $sql3 = "UPDATE users SET Balance = '$remain' WHERE User_name = '$pid'";
    if ($conn->query($sql3) === TRUE) {
        echo "Record updated successfully";
      } else {
        echo "Error updating record: " . $conn->error;
      }
    ob_end_clean();
    $name = "files/".$name;
    if(file_exists($name)){  
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename="'.basename($name).'"');
        header('Content-Transfer-Encoding: binary');
        header('Expires: 0');
        header('Cache-Control: must-revalidate, post-check =0, pre-check=0');
        header('Pragma: public');
        header('Content-Length: ' . filesize($name));
        readfile($name,true);
    }
    flush();
}

?>