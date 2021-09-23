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
$name = $_SESSION['User_name']; 
$sql= "SELECT * FROM users WHERE User_name ='$name'";
$result = $conn-> query($sql);
if($result -> num_rows > 0) {
    $row = $result -> fetch_assoc();
}
?>
<h2> Upgrade Your Account </h2>
<div class="list-app">
    <h2> Benefit of upgrading your account </h2>
    <form action="Upgrade_account.php?fid=<?php echo $row["User_name"]; ?>" method="POST">
        <b>Level up your account to Developer</b>
        <p></p>
        <b>Earn more money by Creating and Uploading your app</b>
        <p></p>
        <button class="btn btn-success" type="submit">Upgrade now</button>
    </form>
    
</div>
</body>
</html>