

<?php
//This file is used for tenant's to view the ad of the owner that matches their settings
session_start();

$username=$_SESSION["Username"];
$age=$_SESSION["Age"];
$income=$_SESSION["Income"];
$animal=$_SESSION["Animal"];
$smoker=$_SESSION["Smoker"];
$type=$_SESSION["Type"];


$conn = mysqli_connect("localhost", "root", "", "rental_7191863");

//Finding an owner in the user table in the database that matches the tenant's settings
$match = mysqli_query($conn, "SELECT * FROM Users
WHERE Username!='$username' AND Type!='$type' AND Age='$age' AND Income='$income' AND Smoker='$smoker' AND Animal='$animal'");

if( mysqli_num_rows($match) > 0){ 
//Storing the match's information in an associative array
$matchInfo = mysqli_fetch_assoc($match);

//using the match's username to find his ad in the property ad table in the database
$matchUsername=$matchInfo["Username"];

//match's contact information
$matchPhone=$matchInfo["Phone"];
$matchEmail=$matchInfo["Email"];

$matchAd = mysqli_query($conn, "SELECT * FROM PropertyAds
WHERE Username='$matchUsername'");

//Store property ad information in associative array


$matchAdInfo = mysqli_fetch_assoc($matchAd);
$title=$matchAdInfo["AdTitle"];
$address=$matchAdInfo["StreetAddress"];
$city=$matchAdInfo["City"];
$province=$matchAdInfo["Province"];
$postalcode=$matchAdInfo["PostalCode"];
$price=$matchAdInfo["Price"];
$message=$matchAdInfo["Message"];
  }
 else {
  //if no match is found, the match variables are blank
$title="";
$address="";
$city="";
$province="";
$postalcode="";
$price="";
$message="";
$matchPhone="";
$matchEmail="";



} 
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
  <li><a href="tenant.php">Tenant Profile & Preferences</a></li> 
   <li><a href="tenantmatches.php">View your Match!</a></li>
     <li><a href="logout.php">Log out</a></li>
</ul>
</div>
<h2> Hi <?php echo $username ?> ! </h2>
<br><br>

<div id="box">
<?php 
//if a match is found, the match's ad is shown
if( mysqli_num_rows($match) > 0){  ?>
<p> <b>Here's the ad of your match!:</b><br><br>
Title: <?php echo $title; ?> <br>
Street Address: <?php echo $address; ?> <br>
City: <?php echo $city; ?> <br>
Province: <?php echo $province; ?> <br>
Postal Code: <?php echo $postalcode; ?> <br>
Price: $<?php echo $price; ?> <br>
Message: <?php echo $message; ?> <br><br>
Here is your match's contact information:<br><br>
Phone: <?php echo $matchPhone; ?> <br>
E-mail: <?php echo $matchEmail; ?>


<?php } else { 
//no match found
?>


<p style="color:blue"> Unfortunately, no owners match your settings at this moment. Please check again soon! </p>

<?php } ?>


 </p>


</div>

<br><br><br><br><br><br><br>
<footer>
  <p><b>Copyright 2015 Rameen Rastan-Vadiveloo. All Rights Reserved. Contact e-mail: rameenrastanv@hotmail.com </b> </p>
</footer>
</body>

</html>