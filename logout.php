

<?php 
//logout page
session_start();

//destroys session (user is logged out)
session_destroy();




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
  <li><a href="index.html">Home</a></li>
  <li><a href="registration.html">Register</a></li>

</ul>
</div>
<h2>
Home
</h2>

<form action="login.php" method="post">
<b>You have logged out.</b> <br>
Already have an account? Login:<br><br>
Username: <input type="text" name="username"><br><br>
Password: <input type="password" name="password"><br><br>
<input type="submit">
</form>
<br><br><br><br><br><br><br>
<footer>
  <p><b>Copyright 2015 Rameen Rastan-Vadiveloo. All Rights Reserved. Contact e-mail: rameenrastanv@hotmail.com </b> </p>
</footer>
</body>

</html>