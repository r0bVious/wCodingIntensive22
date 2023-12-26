<?php
session_start();

$_SESSION["userIP"] = $_SERVER['REMOTE_ADDR'];

?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>r0bChat - Registration / Log In</title>
    <style>
        body {
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background: #141414;
            font-family: monospace;
        }

        .splash-wrapper {
            width: 50%;
            height: 50%;
            display: flex;
            gap: 2em;
        }

        .new-user, .returning-user {
            display: none;
            justify-content: space-evenly;
            align-items: center;
        }

        .welcome-back, .registration {
            width: 50%;
            height: 100%;
            border-radius: 15px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 3em;
            border: 3px solid #141414;

            box-shadow: 5px 5px 0 0 rgb(100, 100, 150);
        }

        .welcome-back {
            background: linear-gradient(linen, cornflowerblue);
        }
        .registration {
            background: linear-gradient(cornflowerblue, linen);
        }

        .visible {
            display: flex;
        }

        form {
            width: 100%;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        input[type="submit"], button {
            background: cornflowerblue;
            height: 3em;
            width: 10em;
        }

        input {
            margin: .5em;
            padding: .5em;
        }

        p {
            font-family: sans-serif;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="splash-wrapper new-user visible">
        <div class="welcome-back">
            <h1>Welcome Back!</h1>
            <p>Already have an account? Sign in and get to chatting!</p>
            <button class="menu-swap-button">Sign In</button>
        </div>
        <div class="registration">
            <h1>Create Account</h1>
            <form action="sign-up.php" method="POST">
                <input type="text" name="login-input" placeholder="Username"/>
                <input type="text" name="email-input" placeholder="Email"/>
                <input type="password" name="password-input" placeholder="Password"/>
                <input type="password" name="password-confirmation-input" placeholder="Password Confirmation"/>
                <input type="submit" value="Register" />
            </form>
        </div>
    </div>
    <div class="splash-wrapper returning-user">
        <div class="welcome-back">
            <h1>Log In</h1>
            <form action="sign-in.php" method="POST">
                <input type="text" name="login-input" placeholder="Username"/>
                <input type="text" name="password-input" placeholder="Password"/>
                <input type="submit" value="Log-In" />
            </form>
        </div>
        <div class="registration">
            <h1>Hey There!</h1>
            <p>You're not a member yet? Get registered here!</p>
            <button class="menu-swap-button">Sign Up</button>
        </div>
    </div>
    <script>
        let newUserSplash = document.querySelector(".new-user"); 
        let returningUserSplash = document.querySelector(".returning-user");
        let swapButtons = document.querySelectorAll(".menu-swap-button");

        swapButtons.forEach(button => button.addEventListener("click", () => {
            newUserSplash.classList.toggle("visible");
            returningUserSplash.classList.toggle("visible");
        }));
    </script>
</body>
</html>