<?php
function test_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}
//all the information from the registration form is stored in php variables
 $firstName = test_input($_POST['firstName']);
 $lastName = test_input($_POST['lastName']);
 $email = test_input($_POST['email']);
 $phone = test_input($_POST['phone']);
 $password = test_input($_POST['password']);
 $confirmPass = test_input($_POST['confirmPass']);
 $username = test_input($_POST['username']);
 $type = test_input($_POST["type"]); 
 
 
 $firstNameError="";
 $lastNameError="";
 $emailError="";
 $passwordError="";
 $confirmPassError="";
 $passError="";
 $usernameError="";
 $phoneError="";
 
 
 //if the values do not match the regular expression patterns, the form does not submit (error is true, and error message variable is created)
 //if statements check if each of the values match the regular expression patterns
    if (!preg_match("/^[A-Za-z]+\-?[A-Za-z]*$/",$firstName)) {
      $firstNameError="Invalid first name.";
	  $error=TRUE;
    }
	

  if (!preg_match("/^[A-Za-z]+\-?[A-Za-z]*$/",$lastName)) {
      $lastNameError="Invalid last name.";
	  $error=TRUE;
    }
  if (!preg_match("/^\({1}[0-9]{3}\){1}[0-9]{3}\-{1}[0-9]{4}$/",$phone)) {
      $phoneError="Invalid phone number.";
	  $error=TRUE;
    }
  if (!preg_match("/^\w+\@[A-Za-z]+\.[a-z]+$/",$email)) {
      $emailError="Invalid email address.";
	  $error=TRUE;
    }
	
  if (!preg_match("/^[A-Za-z0-9]{6,}$/",$username)) {
      $usernameError="Invalid username.";
	  $error=TRUE;
    }	
	
	//connecting to the mySQL database
	$conn = mysqli_connect("localhost", "root", "", "rental_7191863");

	//checking if the username enterred in the registration form already exists in the database
    $loginInfo = mysqli_query($conn, "SELECT * FROM Users
WHERE username='$username'");

//if the username already exists (rows>0), an error is created (username is already taken) and the form is not submitted
if(mysqli_num_rows($loginInfo) > 0){
$usernameError="Username already taken.";
$error=TRUE;

}


	
	
	  if (!preg_match("/^(?=.*\d)(?=.*([A-Z]|[a-z]))[A-Za-z0-9]{6,}$/",$password)) {
      $passwordError="Invalid password.";
	  $error=TRUE;
    }	
	if (!preg_match("/^(?=.*\d)(?=.*([A-Z]|[a-z]))[A-Za-z0-9]{6,}$/",$confirmPass)) {
      $passError="Invalid password.";
	  $error=TRUE;
    }	
	//checking if the password and confirm password match
	if (strcasecmp($password,$confirmPass) != 0){
	$confirmPassError="Passwords are not matching.";
	$error=TRUE;
	
	}


?>



<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8"> 
<link rel="stylesheet" type="text/css" href="rentalmarket.css">
<script src="rentalmarket.js"></script>
<title>
<?php if ( isset($error) ) {?>
Registration Failed
<?php } else { ?> 
Welcome!
<?php } ?>
</title>
</head>

<body>
<div class="header">
<h1>
Rameen's Rental Matching Market
</h1>
</div>
</div>


<?php if ( isset($error) ) {

//if there is an error this if statement is true, the form is not submitted and all the error messages are displayed next to the corresponding text fields in red

?>
<div class="navigation">
<ul>
  <li><a href="index.html">Home</a></li>
  <li><a href="registration.html">Register</a></li>
</ul>
</div>
<br><br>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
Follow these easy steps to register your free account today! <br>
<span class="error"> Note: All fields are required. </span><br><br>


First Name (letters and dash only): <input type="text" name="firstName" id="firstName" value="<?php echo $firstName;?>"> <span class="error"><?php echo $firstNameError;?> </span><br><br>
Last Name (letters and dash only): <input type="text" name="lastName" id="lastName" value="<?php echo $lastName;?>"><span class="error"> <?php echo $lastNameError;?></span><br><br>
Registered as: 
<select name="type" value="<?php echo $type;?>">
<option value="Tenant">Tenant</option>
<option value="Owner">Property Owner</option>
</select>
<br><br>
Phone Number: <input type="text" id="phone" name="phone" value="<?php echo $phone;?>"> <span class="error"><?php echo $phoneError;?></span><br><br>
Email address (form: example123@example.com): <input type="text" name="email" id="email" value=<?php echo $email;?>><span class="error"> <?php echo $emailError;?> </span><br><br>
Login Name (letters and digits only, 6 characters min.): <input type="text" name="username" id="username"  value="<?php echo $username;?>"> <span class="error"><?php echo $usernameError;?></span><br><br>
Password (letters and digits only, at least 1 of each, 6 characters min.): <input name="password" type="password" id="password"> <span class="error"><?php echo $passwordError;?> </span> <br><br>
Confirm Password: <input type="password" name="confirmPass" id="confirmPassword"> <span class="error"><?php echo $confirmPassError;?> </span><br><br>

<input type="Submit" onclick="checkForm()"s>
<input type="Reset">

</form>

<?php } else {
//if there is NO error the else statement is true, the form is properly submitted and the user's information is displayed. The user can now go to the home page and log in.
 ?> 
<div class="navigation">
<ul>
  <li><a href="index.html">Home</a></li>
</ul>
</div>
<div id="box">
 <b>Welcome <?php echo $_POST["firstName"]; ?> ! </b> <br> 
 Your email address is: <b>  <?php echo $_POST["email"]; ?> </b> <br>
 Your username is: <b> <?php echo $_POST["username"];  ?> </b> <br>
 Your phone number is: <b>  <?php echo $_POST["phone"]; ?> </b> <br>
 You are registered as a: <b> <?php echo $_POST["type"];  ?> </b>

 <br><br>
 Please go to the Home page to login with your account to access the website's features!
 
 </div>
<?php

//connecting to the MySQL database (name rental_7191863)
$conn = mysqli_connect("localhost", "root", "", "rental_7191863");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

//inserting all of the registration information into a new entry in the "Users" table in the Database
$sql = "INSERT INTO Users (FirstName, LastName, Type, Username, Phone, Email, Password)
VALUES ('$firstName', '$lastName', '$type', '$username', '$phone', '$email', '$password')";

if (mysqli_query($conn, $sql)) {
    $last_id = mysqli_insert_id($conn);
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>

<?php } ?>
</div>
<br><br><br><br><br><br><br>
<footer>
  <p> <b>Copyright 2015 Rameen Rastan-Vadiveloo. All Rights Reserved. Contact e-mail: rameenrastanv@hotmail.com </b> </p>
</footer>
</body>
</html>
