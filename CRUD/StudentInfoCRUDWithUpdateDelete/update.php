<?php
//connection codes
//include/invoke/call the connection code here
include('connection.php');
$pdo=pdo_connect_mysql();
//a local variable to hold success message
$msg='';
//use SELECT query to display records from the table
if(isset($_GET['id']))
{
    //check if form is submitted to update
    if(!empty($_POST))
    {
        //here retrieve the text box values and use UPDATE
        //query to update
        $id=isset($_POST['id']) ? $_POST['id'] : NULL;
        $studentname=$_POST['studentname'];
        $contact=$_POST['contact'];
        $address=$_POST['address'];
        $state=$_POST['state'];
        $postcode=$_POST['postcode'];
        $country=$_POST['country'];
        $yearintake=$_POST['yearintake'];

        $stmt=$pdo->prepare('UPDATE students SET id=?, studentname=?,contact=?,address=?,state=?,postcode=?, country=?, yearintake=? WHERE id=?');
        $stmt->execute([$id,$studentname,$contact,$address,$state,$postcode,$country,$yearintake,$_GET['id']]);

        //update the $msg variable after the UPDATEprocess
        $msg="Record Updated";   

    }
    //what  to do when id is retreived
    $stmt=$pdo->prepare('SELECT * from students where id=?');
    $stmt->execute([$_GET['id']]);
    $post=$stmt->fetch(PDO::FETCH_ASSOC);
}
else{
    exit('no such ID exists');
}
?>
<html>
    <body>
        <h2>Update Record </h2>
        <!-- design form to provide space for the records to be updated -->
        <form action="update.php?id=<?=$post['id']?>" method="post">
        <!-- action -- here specifies the record # that has to be updated -->
        <label>ID</label>
        <input type="text" name="id" value="<?=$post['id'] ?>"><br>
        <label>Student Name</label>
        <input type="text" name="studentname" value="<?=$post['studentname'] ?>"><br>
        <label>Contact</label>
        <input type="text" name="contact" value="<?=$post['contact'] ?>"><br>
        <label>Address</label>
        <input type="text" name="address" value="<?=$post['address'] ?>"><br>
        <label>State</label>
        <input type="text" name="state" value="<?=$post['state'] ?>"><br>
        <label>PostCode</label>
        <input type="text" name="postcode" value="<?=$post['postcode'] ?>"><br>
        <label>Country</label>
        <input type="text" name="country" value="<?=$post['country'] ?>"><br>
        <label>Year Intake</label>
        <input type="text" name="yearintake" value="<?=$post['yearintake'] ?>"><br>
        <input type="submit" value="Update">
        </form>
        <!-- display $msg value here -->
        <?php
        if($msg):?>
        <p><?= $msg ?></p>
        <?php endif; 
        ?>
     
    </body>
</html>