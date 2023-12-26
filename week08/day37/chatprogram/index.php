<?php
session_start();

// $ipArr = explode(".", $_SERVER['REMOTE_ADDR']);
// $_SESSION["userIP"] = $ipArr[2] . $ipArr[3];

$_SESSION["userIP"] = $_SERVER['REMOTE_ADDR'];

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
        form {
            display: flex;
            flex-direction: column;
            gap: 1em;
        }

        input {
            width: 400px;
            font-size: 1.25em;
        }

        button {
            background: cornflowerblue;
            color: linen;
            text-decoration: none;
            text-shadow:
                1px 1px 0 #000,
                -1px 1px 0 #000,
                -1px -1px 0 #000,
                1px -1px 0 #000;
            font-family: monospace;
            text-align: center;
            font-size: 1.5em;
            width: 35%;
            align-self: center;
        }
    </style>
</head>
<body>
    <form action="chatroom.php" method="POST">
        <input type="text" placeholder="Please Enter Username" name="user_id" autocomplete="off">
        <button>Enter Chat</button>
    </form>
</body>
</html>