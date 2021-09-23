<?php 
session_start();
include "db_conn.php"; 
$fid = (string) trim($_GET['fid']);
$sql2 = "SELECT * FROM users WHERE User_name = '$fid'";
$result = $conn-> query($sql2);
if($result -> num_rows > 0) {
    $row = $result -> fetch_assoc();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title> Add Unit </title>
    <link rel="stylesheet" href="style.css" type="text/css"/>
</head>
<body>
<div class ="Login-page">
    <div class= "Login-title">
       <b> Add Unit </b> 
       <?php if (isset($_GET['error'])) { ?>
     		<p class="error"><?php echo $_GET['error']; ?></p>
        <?php } ?>
    </div>
    <div class = "Login-box">
        <form action="Code-validate.php?fid=<?php echo $row["User_name"]; ?>" method="POST">
            <p> Input your code to add Unit </p>
            <p>
                <label>Unit Code: </label>
                <input type="text" name="code" placeholder="Type in your unit code">
            </p>
            <p>
                <button type="submit" id="btn" value="Code"> Submit </button>
            </p>  
        </form>
    </div>
</div>

</body>
</html>