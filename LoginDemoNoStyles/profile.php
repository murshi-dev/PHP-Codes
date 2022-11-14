<?php
//maintain the session
session_start();
include 'connections.php';
$pdo=pdo_connect_mysql();
//retrieve/maintain username using SESSION variable
$username=$_SESSION['username'];
//SELECT query to display records
$stmt=$pdo->prepare('SELECT * FROM accounts WHERE username=:username');
$stmt->execute(['username'=>$username]);
//use fetch to display all column values
$info=$stmt->fetch(PDO::FETCH_ASSOC);
?>

<html>
    <!-- all entries related to the username are now in the $info
associative array.Design HTML section to display theses entries one by one -->
<body>
         <!-- display link for profile and logout -->
         <div align="right">
            <a href="profile.php">Profile</a>
            <a href="logout.php">Logout</a>
        </div>
    <div align="center">
        <table>
            <tr>
                <td>username:</td>
                <td><?=$_SESSION['username']?></td>
            </tr>
            <tr>
                <td>Password:</td>
                <td><?=$info['password']?></td>
            </tr>
            <tr>
                <td>Email:</td>
                <td><?=$info['email']?></td>
            </tr>
        </table>
    </div>
</body>
</html>