<?php
//to maintain the user activity until the user exits
//the web page--hence session is used
session_start();
//call functions to connect to the DB (shoppingcart)
include 'functions.php';
$pdo=pdo_connect_mysql();
//check what link is clicked-if any other page is 
//clicked(products/product/cart) display that page
//else display home page
$page=isset($_GET['page'])?$_GET['page']:'home';
include $page.'.php';
?>