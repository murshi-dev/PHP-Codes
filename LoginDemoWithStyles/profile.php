<?php  
 //login_success.php  
 session_start();  
 if(!isset($_SESSION["username"]))  
 {  
	header("location:index.html");  
 
 }
 else{
	include 'functions.php';
	$pdo = pdo_connect_mysql();
	$username=$_SESSION["username"];
	$stmt = $pdo->prepare('SELECT * FROM accounts WHERE username=:username');
	$stmt->execute(['username'=> $username]);
	$info = $stmt->fetch(PDO::FETCH_ASSOC);
	//$id=$info['id'];

 } 

?>


<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Profile Page</title>
		<link href="loginstyles.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
	</head>
	<body class="loggedin">
		<nav class="navtop">
			<div>
				<h1>Profile </h1>
				<a href="profile.php"><i class="fas fa-user-circle"></i>Profile</a>
				<a href="logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a>
			</div>
		</nav>
		<div class="content">
			<h2>Profile Page</h2>
			<div>
				<p>Your account details are below:</p>
				<table>
					<tr>
						<td>Username:</td>
						<td><?=$_SESSION['username']?></td>
					</tr>
					<tr>
						<td>Password:</td>
						<td><?=$info['password'] ?></td>
					</tr>
					<tr>
						<td>Email:</td>
						<td><?=$info['email']?></td>
					</tr>
				</table>
			</div>
		</div>
	</body>
</html>