<?php
//connection codes
//include/invoke/call the connection code here
include('connection.php');
//execute the function above and put in a local variable $pdo
$pdo=pdo_connect_mysql();

//query the Database
//use prepare statement to write the query
$stmt=$pdo->prepare('SELECT * FROM students');
//use execute() to execute the query
$stmt->execute();
//table has more than on erecord-hence
//use fetchAll() to retrieve records one by one and store in a variable
$posts=$stmt->fetchAll(PDO::FETCH_ASSOC);//FETCH ASSOC refers to associative array
?>
<html>
    <body>
        <h2>Read Data From Students Table</h2>
        <!-- design a table structure to display the contents of students table -->
        <table>
            <thead>
                <tr>ID</tr>
                <tr>Student Name</tr>
                <tr>Contact</tr>
                <tr>Address</tr>
                <tr>State</tr>
                <tr>Postcode</tr>
                <tr>Country</tr>
                <tr>Year Intake</tr>
            </thead>
            <tbody>
                <!-- use for each loop to display the contents of '$posts'
                     array variable-->
                <?php foreach ($posts as $post):?>
                    <tr>
                        <!-- fill each column of the row with relevant column -->                        <td><?=$post['id']?></td>  
                        <td><?=$post['studentname']?></td>
                      <td>  <?=$post['contact']?></td>
                      <td>  <?=$post['address']?></td>
                      <td>  <?=$post['state']?></td>
                      <td>  <?=$post['postcode']?></td>
                      <td>  <?=$post['country']?></td>
                      <td>  <?=$post['yearintake']?></td>
                      <!-- to create a link for updating records -->
                      <td>
                         <a href="update.php?id=<?= $post['id'] ?>" >Update </a>
                      </td>
                      <td>
                         <a href="delete.php?id=<?= $post['id'] ?>" >Delete </a>
                      </td>
                    </tr>
                    <?php endforeach;?>
            </tbody>
        </table>
    </body>
</html>