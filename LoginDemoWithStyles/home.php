<?php  
 //login_success.php  
 session_start();  
 if(!isset($_SESSION["username"]))  
 {  
	header("location:index.html");  
 
 }  
 else  
 {  
?>
<html>
    <!-- //template for our home page. On this page, the user will encounter a welcome message along with their name being displayed. -->
	<head>
		<meta charset="utf-8">
		<title>Home Page</title>
		<link href="loginstyles.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
	</head>
	<body class="loggedin">
		<nav class="navtop">
			<div>
				<h1>Login Demo</h1>
				<a href="profile.php"><i class="fas fa-user-circle"></i>Profile</a>
				<a href="logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a>
			</div>
		</nav>
		<div class="content">
			<h2>Home Page</h2>
			<p>Welcome back, <?=$_SESSION['username']?>!</p>
		</div>
	</body>
</html>
<?php
}
?>







