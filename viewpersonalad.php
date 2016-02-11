<?php
//keeps user logged in
session_start();

$username=$_SESSION['Username'];

//connects to database
$conn = mysqli_connect("localhost", "root", "", "rental_7191863");

//finds the user's ad information (finds the ad in the PropertyAds database that corresponds to the user's username)
$adInfo = mysqli_query($conn, "SELECT * FROM PropertyAds
WHERE username='$username'");

//puts the ad information into an associative array
$userAd = mysqli_fetch_assoc($adInfo);

//puts the ad associative array into the current session's associative array
$_SESSION["AdTitle"]=$userAd["AdTitle"];
$_SESSION["StreetAddress"]=$userAd["StreetAddress"];
$_SESSION["City"]=$userAd["City"];
$_SESSION["Province"]=$userAd["Province"];
$_SESSION["PostalCode"]=$userAd["PostalCode"];
$_SESSION["Price"]=$userAd["Price"];
$_SESSION["Message"]=$userAd["Message"];

 ?>

<!DOCTYPE HTML>

<html>
<head>
<meta charset="utf-8"> 
<link rel="stylesheet" type="text/css" href="rentalmarket.css">
<title>
Property
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
  <li><a href="owner.php">Owner's Criteria</a></li>
  <li><a href="properties.php">Create Property Ad</a></li>
   <li><a href="viewpersonalad.php">View your Property Ad</a></li>
     <li><a href="ownermatch.php">View your match!</a></li>
	   <li><a href="logout.php">Log out</a></li>
</ul>
</div>
<h2> Hi <?php echo $username ?> ! </h2>
<br><br>
<div id="box">
<p> <b>Your ad:</b><br><br>
<!-- Displays the user's ad for his own viewing using the session associative array -->
Title: <?php echo $_SESSION["AdTitle"]; ?> <br>
Street Address: <?php echo $_SESSION["StreetAddress"]; ?> <br>
City: <?php echo $_SESSION["City"]; ?> <br>
Province: <?php echo $_SESSION["Province"]; ?> <br>
Postal Code: <?php echo $_SESSION["PostalCode"]; ?> <br>
Price: $<?php echo $_SESSION["Price"]; ?> <br>
Message: <?php echo $_SESSION["Message"]; ?> <br>




 </p>


</div>

<br><br><br><br><br><br><br>
<footer>
  <p><b>Copyright 2015 Rameen Rastan-Vadiveloo. All Rights Reserved. Contact e-mail: rameenrastanv@hotmail.com </b> </p>
</footer>
</body>

</html>