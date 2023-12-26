<?php
session_start();

$userIP = $_SERVER['REMOTE_ADDR'];
$usernamelist = array ("monkey", "rabbit", "turtle", "salmon", "owl", "mosquito");

$_SESSION["username"] = $usernamelist[rand(0, 5)] . substr($userIP, -2);

?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In</title>
    <style>
        body {
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background: #141414;
        }
    </style>
</head>
<body>
    <form action="chatroom.php" method="post">
        <!-- <input type="text" placeholder="Please type in your username for this chat session" name="user_id"> -->
        <button>Enter Chat</button>
    </form>
</body>
</html>