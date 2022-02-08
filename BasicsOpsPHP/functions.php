<?php

///functions

function addNum($num1,$num2)
{
    return ($num1+$num2);
}
echo "Added value is: ".addNum(20,30);
echo "<br>";

//to convert first name and last name to caps

function convertCase($firstName,$lastName)
{
    $firstName=strtoupper($firstName);
    $lastName=strtoupper( $lastName);
    echo $firstName;
    echo $lastName;
}
echo convertCase("jane","austin");


?>