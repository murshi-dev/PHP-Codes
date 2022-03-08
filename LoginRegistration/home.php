<!-- home.php -->
<?php
//start session to keep track of user 
session_start();
if(!isset($_SESSION['username']))
{
    //if session not set redirect user to login page
    header("location:index.html");
}
else{//means user has logged in--so display the welcome page
?>

<html>
    <head>
        <title>Home</title>
        <link rel="stylesheet" href="newstyles.css">
        <!-- font awesome link -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">
    </head>
    <body class="loggedin">
        <!-- design navigation bar -->
        <nav class="navtop">
            <div>
                <h1>Zen Succulents</h1>
                <a href="profile.php">
                    <i class=fas fa-user-circle></i>
                    Profile
                </a>
                <a href="logout.php">
                    <i class=fas fa-sign-out-alt></i>
                    Logout
                </a>
            </div>
        </nav>
        <!-- display the content -->
        <!-- display welcome message with session variable -->
        <!-- retrieved from authenticate.php file -->
        <div class="content">
            <h2>Home page</h2>
            <p>Welcome <?=$_SESSION['username']?></p>
        </div>
    </body>
</html>
<?php
}
?>