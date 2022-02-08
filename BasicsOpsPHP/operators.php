<?php
//arithmetic operators
$num1=10;
$num2=20;
echo "Sum is " . ($num1+$num2);
echo "<br>";
echo "Subtracted value is " . ($num1-$num2);
echo "<br>";
echo "Product is " . ($num1*$num2);
echo "<br>";
echo "Divided value is " . ($num1/$num2);
echo "<br>";
echo "Modulo value is " . ($num1%$num2);
echo "<br>";

//relational equality operator ==
$var1=100;//number
$var2="100";//string
if($var1==$var2)
{
    echo "values are same";
}
else{
    echo "values are not same";
}

//relational identity operator ===
//checks for value and datatypes 
$var1=100;//number
$var2="100";//string
if($var1===$var2)
{
    echo "values are same";
    echo "<br>";
}
else{
    echo "values are not same";
}

//relational comparison < > <= >= 
$var1=100;//number
$var2=50;
if($var1>=$var2)
{
    echo "variable 1 is higher value";
    echo "<br>";
}
else{
    echo "variable 2 is higher value";
}

//relational logical && || ! 
$var1=100;
$var2=50;
if($var1==100 && $var2==50)
{
    echo "variable 1 and variable 2 matches provided value";
    echo "AND returns true only if both conditions are true";
    echo "<br>";
}

if($var1==70 || $var2==50)
{
    echo "variable 1 and variable 2 matches provided value";
    echo "OR returns true if either conditions are true";
    echo "<br>";
}
if($var1 !==70)
{
    echo "variable 1 does not match provided value";
    echo "NOT checks for alter condition";
    echo "<br>";
}

//increment decrement operator
//pre increment ++x
$a=10;
echo ++$a;//11
echo "<br>";
//post increment x++
$b=10;
echo $b++;//10
echo "<br>";
echo $b;//11
echo "<br>";
//pre decrement --x
$c=10;
echo --$c;//9
echo "<br>";
//post decrement x--
$d=10;
echo $d--;//10
echo "<br>";
echo $d;//9
echo "<br>";

//assignment operator += -= *= /=

$num1=20;
$num1+=50;//$num1=$num1+50
echo $num1;//70
echo "<br>";

$num2=20;
$num2*=5;//$num2=$num2*5
echo $num2;//100
echo "<br>";


//formatting or round off numbers
$number=round(9.765435, 2);//9.77
echo $number;
echo "<br>";

//random number rand()

$random_number=rand(1,50);
echo "random number is  ". $random_number;
echo "<br>";










































?>