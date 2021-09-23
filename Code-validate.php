<?php 
session_start();
include "db_conn.php";
function validate($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
 }

$fid = (string) trim($_GET['fid']);
$sql2 = "SELECT * FROM users WHERE User_name = '$fid'";
$result2 = $conn-> query($sql2);
if($result2 -> num_rows > 0) {
    $row = $result2 -> fetch_assoc();
}
$code = validate($_POST['code']);
$sql1 = "SELECT * FROM code WHERE Code = '$code'";
$result = $conn-> query($sql1);
if($result -> num_rows > 0) {
    $row2 = $result -> fetch_assoc();
}
    $balance = $row["Balance"];
    $Value = $row2["Value"];
    $sum = $balance + $Value;
    $sql = "UPDATE users SET Balance = '$sum' WHERE User_name = '$fid'";
    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully";
      } else {
        echo "Error updating record: " . $conn->error;
      }
?>
<!DOCTYPE html>
<html>
<head>
    <title> Add Unit </title>
    <link rel="stylesheet" href="style.css" type="text/css"/>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"> 
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
<div class ="Login-page">
    <div class= "Login-title">
       <b> Payment completed </b> 
       <?php if (isset($_GET['error'])) { ?>
     		<p class="error"><?php echo $_GET['error']; ?></p>
        <?php } ?>
    </div>
    <div class = "Login-box">
        <form>
            <p> Your balance updated successfully </p>
            <p>
                <label>Your balance is now: </label>
                <?php echo $sum; ?>
            </p>
            <p>
                <a href="home.php">
                    <button type="button" id="btn" value="Code"> Go back to shop </button>
                </a>
            </p>  
        </form>
    </div>
</div>

</body>
</html>