<?php
$message = "default message";
if (isset($_GET["message"])) { $message = $_GET["message"]; }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Sandbox</title>
    <style>
        body {
            height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            background: url("../../week02/day07/ex01_warm-up/rose.jpg");
        }

        div {
            font-size: 5em;
            font-family: Arial, "Helvetica Neue", Helvetica, sans-serif;
        }
    </style>
</head>
<body>
    <div class="temp"><?= $_GET["number"]; ?></div>
    <div class="weather"><?= $_GET["weather"]; ?></div>
    <div class="message"><?= $message; ?></div>
</body>
</html>