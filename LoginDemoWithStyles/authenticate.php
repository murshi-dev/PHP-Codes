<?php
session_start();
include 'functions.php';


if ( !isset($_POST['username'], $_POST['password']) ) {
	exit('Please fill both the username and password fields!');
}
else{
  //  session_start();
    $pdo = pdo_connect_mysql();
$username=$_POST['username'];
$password=$_POST['password'];

$stmt = $pdo->prepare("SELECT * FROM accounts WHERE username=:username AND password=:password");
$stmt ->bindParam(":username",$username);
$stmt ->bindParam(":password",$password);
$stmt->execute();
if($stmt->rowCount() == 1 ){
    
            $_SESSION['username'] = $username;
            header('Location: home.php');
        }else{
            echo 'Cannot login!';
        }

}



?>