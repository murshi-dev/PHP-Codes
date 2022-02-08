<?php
//initial state,condition, increment/decrement
//while loop
$num=3;
$count=1;
while($count<=10)
{
    echo $count."*".$num."=".$count*$num;
    $count++;
    echo "<br>";
}
echo "<br>";
//do-while loop
$num=3;
$count=1;
do
{
    echo $count."*".$num."=".$count*$num;
    $count++;
    echo "<br>";
}while($count<=10);
echo "<br>";
//for loop
 for($count=1;$count<=10;$count++)
 {
    echo $count."*".$num."=".$count*$num;
      echo "<br>";
 }





?>