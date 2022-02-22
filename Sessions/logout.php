<?php
//codes to clear session

//start session first
session_start();
//display session info before destruction
echo '<pre>before:';
print_r($_SESSION);//will print the session values
echo '</pre>';

//reset the array
$_SESSION=array();
//destroy session
        session_destroy();

//now display session values after destruction
echo '<pre>after:';
print_r($_SESSION);//will print the session values
echo '</pre>';

echo 'You are now logged out';


?>