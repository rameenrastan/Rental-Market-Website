

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

//Finding a tenant in the user table in the database that matches the owner's preferences
$match = mysqli_query($conn, "SELECT * FROM Users
WHERE Username!='$username' AND Type!='$type' AND Age='$age' AND Income='$income' AND Smoker='$smoker' AND Animal='$animal'");

if( mysqli_num_rows($match) > 0){ 
//Storing the match's information in an associative array
$matchInfo = mysqli_fetch_assoc($match);


//match's information
$matchFirstName=$matchInfo["FirstName"];
$matchLastName=$matchInfo["LastName"];
$matchPets=$matchInfo["Animal"];
$matchSmoker=$matchInfo["Smoker"];
$matchPhone=$matchInfo["Phone"];
$matchEmail=$matchInfo["Email"];
$matchMessage=$matchInfo["Message"];

  }
 else {
 //if no match is found, the match variables are blank
$matchFirstName="";
$matchLastName="";
$matchPets="";
$matchSmoker="";
$matchPhone="";
$matchEmail="";
$matchMessage="";


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
<?php 
//if a match is found, the match's information is shown
if( mysqli_num_rows($match) > 0){  ?>
<p> <b>Here's your match's information (Income & age is hidden for privacy, but it matches your preferences)!:</b><br><br>
First Name: <?php echo $matchFirstName; ?> <br>
Last Name: <?php echo $matchLastName; ?> <br>
Pets: <?php echo $matchPets; ?> <br>
Smokers: <?php echo $matchSmoker; ?> <br>
Phone: <?php echo $matchPhone; ?> <br>
E-mail: <?php echo $matchEmail; ?><br>
Message: <?php echo $matchMessage; ?>



<?php } else { 
//no match found
?>

<p style="color:blue"> Unfortunately, no tenants match your settings at this moment. Please check again soon! </p>

<?php } ?>


 </p>


</div>

<br><br><br><br><br><br><br>
<footer>
  <p><b>Copyright 2015 Rameen Rastan-Vadiveloo. All Rights Reserved. Contact e-mail: rameenrastanv@hotmail.com </b> </p>
</footer>
</body>

</html>