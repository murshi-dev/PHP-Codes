<?php
session_start();
session_destroy();//deletes the session
//redirect to index.html
header('Location:index.html');
?>