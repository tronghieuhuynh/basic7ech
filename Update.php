<?php 
session_start();
include "db_conn.php"; 

$pid = (int) trim($_GET['pid']);
$stt = $_POST['Approve-dropdown'];
$sql = "UPDATE application SET Status='$stt' WHERE ID = '$pid'";

if ($conn->query($sql) === TRUE) {
  echo "Record updated successfully";
} else {
  echo "Error updating record: " . $conn->error;
}

$conn->close();
?>