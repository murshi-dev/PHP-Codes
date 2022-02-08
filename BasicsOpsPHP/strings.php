<?php

//single quotes display
$name='Joe\'s Pizza';
echo $name;
echo "<br>";
//double quotes display
$name="Joe's Pizza";
echo $name;
echo "<br>";

//strlen --to find the length of a string
$course="Information Technology";
$length=strlen($course);
echo "Length of ".$course."is ".$length;
echo "<br>";

//strtoupper
$course=strtoupper("Information Technology");
echo $course;
echo "<br>";
//strtolower
$course=strtolower("Information Technology");
echo $course;
echo "<br>";
//ucfirst--upper case first
$course=ucfirst("Information Technology");
echo $course;
echo "<br>";
//ucwords--upper case words
$course=ucwords("information technology");
echo $course;
echo "<br>";

//substr--extracts part of the string
$course=substr("Information Technology",0,11);
echo $course;
echo "<br>";
$course=substr("Information Technology",-10);
echo $course;
echo "<br>";
//separate username and domain name from email using substr
$email="jane@gmail.com";
$username=substr($email,0,strpos($email,'@'));
echo "username is: ".$username;
echo "<br>";
$domainame=substr($email,strpos($email,'@')+1);
echo "domainame is: ".$domainame;
echo "<br>";


?>