<?php
//count visitors to websites
//use sessions
//start session first
session_start();
//use 'views' variable from SESSION to retrieve count values
if(isset($_SESSION['views']))
{
    //increase counter when page is loaded
    $_SESSION['views']=$_SESSION['views']+1;
}
else{
    //dont increase counter value if no page is loaded
    $_SESSION['views']=1;
}
//display the views value
echo 'you are visitor number'.$_SESSION['views'];
echo "<br>";



//display last visted time in a website
//set the date time zone
date_default_timezone_set('Asia/Kuala_Lumpur');
//calculate 30 days from now ---to keep track of days
$onemonth=60*60*24*30+time();
//seconds(60) minutes(60) hours(24) days(30) , time() from current time
setcookie('lastVisit',date ('g:i a - m/d/y'),$onemonth);
//param 1--cookie name
//param 3--cookie value
//param 3 -- expiry value

//now check if cookie has been set
//check if user already visited
if(isset($_COOKIE['lastVisit']))
{
    //pass lastvisit info to local variable
    $visit=$_COOKIE['lastVisit'];
    //print this info
    echo 'Your last visit was'.$visit;
}
else{
    echo 'welcome-first visit to this website';
}
?>