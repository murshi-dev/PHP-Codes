<html>
<head>
    <link rel="stylesheet" href="">
</head>

<body>
    <form action="" method="POST">
        Enter Number 1: <input type="text" name="num1">
        Enter Number 2: <input type="text" name="num2">
        <input type="submit" name="add">
    </form>


    <?php

    //if ((isset($_GET['num1'])) && (isset($_GET['num2']))) 
    if ($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        $num1 = $_POST['num1'];
        $num2 = $_POST['num2'];
        echo "The sum of " . $num1 . " & " . $num2 . " is " . ($num1 + $num2);
    }
    ?>



</body>

</html>