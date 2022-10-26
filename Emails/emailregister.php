<?php
$email = "";
if (count($_POST) > 0) {
    /* Validation to ensure all fields are non-empty */
    foreach ($_POST as $key => $value) {
        if (empty($_POST[$key])) {
            $message = ucwords($key) . " field is required";
            break;
        }
    }

    /* Validation to ensure gender is selected */
    if (!isset($message)) {
        if (!isset($_POST["gender"])) {
            $message = " Gender field is required";
        }
    }
    /* Validation to ensure usertype is selected */
    if (!isset($message)) {
        if (!isset($_POST["userType"])) {
            $message = " usertype field is required";
        }
    }

    /* Validation to ensure about if the checkbox is checked or not */
    if (!isset($message)) {
        if (!isset($_POST["terms"])) {
            $message = " Check the box to accept Terms and conditions";
        }
    }

    if (!isset($message)) {
        $message = "You have registered successfully!";
        $email = $_POST["userEmail"];
        unset($_POST);
    }
}
?>
<html>

<head>
    <title>Registration Form</title>
</head>

<body>
    <div align="center">
        <form name="frmRegistration" method="post" action="">
            <h2>Registration Form</h2>
            <br>
            <table>
                <tr>
                    <td> Username</td>
                    <td><input type="text" name="userName" value="<?php if (isset($_POST['userName'])) echo $_POST['userName']; ?>"></td>
                </tr>

                <tr>
                    <td> Password</td>
                    <td><input type="password" name="password" value="<?php if (isset($_POST['password'])) echo $_POST['password']; ?>"></td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td><input type="email" name="userEmail" value="<?php if (isset($_POST['userEmail'])) echo $_POST['userEmail']; ?>"></td>
                </tr>
                <tr>
                    <td>Display Name</td>
                    <td><input type="text" name="displayName" value="<?php if (isset($_POST['displayName'])) echo $_POST['displayName']; ?>"></td>
                </tr>
                <tr>
                    <td>Gender</td>
                    <td> <input type="radio" name="gender" value="Male" <?php if (isset($_POST['gender']) && $_POST['gender'] == "Male") { ?>checked<?php  } ?>> Male
                        <input type="radio" name="gender" value="Female" <?php if (isset($_POST['gender']) && $_POST['gender'] == "Female") { ?>checked<?php  } ?>> Female
                    </td>
                </tr>
                <tr>
                    <td>User Type</td>
                    <td> <select name="userType">
                            <option value="">--Select--</option>
                            <option value="Member" <?php if (isset($_POST['userType']) && $_POST['userType'] == "Member") { ?>selected<?php  } ?>>Member</option>
                            <option value="Premium User" <?php if (isset($_POST['userType']) && $_POST['userType'] == "Premium User") { ?>selected<?php  } ?>>Premium User</option>
                        </select></td>
                </tr>
                <tr>
                    <td>Address</td>
                    <td><textarea rows="3" cols="20" name="userAddress"><?php if (isset($_POST['userAddress'])) echo $_POST['userAddress']; ?></textarea></td>
                </tr>
                <tr>
                    <td colspan="2"> <input type="checkbox" name="terms"> I accept Terms and Conditions</td>

                </tr>
                <tr>
                    <td colspan="2" align="center"><input type="submit" name="submit" value="Submit"></td>
                </tr>
            </table>
            <div align="center"><?php if (isset($message)) {
                                    echo $message;
                                    echo "<br>";
                                    $receiver = "$email";
                                    $subject = "Email Test via PHP using Localhost";
                                    $body = "Hi, You have successfuly registered.";
                                    $sender = "demodummymailer@gmail.com";

                                    if (mail($receiver, $subject, $body, $sender)) {
                                        echo "Email sent successfully to $receiver";
                                    } else {
                                        echo "Sorry, failed while sending mail!";
                                    }
                                }
                                ?>
            </div>
        </form>
    </div>
</body>

</html>