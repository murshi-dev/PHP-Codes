<?php
//connection codes
//include/invoke/call the connection code here
include('connection.php');
//execute the function above and put in a local variable $pdo
$pdo=pdo_connect_mysql();
//insert query process starts here
//check if form has been submitted
if(!empty($_POST))
{
    //$id- to auto increment 
    $id=isset($_POST['id']) && ($_POST['id'] != 'auto' ? $_POST['id'] : NULL);
    //retrieve all the entries from each text box and store in a local variable
    $studentname=$_POST['studentname'];
    $contact=$_POST['contact'];
    $address=$_POST['address'];
    $state=$_POST['state'];
    $country=$_POST['country'];
    $postcode=$_POST['postcode'];
    $yearintake=$_POST['yearintake'];

    //all text box values retieved now
    //now use the prepare () and execute()
    //? --here refers to the run time values obtained throught the text boxes
    $stmt=$pdo->prepare('INSERT INTO students values (?,?,?,?,?,?,?,?)');
    $stmt->execute([$id,$studentname,$contact,$address,$state,$country,$postcode,$yearintake]);


}
?>
<html>
    <body>
        <h2>Insert Records to the MySQL table</h2>
        <!-- design the form for the user to enter input -->
        <form action="insert.php" method="POST">
            <label>Student Name</label>
            <input type="text" name="studentname"><br>
            <label>Contact</label>
            <input type="text" name="contact"><br>
            <label>Address</label>
            <input type="text" name="address"><br>
            <label>State</label>
            <input type="text" name="state"><br>
            <label>Country</label>
            <input type="text" name="country"><br>
            <label>Post Code</label>
            <input type="text" name="postcode"><br>
            <label>Year Intake</label>
            <input type="text" name="yearintake"><br>
            <input type="submit" name="Save Student Data">
        </form>
    </body>
</html>