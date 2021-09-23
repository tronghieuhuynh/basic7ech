<?php
    include "db_conn.php";
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="style.css">
</head>
<body>
<div class="Admin-page">
    <div class="admin-title">
       <b>Administrator</b>
    </div>
    Click here to <a href="Login.php" title="Login page">Logout.</a>
    <div class="users-table">
        <table>
            <tr>
                <th>Email</th>
                <th>User name</th>
                <th>ID</th>
            </tr>
            <?php
                $sql = "SELECT User_mail, User_name, ID from users";
                $result = $conn-> query($sql);

                if($result-> num_rows > 0) {
                   while ($row = $result-> fetch_assoc()) {
                       echo "<tr><td>".$row["User_mail"]. "</td><td>". $row["User_name"] . "</td><td>". $row["ID"] ."</td></tr>";
                   }
                   echo "</table>"; 
                }
                else {
                    echo "0 result";
                }
            ?>
        </table>    
    </div>
    <div class="application-table">
        <h2>All application</h2>
        <table>
            <tr>
                <th>Name</th>
                <th>Category</th>
                <th>Description</th>
                <th>Detail</th>
                <th>Payment</th>
                <th>Status</th>
                <th>Developer</th>
            </tr>
            <?php
                $sql = "SELECT Name, Category, Description, Detail, Payment, Status, developer, ID from application" ;
                $result = $conn-> query($sql);
                if($result-> num_rows > 0) {
                   while ($row = $result-> fetch_assoc()) {
                       echo "<tr>
                       <td>".$row["Name"]. "</td><td>". $row["Category"] . "</td><td>". $row["Description"] ."</td><td>". $row["Detail"]."</td><td>". $row["Payment"]."</td><td>". $row["Status"]."</td><td>". $row["developer"]."</td>
                       </tr>";
                       echo "<td>"
                       ?> <a href="Application_PDP_Admin.php?pid=<?php echo $row["ID"]; ?>"><?php           
                       ?> <button type="button" class="btn btn-success">View More</button><?php
                       ?> </a><?php 
                       echo "</td>";
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
</div>
</body>
</html>