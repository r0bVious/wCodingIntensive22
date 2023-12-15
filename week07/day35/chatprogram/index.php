<?php
session_start();

$_SESSION["username"] = "";
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
        <input type="text" placeholder="Please type in your username for this chat session" name="user_id">
    </form>
</body>
</html>