<?php

//every file needs session_start()
//it has to be first line of PHP
//start the session
session_start();
//print a welcome message with the username

print '<h1>Welcome '. $_SESSION['username'].'</h1>';

//display time user has logged in
date_default_timezone_set('Asia/Kuala_Lumpur');
echo 'You logged in at'.date('g:i a' , $_SESSION['loggedin']);


//display a link for logout
print '<a href="logout.php"> Click here to logout of Session</a>';

?>