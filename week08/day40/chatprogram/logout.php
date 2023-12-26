<?php

session_start();
session_destroy();

if (isset($_COOKIE["screen-mode"])) {
    setcookie("screen-mode", "", time() - 3600);
}

header("Location: index.php");