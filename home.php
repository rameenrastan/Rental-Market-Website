
<?php 
//keeps user logged in 
session_start();

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

<div class="navigation">
<ul>
  <li><a href="home.php">Home</a></li>
  <?php 
  //shows this part of the navigation bar if the user is an owner
  if($_SESSION["Type"] == "Owner"){ ?>
  <li><a href="owner.php">Owner's Criteria</a></li>
  <li><a href="properties.php">Create Property Ad</a></li>
    <li><a href="viewpersonalad.php">View your Property Ad</a></li>
	  <li><a href="ownermatch.php">View your match!</a></li>
  <?php } else { 
  //shows this part of the navigation bar if the user is a tenant
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
<!--Displays the user's basic information through the associative array of the current session-->
 <p><b> Welcome <?php echo $_SESSION["FirstName"] ;?>!</b> </p>
 <p> Basic Profile Information: <br>
  Name: <?php echo $_SESSION["FirstName"] . " " . $_SESSION["LastName"]; ?> <br>
  Username: <?php echo $_SESSION["Username"]; ?> <br>
  E-mail:  <?php echo $_SESSION["Email"]; ?>  <br>
  Phone Number: <?php echo $_SESSION["Phone"]; ?><br>
  Registered as: <?php echo $_SESSION["Type"];?> </p>
 
 
  
  
 
 </div>
 <br><br><br><br><br><br><br>
<footer>
  <p><b>Copyright 2015 Rameen Rastan-Vadiveloo. All Rights Reserved. Contact e-mail: rameenrastanv@hotmail.com </b> </p>
</footer>
 </body>
 </html>
