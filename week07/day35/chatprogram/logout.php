<?php

// Mission 1. 
// Destroy the user's session
// ** Remember to start it first
session_start();
session_destroy();

// Mission 2.
// Check if the cookie with a key of "screen-mode" exists.
// If it does exist, remove the cookie.
if (isset($_COOKIE["screen-mode"])) {
    setcookie("screen-mode", "", time() - 3600);
}

// Mission 3.
// Send the user back to page2.php
// ** Remember the header function we saw yesterday
header("Location: index.php");
exit();