<?php
//check if form has been submitted
if(isset($_POST['submit']))
{
    //check for empty username ans password
    if((empty($_POST['username']))||(empty($_POST['password'])))
    {
        echo 'please enter username and password';
    }
    else{
        //set some default username and password
        //username--amy password 123
        //check if username and password matches
        if($_POST['username']=='amy' && $_POST['password']=='123')
        {
            //the start the session
            session_start();
            echo "session has been started";
            //after session started retrieve username value from POST and pass to session
            $_SESSION['username']=$_POST['username'];
            $_SESSION['loggedin']=time();
            //move to next page welcome.php
            header('Location:welcome.php');
        }
        else{
            echo "username and password does not match";
        }

    }
}
?>

<html>
<body>
    <form action="" method="post">
        <input type="text" name="username" placeholder="Enter username here">
        <br>
        <input type="password" name="password" placeholder="Enter password here">
        <br>
        <input type="submit" name="submit" value="Login">
    </form>
</body>

</html>