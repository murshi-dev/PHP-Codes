<html>
<head>
	<title>Feedback Form</title>
</head>
<body>

<div><p>Please complete this form to submit your feedback:</p>

<form action="" method="POST">

	<p>Name: <select name="title">
	<option value="Mr.">Mr.</option>
	<option value="Mrs.">Mrs.</option>
	<option value="Ms.">Ms.</option>
	</select> <input type="text" name="name" size="20" /></p>

	<p>Email Address: <input type="text" name="email" size="20" /></p>

	<p>Response: This is...	
	<input type="radio" name="response" value="excellent" /> excellent
	<input type="radio" name="response" value="okay" /> okay
	<input type="radio" name="response" value="boring" /> boring</p>

	<p>Comments: <textarea name="comments" rows="3" cols="30"></textarea></p>

	<input type="submit" name="submit" value="Send My Feedback" />

</form>

<?php 

if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $title = $_POST['title'];
    $name = $_POST['name'];
    $response = $_POST['response'];
    $comments = $_POST['comments'];
    
    // Print the received data:
    print "<p>Thank you, $title $name, for your comments.</p>
    <p>You stated that you found this example to be '$response' and added:<br />$comments</p>";

}


?>



</div>
</body>
</html>