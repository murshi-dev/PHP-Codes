<?php
include('connection.php');
$pdo=pdo_connect_mysql();
$msg="";
//check if delete link clicked and id retrieved
if(isset($_GET['id']))
{
    $stmt=$pdo->prepare('DELETE FROM students WHERE id = ? ');
    $stmt->execute([$_GET['id']]);
    $msg="Selected Data Deleted";
    //after delete redirect to view.php
    //header('Location:view.php');
    //exit;
}
else{
    exit("No such ID exist to delete");
}
?>
<html>
    <body>
        <h2>Delete Data</h2>
        <?php if($msg): ?>
            <p><?=$msg?></p>
            <?php endif;?>
    </body>
</html>
