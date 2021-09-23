<?php
    session_start();
    if (!isset($_SESSION['User_name'])) {
        header('Location: login.php');
        exit();
    }
    include "db_conn.php";
?>
<!DOCTYPE html>
<head>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="Developer-page">
        <h2>Developer page</h2>
    </div>
    Welcome <?php echo $_SESSION["User_name"];?>. 
    Click here to <a href="Login.php" title="Login page">Logout.</a>
    <?php if (isset($_GET['error'])) { ?>
     	<p class="error"><?php echo $_GET['error']; ?></p>
    <?php } ?>

    <?php if (isset($_GET['success'])) { ?>
        <p class="success"><?php echo $_GET['success']; ?></p>
    <?php } ?>
    <div class="upload-aplication">
        <form action="dev-upload.php" method="POST" enctype="multipart/form-data">
            <p>UPLOAD APPLICATION</p>
            <p>
                <label>Name of the application: </label>
                <input type="text" name="name" placeholder="Name of the application">
            </p>
            <label for="Category">Choose a Category:</label>
            <select name="Category" id="Category">
                <option value="Education">Education</option>
                <option value="Game">Game</option>
                <option value="Book">Book</option>
                <option value="Movie">Movie</option>
            </select>
            <p>
                <label>Description: </label>
                <input type="text" name="des" placeholder="Description for the application">
            </p>
            <p>
                <label>Application's detail: </label>
                <input type="text" name="detail" placeholder="Detail of the application">
            </p>
            <input type="checkbox" id="1" name="payment" value="Fee" onclick="checkbox(this.id)">
            <label for="Fee">For purchase</label>
            <input type="checkbox" id="2" name="payment" value="Free" onclick="checkbox(this.id)">
            <label for="Free">Free</label><br>
            <p>
                <label>Price: </label>
                <input type="text" name="price" placeholder="Application's price" value="0">
            </p>
            <p>
            <label>File to upload: </label>
            <input type="file" name="file" id="file">
            </p>
            <p>
            <label>Image to upload: </label>
            <input type="file" value="Upload Image" name="image">
            </p> 
            <p>
                <button type="submit" value="upload" name="upload" id="btn"> Upload </button>
            </p>
        </form>
    </div>
    <div class="application-table">
        <h2>Your application</h2>
        <table>
            <tr>
                <th>Name</th>
                <th>Category</th>
                <th>Description</th>
                <th>Detail</th>
                <th>Payment</th>
                <th>Image</th>
                <th>Status</th>
            </tr>
            <?php
                $devname = $_SESSION['User_name'];
                $sql = "SELECT Name, Category, Description, Detail, Payment, image, Status from application WHERE developer='$devname'" ;
                $result = $conn-> query($sql);

                if($result-> num_rows > 0) {
                   while ($row = $result-> fetch_assoc()) {
                       echo "<tr><td>".$row["Name"]. "</td><td>". $row["Category"] . "</td><td>". $row["Description"] ."</td><td>". $row["Detail"]."</td><td>". $row["Payment"]."</td><td>". $row["image"]."</td><td>". $row["Status"]."</td></tr>";
                   }
                   echo "</table>"; 
                }
                else {
                    echo "0 result";
                }
                $conn-> close();
            ?>
        </table>
    </div>
</body>
</html>