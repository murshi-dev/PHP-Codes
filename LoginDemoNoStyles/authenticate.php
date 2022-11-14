<?php
//retrieve the username and password values from the index.html
//file (login form) and use SELECT query to compare 
//with the accounts table in mySQL
//ALSO, start the session
session_start();//must be the first line is sessions is used
include 'connections.php';
$pdo=pdo_connect_mysql();
//retrieve the form values
$username=$_POST['username'];
$password=$_POST['password'];

//compare using SELECT query
$stmt=$pdo->prepare('SELECT * FROM accounts WHERE username=:username AND password=:password');

//bindParam used to bind the values of variable and the parameter
$stmt->bindParam(":username",$username);
$stmt->bindParam(":password",$password);

$stmt->execute();

//write the if part -- on successful comparison part
//use rowcount that returns a positive value if atleast one record matches the entry
if($stmt->rowCount()==1)
{
    //display a welcome message with user name
    //use session variable for this
    $_SESSION['username']=$username;
    //redirect page to home.php after successful comparison
    header ('Location:home.php');
    //echo 'verified';
}
else{
    echo 'cannot login';
}




?>