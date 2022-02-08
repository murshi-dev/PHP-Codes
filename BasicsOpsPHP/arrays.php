<?php
//3types
//indexed or numeric arrays, associative arrays, multidimensional arrays

//indexed arrays
//create arrays
$students=array("John", "Jane", "Amy", "Kate");

//another way to create array
$teachers[0]="Thomas";
$teachers[1]="Navin";
$teachers[2]="Cath";

//access each element in an array
echo $students[1];//Jane
echo "<br>";
echo $teachers[2];//Cath
echo "<br>";

//count the number of elements 
$number_of_elements=count($students);
echo "Student array has ".$number_of_elements." elements";
echo "<br>";

//display the elements in an arrays
//first method ---using for loop
for($i=0;$i<$number_of_elements;$i++)
{
    echo $students[$i];
    echo "<br>";
}
//second method ---using for each loop
foreach($students as $student)
{
    echo $student;
    echo "<br>";
}
foreach($teachers as $teacher)
{
    echo $teacher;
    echo "<br>";
}

//associative arrays
$students=array(
    "John"=>"Maths",
    "Jane"=>"Science",
    "Amy" =>"English",
    "Kate"=>"History",
    "Betty"=>"BM"
);
//access each element
echo $students["Amy"];//English
//count the number of elements 
$number_of_elements=count($students);
echo "Student array has ".$number_of_elements." elements";
echo "<br>";
//display the elements in an arrays
foreach ($students as $student)
{
    echo $student;
    echo "<br>";
}
//multidimensional array
$chocolates=array(
                    array(
                        "name"=>"John",
                        "fav"=>"kitkat",
                        "price"=>"2"
                    ),
                    array(
                        "name"=>"Amy",
                        "fav"=>"bueno",
                        "price"=>"3"
                    ),
                    array(
                        "name"=>"kate",
                        "fav"=>"ferrero",
                        "price"=>"4"
                    )
                    );
//access element
echo "John's favorite chocolate is: ".$chocolates[0]["fav"];//kitkat
echo "<br>";
echo "Price of Kate's chocolate is: ".$chocolates[2]["price"];//4
echo "<br>";

//display elements using for and for each
$chocolate=array_keys($chocolates);
for($i=0;$i<count($chocolates);$i++)//0 1 2
{
    echo $chocolate[$i];
    echo "<br>";
    foreach ($chocolates[$chocolate[$i]] as $key=>$value)//name fav price
    {
        echo $key;
        echo "<br>";
        echo $value;
        echo "<br>";
    }
}
































?>