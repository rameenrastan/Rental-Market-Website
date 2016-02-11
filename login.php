<?php

//stores the username and password submitted in the log in form into php variables
$username = $_POST['username'];
$password = $_POST['password'];

//connect to database
$conn = mysqli_connect("localhost", "root", "", "rental_7191863");


//takes the data from the entry in the database that matches the submitted username/password combination
$loginInfo = mysqli_query($conn, "SELECT * FROM Users
WHERE username='$username' AND password='$password'");





?>

<!DOCTYPE HTML>

<html>
<head>
<meta charset="utf-8"> 
<link rel="stylesheet" type="text/css" href="rentalmarket.css">
<title>
Home
</title>
</head>

<body>

<div class="header">
<h1>
Rameen's Rental Matching Market
</h1>
</div>


<?php
//this if statement is true if the login information is valid (it finds an entry in the database that matches the username/password combination)
if( mysqli_num_rows($loginInfo) > 0){ 

//starts the session
 session_start();
 
 //creates an associative array, putting all the information from the database entry into a php variable
$user = mysqli_fetch_assoc($loginInfo);

//the session's associative array is given all the login information, the session will now have all of the user's information
$_SESSION["FirstName"]=$user["FirstName"];
$_SESSION["LastName"]=$user["LastName"];
$_SESSION["Username"]=$user["Username"];
$_SESSION["Phone"]=$user["Phone"];
$_SESSION["Email"]=$user["Email"];
$_SESSION["Password"]=$user["Password"];
$_SESSION["Type"]=$user["Type"];
$_SESSION["Age"]=$user["Age"];
$_SESSION["Income"]=$user["Income"];
$_SESSION["Animal"]=$user["Animal"];
$_SESSION["Smoker"]=$user["Smoker"];
$_SESSION["Message"]=$user["Message"];

 ?>
 <div class="navigation">
<ul>
  <li><a href="home.php">Home</a></li>
  <?php 
  //if user is an owner, this part of the navigation menu is shown
  if($_SESSION["Type"] == "Owner"){ ?>
  <li><a href="owner.php">Owner's Criteria</a></li>
  <li><a href="properties.php">Create Property Ad</a></li>
    <li><a href="viewpersonalad.php">View your Property Ad</a></li>
	  <li><a href="ownermatch.php">View your match!</a></li>
  <?php } else {
//if the user is a tenant, this part of the navigation menu is shown
  ?>
  <li><a href="tenant.php">Tenant Profile & Preferences</a></li> 
  <li><a href="tenantmatches.php">View your Match!</a></li>
  <?php } ?>
    <li><a href="logout.php">Log out</a></li>
</ul>
</div>
<h2>
Home
</h2>
<p>
Welcome to the Rental Matching Market! Our services permit tenants and property owners to find compatible matches easily based on their preferences. All you need to do is register your account today, customize your profile, and begin your search!
</p>
<div id="box">
 <p><b> Welcome <?php echo $_SESSION["FirstName"] ;?>!</b> </p>
 <p> Basic Profile Information: <br>
  Name: <?php echo $_SESSION["FirstName"] . " " . $_SESSION["LastName"]; ?> <br>
  Username: <?php echo $_SESSION["Username"] ?> <br>
  E-mail:  <?php echo $_SESSION["Email"] ?>  <br>
  Phone Number: <?php echo $_SESSION["Phone"] ?><br>
  Registered as: <?php echo $_SESSION["Type"] ?> </p>
  
 
 </div>
<?php } else { 
//if the login information (username/password combination) was incorrect, the user is not logged in (a session is not created)
?> 
<div class="navigation">
<ul>
  <li><a href="index.html">Home</a></li>
  <li><a href="registration.html">Register</a></li>
 
</ul>
</div>

<h2>
Home
</h2>
<p>
Welcome to the Rental Matching Market! Our services permit tenants and property owners to find compatible matches easily based on their preferences. All you need to do is register your account today, customize your profile, and begin your search!
</p>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
<span class="error">Invalid Username/Password combination.</span><br><br>
Already have an account? Login:<br><br>
Username: <input type="text" name="username"><br><br>
Password: <input type="password" name="password"><br><br>
<input type="submit">
</form>


<?php } ?>



<br><br><br><br><br><br><br>
<footer>
  <p><b>Copyright 2015 Rameen Rastan-Vadiveloo. All Rights Reserved. Contact e-mail: rameenrastanv@hotmail.com </b> </p>
</footer>
</body>

</html>