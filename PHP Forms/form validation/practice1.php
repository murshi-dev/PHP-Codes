<html>
<link rel="stylesheet" href="style.css">
</html>
<?php // login.php
// Print some introductory text:
print '<h2>Login Form</h2>
	   <p>Users who are logged in can take advantage of certain features like this, that, and the other thing.</p>';

// Check if the form has been submitted:
if ($_SERVER['REQUEST_METHOD'] == 'POST') 
{
	// Handle the form:
	if ((!empty($_POST['email'])) && (!empty($_POST['password']))) 
	{
		if ((strtolower($_POST['email']) == 'me@example.com') && ($_POST['password'] == 'testpass')) 
		{ // Correct!
			print '<p>You are logged in!<br />Now you can blah, blah, blah...</p>';
		} 
		else 
		{ // Incorrect!
			print '<p>The submitted email address and password do not match those on file!<br />Go back and try again.</p>';
		}
	} 
	else 
	{ // Forgot a field.
		print '<p>Please make sure you enter both an email address and a password!<br />Go back and try again.</p>';
	}
} 
else 
{ // Display the form.
	?>
	<form action="" method="post">
	<p>Email Address: <input type="text" name="email" size="20" /></p>
	<p>Password: <input type="password" name="password" size="20" /></p>
	<p><input type="submit" name="submit" value="Log In!" /></p>
	</form>
	<?php
}
?>