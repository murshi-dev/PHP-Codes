<?php
function pdo_connect_mysql() {
    // Update the details below with your MySQL details
    $DATABASE_HOST = 'localhost';
    $DATABASE_USER = 'root';
    $DATABASE_PASS = '';
    $DATABASE_NAME = 'shoppingcart';
    try {
    	return new PDO('mysql:host=' . $DATABASE_HOST . ';dbname=' . $DATABASE_NAME . ';charset=utf8', $DATABASE_USER, $DATABASE_PASS);
    } catch (PDOException $exception) {
    	// If there is an error with the connection, stop the script and display the error.
    	exit('Failed to connect to database!');
    }
}

//this place changes the title of each page depending on the selection
function template_header($title) {
     //small shopping cart icon with number of items added to cart
    // Get the amount of items in the shopping cart, this will be displayed in the header.
    if($title !='Place Order' )
    {
        $num_items_in_cart = isset($_SESSION['cart']) ? count($_SESSION['cart']) : 0;
    }
    else{
        $num_items_in_cart = 0;
    }
//EOT End Of Text delimiter to put some large text without using any single or double quotes
//in here, we use all html tags inside delimiter
echo <<<EOT
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>$title</title>
		<link href="styles.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
	</head>
	<body>
        <header>
            <div class="content-wrapper">
                <h1>Zen Succulents</h1>
                <nav>
                    <a href="index.php">Home</a>
                    <a href="index.php?page=products">Products</a>
                </nav>
                <div class="link-icons">
                    <a href="index.php?page=cart">
						<i class="fas fa-shopping-cart">                                          
                        </i>
                        <span>$num_items_in_cart</span>
					</a>
                </div>
            </div>
        </header>
        <main>
EOT;
}
// Template footer
function template_footer() {
$year = date('Y');
echo <<<EOT
        </main>
        <footer>
        <center>
            <div class="content-wrapper">
                <p>&copy; $year, Zen Succulents</p>
            </div>
            </center>
        </footer>
        <script src="script.js"></script>
    </body>
</html>
EOT;
}
?>