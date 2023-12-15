<?php
session_start();

// Mission 1.
// Check if the cookie with a key of "screen-mode" exists.
// If it does exist and the value is "dark", set the background
// color of the page to be black and the text color to be white.
// Otherwise, the background should be white and the text black.
if ($_COOKIE["screen-mode"] = "dark") {
    $backgroundColor = "#000000";
    $color = "#FFFFFF";
}

// Mission 2.
// Check if the cookie with a key of "auto-login" exists.
// If it does exist, remove the cookie.
if (isset($_COOKIE["auto-login"])) {
    setcookie("auto-login", "", time() - 3600);
}

// Mission 3.
// Check if the session key "username" exists.
// If it does, display "Welcome, <username>!"
// Otherwise, display "Welcome, stranger!"
// ** Remember to start the session

if (isset($_SESSION["username"])) {
    $user = $_SESSION["username"];
} else {
    $user = "stranger";
}

// Mission 4.
// Check if the session key "user_id" exists.
// If it does, give it a new value.
// The new value should be a random number between 1 and 1000.
// Display the value if it exists. ex: "User id: 672"
// Otherwise, display "User id does not exist"
if (isset($_SESSION["user_id"])) {
    $_SESSION["user_id"] = rand(1, 1000);
    $user_id = $_SESSION["user_id"];
} else {
    $user_id = "User id does not exist";
}

// Mission 5.
// Create an HTML anchor tag with the text "Log Out" and an href of "logout.php"
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            background-color: <?= $backgroundColor; ?>;
            color: <?= $color; ?>;
        }
    </style>
</head>
<body>
    <h1>Welcome, <?= $user; ?>!</h1>
    <?= $user_id; ?>
    <br>
    <a href="logout.php">Log Out</a>
</body>
</html>