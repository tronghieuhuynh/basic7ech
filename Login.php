<!DOCTYPE html>
<html>
<head>
    <title> Login Page </title>
    <link rel="stylesheet" href="style.css" type="text/css"/>
</head>
<body>
<div class ="Login-page">
    <div class= "Login-title">
       <b> Login </b> 
       <?php if (isset($_GET['error'])) { ?>
     		<p class="error"><?php echo $_GET['error']; ?></p>
        <?php } ?>
    </div>
    <div class = "Login-box">
        <form action="Login-validate.php" method="POST">
            <p> Login with your username and password </p>
            <p>
                <label> Username: </label>
                <input type="text" name="username" placeholder="Type in your username">
            </p>
            <p>
                <label>Password: </label>
                <input type="password" name="password" placeholder="Type in your password">
            </p>
            <p>
                <button type="submit" id="btn" value="Login"> Login </button>
            </p>
            <a href="Register.php">Create an account</a>    
        </form>
    </div>
</div>

</body>
</html>