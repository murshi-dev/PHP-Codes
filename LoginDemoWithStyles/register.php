<?php
include 'functions.php';
// Now we check if the data was submitted, isset() function will check if the data exists.
if (!isset($_POST['username'], $_POST['password'], $_POST['email'])) {
	// Could not get the data that should have been sent.
	exit('Please complete the registration form!');
}
// Make sure the submitted registration values are not empty.
if (empty($_POST['username']) || empty($_POST['password']) || empty($_POST['email'])) {
	// One or more values are empty.
	exit('Please complete the registration form');
}
$pdo = pdo_connect_mysql();
//insert new account
if ($stmt = $pdo->prepare('INSERT INTO accounts (username, password, email) VALUES (?, ?, ?)')) {
	$stmt->execute([$_POST['username'], $_POST['password'], $_POST['email']]);
	echo 'You have successfully registered, you can now login!';
	header('Location: index.html');
} else {
	// Something is wrong with the sql statement, check to make sure accounts table exists with all 3 fields.
	echo 'Could not insert record!';
}
