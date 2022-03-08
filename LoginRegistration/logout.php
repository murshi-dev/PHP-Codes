<?php
//clear the session variable
//redirect user to index.html--login page
session_start();
session_destroy();
header('location:index.html');
?>