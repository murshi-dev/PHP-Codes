<?php

//if else condition
$marks=70;
if($marks>=50){
    $grade="pass";
}
else
{
    $grade="fail";
}
echo "Marks is: ".$marks;
echo "Grade is: ".$grade;
echo "<br>";


//switch case
$grade='A';
switch($grade)
{
    case 'A':
        $message='Great';
        break;
    case 'B':
        $message='Good';
        break;
    case 'C':
        $message='Average';
        break;   
    default:
        echo "invalid";
        break;
    }
    echo "Grade is: ".$grade;
    echo "<br>";
    echo "Message is: ".$message;
    echo "<br>";

    //ternary operator ?:
    //(condition)?true:false
    $marks=70;
    $check_status=($marks>=50)?"PASS":"FAIL";
    echo "Status is: ".$check_status;
    echo "<br>";
    //check elegibility to vote
    $age=21;
    $eligibility=$age>=21?"ELIGIBLE to vote":"NOT ELIGIBLE to vote";
    echo $age. "is" .$eligibility;
    echo "<br>";

    

?>

