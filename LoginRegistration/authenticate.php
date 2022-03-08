<?php
//codes to verfiy username and password obtained
//from index.html(login form) with the accounts 
//table in db

//start session first to track user login
session_start();
//call db connection file
include('functions.php');
//check if values has been entered
if(!isset($_POST['username'],$_POST['password']))
{
    exit ('please enter all info');
}
else{
    //connect to mysql
    $pdo=pdo_connect_mysql();
    //retrieve username and password value
    //from text box and put in a local variable
    $username=$_POST['username'];
    $password=$_POST['password'];

    //use SELECT query to check the value matches with db value
    $stmt=$pdo->prepare('SELECT * FROM accounts 
                            WHERE username=:username 
                            AND password=:password');
    //use bindParam to bind the values obtained from
    //table and textbox
    $stmt->bindParam(":username",$username);
    $stmt->bindParam(":password",$password);
    //call the execute 
    $stmt->execute();
    //use a method rowCount() to check 
    //how many records matches with the values entered
    if($stmt->rowCount()==1)//which means a record has been found 
    //with matching username and password
    {
        //create a session variable and store user name in it
        //so this session info/uname will be taken to next page(home.php)
        $_SESSION['username']=$username;
        //redirect the page to home.php after successful login
        header('Location: home.php');

    }
    else{//no record found with entered username and password
        echo 'cannot login';
    }

}


?>