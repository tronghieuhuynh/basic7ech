<!DOCTYPE html>
<html>
<head>
    <title> Register Page </title>
    <link rel="stylesheet" href="style.css" type="text/css"/>
</head>
<body>
<div class ="Register-page">
    <div class= "Register-title">
       <b> Register </b> 
    </div>
    <?php if (isset($_GET['error'])) { ?>
     		<p class="error"><?php echo $_GET['error']; ?></p>
     	<?php } ?>

          <?php if (isset($_GET['success'])) { ?>
               <p class="success"><?php echo $_GET['success']; ?></p>
          <?php } ?>

    <div class = "Register-box">
        <form action="Register-validate.php" method="POST">
            <p> Register with your username and password</p>
            <p>
                <label> Email: </label>
                <input type="text" name="email" placeholder="Type in your email">
            </p>
            <p>
                <label> Username: </label>
                <input type="text" name="username" placeholder="Type in your username">
            </p>
            <p>
                <label>Password: </label>
                <input type="password" name="password" placeholder="Type in your password">
            </p>
            <p>
                <label>Confirm password: </label>
                <input type="password" name="re_password" placeholder="Confirm your password">
            </p>
            <p>
                <button type="submit" id="btn" value="Register"> Register </button>
            </p>
            <a href="Login.php"> Already have an account? </a>    
        </form>
    </div>
</div>

</body>
</html>