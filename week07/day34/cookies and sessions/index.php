<?php
session_start();

// Mission 1.
// Create a cookie with a a key of "screen-mode", a value of "dark", and an expiration date of 1 year from now.
setcookie("screen-mode", "dark", time() + 365*24*3600);

// Mission 2. 
// Create a cookie with a a key of "auto-login", a value of "true", and an expiration date of 1 week from now.
setcookie("auto-login", "true", time() + 7*24*3600);

// Mission 3. 
// Create a session variable with a key of "username" and a value of "batman99"
// ** Remember to start the session at the top of the page!

$_SESSION["username"] = "batman99";

// Mission 4.
// Create a session variable with a key of "user_id" and a value of "525"
$_SESSION["user_id"] = "525";

// Mission 5.
// Create an HTML anchor tag with the text "Page 2" that links to page2.php
?><a href="page2.php">Page 2</a>