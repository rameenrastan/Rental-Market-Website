<?php
session_start();

if($_SERVER["REQUEST_METHOD"]=="POST"){
function test_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}

//stores information of the form into php variables
$price = test_input($_POST['price']);
 $age = test_input($_POST['age']);
 $income = test_input($_POST['income']);
 $pets = test_input($_POST['pets']);
 $smokers = test_input($_POST['smokers']);
 $message = test_input($_POST['message']);
 $animals = test_input($_POST['pets']);
 
 

 
	


	}
	
	?>
	
<!DOCTYPE HTML>

<html>
<head>
<meta charset="utf-8"> 
<link rel="stylesheet" type="text/css" href="rentalmarket.css">
<title>
Tenant Profile
</title>
</head>

<body>
<?php

//connecting to MySQL database, updates the Tenant Information in the database for the user that is logged in.

if($_SERVER["REQUEST_METHOD"]=="POST"){
//using username of the user currently logged in (using the current session)
$username = $_SESSION['Username'];
$conn = mysqli_connect("localhost", "root", "", "rental_7191863");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


//updating all the information they entered in the form into their entry in the database
if(mysqli_query($conn,"UPDATE Users 
SET Age='$age', Income='$income', Smoker='$smokers', Animal='$animals', Price='$price', Message='$message'
WHERE Username = '$username'")) {
    $last_id = mysqli_insert_id($conn);
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
  <li><a href="tenant.php">Tenant Profile & Preferences</a></li>
   <li><a href="tenantmatches.php">View your Match!</a></li>
      <li><a href="logout.php">Log out</a></li>
</ul>
</div>
<h2>
Tenant Profile

</h2>




<form action="tenant.php" method="post">
<?php if($_SERVER["REQUEST_METHOD"]=="POST"){ 
//message confirming that profile was updated
?>

<p style="color:blue"> <b> Profile settings updated! </b> </p>
<?php } ?>
<br>
Customize your profile so that you will find a suitable property that will meet your qualifications and preferences!<br><br>
<p style="color:red"> Note: Please fill out the entire form when updating your profile! </p><br><br>
<b>Age:</b><br>
18-25<input type="radio" name="age" value="18" checked>
26-35<input type="radio" name="age" value="26">
36-45<input type="radio" name="age" value="36">
46-55<input type="radio" name="age" value="46"><br>
56-65<input type="radio" name="age" value="56">
66-75<input type="radio" name="age" value="66">
76-85<input type="radio" name="age" value="76">
86+<input type="radio" name="age" value="86">
<br><br>
<b>Income:</b> <br>
15,000+<input type="radio" name="income" value="15" checked>
25,000+<input type="radio" name="income" value="25">
35,000+<input type="radio" name="income" value="35">
45,000+<input type="radio" name="income" value="45"><br>
55,000+<input type="radio" name="income" value="55">
65,000+<input type="radio" name="income" value="65">
75,000+<input type="radio" name="income" value="75">
85,000+<input type="radio" name="income" value="85"><br>
100,000+<input type="radio" name="income" value="100">
<br><br>
Pets: <input type="radio" name="pets" value="Yes" > Yes 
<input type="radio" name="pets" value="No" checked>No <br>
<br>
Smokers: <input type="radio" name="smokers" value="Yes"> Yes 
<input type="radio" name="smokers" value="No" checked>No <br>
<br><br>

<b>Property Preferences:</b><br><br>
Price (monthly): <br><br>
<input type="radio" name="price" value="100" checked>100-200<br>
<input type="radio" name="price" value="200">200-300<br>
<input type="radio" name="price" value="300" checked>300-400<br>
<input type="radio" name="price" value="400">400-500<br>
<input type="radio" name="price" value="500" checked>500-600<br>
<input type="radio" name="price" value="600">600-700<br>
<input type="radio" name="price" value="700" checked>700-800<br>
<input type="radio" name="price" value="800">800-900<br>
<input type="radio" name="price" value="900" checked>900-1000<br>
<input type="radio" name="price" value="1000">1000+
<br><br>
Personal Message:<br>
<textarea rows="6" cols="50" name="message" >300 words maximum.</textarea><br><br>


<input type="Submit">
<input type="Reset">

</form>
<br><br><br><br><br><br><br>
<footer>
  <p> <b>Copyright 2015 Rameen Rastan-Vadiveloo. All Rights Reserved. Contact e-mail: rameenrastanv@hotmail.com </b> </p>
</footer>
</body>

</html>	