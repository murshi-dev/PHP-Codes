<?php
session_start();
?>
<html>
    <body>
        <!-- display link for profile and logout -->
        <div align="right">
            <a href="profile.php">Profile</a>
            <a href="logout.php">Logout</a>
        </div>
        <!-- welcome user with their name -->
        <div align="center">
            <h2>Home Page</h2>
           <!-- retrieve username using SESSION variable -->
            <p>Welcome <?=$_SESSION['username']?></p>
        </div>
    </body>
</html>