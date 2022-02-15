

	<?php
	// Flag variable to track success:
	$okay = TRUE;
    if ($_SERVER['REQUEST_METHOD'] == 'POST') 
    {
	// Validate the email address:
	if (empty($_POST['email'])) {
		print "Please enter your email address";
		$okay = FALSE;
	}
	// Validate the password:
	if (empty($_POST['password'])) {
		print "Please enter your password";
		$okay = FALSE;
	}
	// Check the two passwords for equality:
	if ($_POST['password'] != $_POST['confirm']) {
		print "Your confirmed password does not match the original password";
		$okay = FALSE;
	}
	// Validate the year:
	if (is_numeric($_POST['year']) and (strlen($_POST['year']) == 4)) {
		// Check that they were born before 2022.
		if ($_POST['year'] < 2022) {
			$age = 2022 - $_POST['year']; // Calculate age this year.
		} else {
			print "Wrong year entered";
			$okay = FALSE;
		} // End of 2nd conditional.

	} else { // Else for 1st conditional.
		print "Please enter the year you were born as four digits";
		$okay = FALSE;
	} // End of 1st conditional.
    	// Validate the color:
        // if (!isset($_POST['color'])) {
        //     print "please select color";
        //     $okay = FALSE;
        // }

        if(!empty($_POST['color'])) {
            $selected = $_POST['color'];
            echo 'You have chosen: ' . $selected;
        } else {
            echo 'Please select the value.';
            $okay = FALSE;
        }


	// Validate the terms:
	if (!isset($_POST['terms'])) {
		print "You must accept the terms";
		$okay = FALSE;
	}




	// If there were no errors, print a success message:
	if ($okay) {
		print '<p>You have been successfully registered.</p>';
		print "<p>You will turn $age this year.</p>";
		
	}
}
else{
    ?>

    <form action="" method="post">

	<p>Email Address: <input type="text" name="email" size="30" /></p>

	<p>Password: <input type="password" name="password" size="20" /></p>
	
	<p>Confirm Password: <input type="password" name="confirm" size="20" /></p>

	<p>Year You Were Born: <input type="text" name="year" value="YYYY" size="4" /></p>
	
	<p>Favorite Color: 
	<select name="color" id="color">
    <option value="" disabled selected>Choose option</option>
	<option value="red">Red</option>
	<option value="yellow">Yellow</option>
	<option value="green">Green</option>
	<option value="blue">Blue</option>
	</select></p>
	
	<p><input type="checkbox" name="terms" value="Yes" /> I agree to the terms (whatever they may be).</p>

	<input type="submit" name="submit" value="Register" />

</form>
<?php
}
	?>
