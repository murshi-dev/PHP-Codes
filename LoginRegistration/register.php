<?php
//codes to add/insert records to accounts table
//details are obtained from the register.html page

//start with db connection
include('functions.php');

//now check if all fields entered
if(!isset($_POST['username'], $_POST['password'],$_POST['email']))
{
    exit('please fill in all info');
}

//execute db connection
$pdo=pdo_connect_mysql();
//insert record to accounts table
if($stmt=$pdo->prepare('INSERT INTO accounts (username,password,email) 
                            VALUES(?,?,?)'))
{
// call execute() to execute the insert operation
  $stmt->execute([$_POST['username'],$_POST['password'],$_POST['email']]);
  //after successful insert, we have to move to index.html(login form)
  header('Location: index.html');
}
else{
    echo 'data not added';
}

?>