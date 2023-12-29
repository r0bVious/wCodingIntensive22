<?php

if (isset($_POST["username"])) {
    $_SESSION["username"] = $_POST["username"];
} else $_SESSION ["username"] = "Log-In!";

header("Location: index.php");