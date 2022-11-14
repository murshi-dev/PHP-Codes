<?php
//connect the database using the connections.php file
include 'connections.php';

//call the function
$pdo = pdo_connect_mysql();

//write query for insert
if ($stmt = $pdo->prepare('INSERT INTO accounts (username,password,email) VALUES (?,?,?)')) {
    $stmt->execute([$_POST['username'], $_POST['password'], $_POST['email']]);
   // echo 'record submitted';
   //on successful submission, go to index.html for login
   header('Location: index.html');
} else {
    echo 'records not submitted';
}
?>