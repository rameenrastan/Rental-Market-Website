<?php
 //keeps user logged in
session_start();


if($_SERVER["REQUEST_METHOD"]=="POST"){
function test_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}

 //all of the Ad information submitted by the user is stored in php variables
 $title = test_input($_POST['title']);
 $address = test_input($_POST['address']);
 $city = test_input($_POST['city']);
 $province = test_input($_POST['province']);
 $postalcode = test_input($_POST['postalcode']);
 $price = test_input($_POST['price']);
 $message = test_input($_POST['message']);
 $username=$_SESSION["Username"];
 
 //connects to the database
 $conn = mysqli_connect("localhost", "root", "", "rental_7191863");
 
 //checks if the user already created an ad for his property
$checkAdExists = mysqli_query($conn, "SELECT * FROM PropertyAds
WHERE username='$username'");



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

<?php

if($_SERVER["REQUEST_METHOD"]=="POST"){
$username = $_SESSION['Username'];
$conn = mysqli_connect("localhost", "root", "", "rental_7191863");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
//if the user does not have an ad in the database yet, it inserts the new ad into the database as a new entry
if( mysqli_num_rows($checkAdExists) == 0) {
$sql="INSERT INTO PropertyAds (Username, AdTitle, StreetAddress, City, Province, PostalCode, Price, Message)
VALUES ('$username','$title','$address','$city','$province','$postalcode','$price', '$message')";
}
//if the user already has an ad in the database, the old ad's information is updated with the new information submitted by the user
 else {

$sql="UPDATE PropertyAds 
SET AdTitle='$title', StreetAddress='$address', City='$city', Province='$province', PostalCode='$postalcode', Price='$price', Message='$message'
WHERE Username = '$username'";

}
if(mysqli_query($conn, $sql)) {
    $last_id = mysqli_insert_id($conn);
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}




}
?>

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
<h2>
Create Property Ad
</h2>




<form action="properties.php" method="post">
Provide property information and create an ad for your property!<br><br>
<?php if($_SERVER["REQUEST_METHOD"]=="POST"){ ?>
<p style="color:blue"> <b> Property Ad Created! </b> </p>
<?php } ?>

<p style="color:red"> Please fill out the entire form when creating your ad! </p><br><br>
Ad Title: <input type="text" name="title"><br><br>
Street Address: <input type="text" name="address"><br><br>
City: <input type="text" name="city"><br><br>
Province: <input type="text" name="province"><br><br>
Postal Code: <input type="text" name="postalcode"><br><br>
Upload a Picture of your Property:  <input type="file" name="image" accept="image/*"><br><br>
Price: <input type="text" name="price"><br><br>
Personal Message: <br><textarea rows="6" cols="50" name="message" >300 words maximum.</textarea><br><br>
<input type="Submit">
<input type="Reset">

</form>
<br><br><br><br><br><br><br>
<footer>
  <p><b>Copyright 2015 Rameen Rastan-Vadiveloo. All Rights Reserved. Contact e-mail: rameenrastanv@hotmail.com </b> </p>
</footer>
</body>

</html>