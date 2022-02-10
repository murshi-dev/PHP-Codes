<html>
<head>
    <link rel="stylesheet" href="">
</head>

<body>
      <?php

    if ((isset($_GET['num1'])) && (isset($_GET['num2']))) 
    {
        $num1 = $_GET['num1'];
        $num2 = $_GET['num2'];
        echo "The sum of " . $num1 . "&" . $num2 . "is" . ($num1 + $num2);
    }
   
else{
    ?>

  <form action="" method="GET">
        Enter Number 1: <input type="text" name="num1">
        Enter Number 2: <input type="text" name="num2">
        <input type="submit" name="add">
    </form>
<?php
}
?>

</body>

</html>