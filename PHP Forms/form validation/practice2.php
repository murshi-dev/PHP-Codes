<?php
//form validation goes here
//check if any $_POST is submitted
if(count($_POST)>0){
    //use foreach loop to check for empty entries
    foreach($_POST as $key =>$value){
        //$key replaces each control's name
        if(empty($_POST[$key]))
        {
        $message=$key. 'is required';
         } 
    }
    //validation for radio button to check if selected
    if(!isset($message))
    {
        if(!isset($_POST['gender']))
        {
            $message='gender field is required';
        }
    }
    //validation for select option if selected
    if(!isset($message))
    {
        if(!isset($_POST['usertype']))
        {
            $message='user type field is required';
        }
    }
      //validation for check box selection
      if(!isset($message))
      {
          if(!isset($_POST['terms']))
          {
              $message='Please check terms and conditions';
          }
      }
      //for successful registartion
      if(!isset($message))
      {
          $message='Registration Successful';
      }
}
?>
<html>
<body>
    <div align="center">
        <form action="" method="POST">
            <table>
                <tr>
                    <td>Username: </td>
                    <td><input type="text" name="username" value= <?php if(isset($_POST['username'])) echo $_POST['username']; ?> ></td>
                </tr>
                <tr>
                    <td>Password: </td>
                    <td> <input type="password" name="password" value= <?php if(isset($_POST['password'])) echo $_POST['password']; ?>></td>
                </tr>
                <tr>
                    <td>Email: </td>
                    <td> <input type="email" name="email" value= <?php if(isset($_POST['email'])) echo $_POST['email']; ?>></td>
                </tr>
                <tr>
                    <td>DisplayName: </td>
                    <td><input type="text" name="displayname" value= <?php if(isset($_POST['displayname'])) echo $_POST['displayname']; ?>>
                    </td>
                </tr>
                <tr>
                    <td>Gender</td>
                    <td><input type="radio" name="gender" value="male" <?php if(isset($_POST['gender']) && $_POST['gender']=='male'){ ?> checked <?php } ?> >Male
                    <input type="radio" name="gender" value="female"  <?php if(isset($_POST['gender']) && $_POST['gender']=='female'){ ?> checked <?php } ?>    >Female </td>
                </tr>
                <tr>
                    <td>User Type</td>
                    <td>
                        <select name="usertype">
                            <option value="basic" <?php if(isset($_POST['usertype']) && $_POST['usertype']=='basic'){ ?> selected <?php } ?>>Basic</option>
                            <option value="premium">Premium</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Address</td>
                    <td><textarea name="address" cols="30" rows="3">
                    <?php if(isset($_POST['address'])) echo $_POST['address']; ?>
                    </textarea></td>
                </tr>
                <tr>
                    <td><input type="checkbox" name="terms">I accept terms and conditions</td>
                </tr>
                <tr>
                    <td><input type="submit" name="submit" value="Register"></td>
                </tr>
            </table>
    <!-- display error message her -->
    <div align="center">
        <?php if(isset($message))//checks for $message has been entered
        {
            echo $message;
        }
        ?>
    </div>
        </form>
    </div>

</body>

</html>