<?php
//retrieve info from accounts table
session_start();
//if user not logged in
if(!isset($_SESSION['username']))
{
    header('location:index.html');
}
else{//user has logged in
    include('functions.php');
    $pdo=pdo_connect_mysql();
    $username=$_SESSION['username'];
    //retreive info based on username
    $stmt=$pdo->prepare('SELECT * FROM accounts WHERE username=:username');
    //NOTE! $username is a session variable
    $stmt->execute(['username'=>$username]);
    //fetch all info and put in an array $info
   $info =$stmt->fetch(PDO::FETCH_ASSOC);
}
?>
<html>
    <head>
        <title>Profile</title>
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
        <!-- user info from accounts table displayed here -->
        <div class="content">
            <h2>Profile page</h2>
           <!-- display table info here -->
            <div>
                <p>Your account details are listed below:</p>
                <table>
                    <!-- display username -->
                    <tr>
                        <td>Username:</td>
                        <td><?=$_SESSION['username']?></td>
                    </tr>
                    <!-- display password -->
                    <tr>
                        <td>Password:</td>
                        <td><?=$info['password']?></td>
                    </tr>
                    <!-- display email -->
                    <tr>
                        <td>Email:</td>
                        <td><?=$info['email']?></td>
                    </tr>
                </table>
            </div>




        </div>
    </body>
</html>
