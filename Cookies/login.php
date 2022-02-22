<?php
//check if form has been submitted
if(isset($_POST['submit']))
{
    //check if username ans password empty
    if((empty($_POST['username']))||(empty($_POST['password'])))
    {
        echo 'please enter username and password';
    }
    else{
        //if username and password not empty
        //check if remember me is clicked
        if(!empty($_POST['remember']))
        {
            //set cookie for username
            setcookie("username",$_POST['username'],time()+3600);
            //first param is the name of cookie
            //second param ---from where cookie value is taken
            //third parameter indicates cookie expiry time, one hour from now
             
            //set cookie for password
             setcookie("password",$_POST['password'],time()+3600);
             echo 'cookies has been set';
             echo "<br>";
             //to diplay the value of cookies use   $_COOKIE
             echo $_COOKIE['username'];
             echo "<br>";
             echo $_COOKIE['password'];
             echo "<br>";
        }
        else{
            //dont set cookie
            //give empty string in second parameter
            setcookie("username","");
            setcookie("password","");
            echo 'cookies has not been set';

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
        <!-- check box for remember  me -->
        <input type="checkbox" name="remember"> Remember
        <br>
        <input type="submit" name="submit" value="Login">
    </form>
</body>

</html>