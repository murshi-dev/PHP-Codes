<?php
function pdo_connect_mysql()
{
    try//holds the normal set of codes here(if no error occurs)
    {
        return new PDO('mysql:host=localhost; dbname=StudentInfo','root','');
    }
    catch(PDOException $exception)//in case error happens, 
    //what to display/do-write it here
    {
        exit('could not connect to database');
    }

}
?>