<?php
session_start();
// if (isset($_POST)) {
//     $_SESSION["username"] = $_POST["user_id"];
// }

$userIP = $_SERVER['REMOTE_ADDR'];
// $ipArray = explode(".", $userIP);
// $ipTotal = 0;
// foreach ($ipArray as $num) {
//     $ipTotal = $ipTotal + intval($num);
// }
$usernamelist = array ("monkey", "rabbit", "turtle", "salmon", "owl", "mosquito");

$_SESSION["username"] = $usernamelist[rand(0, 5)] . substr($userIP, -2);
// $_SESSION["username"] = $usernamelist[rand(0, 5)] . $ipTotal;

?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat</title>
    <style>
        body {
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background: #141414;
        }

        .chat-wrapper {
            display: flex;
            flex-direction: column;
        }

        #chat-window {
            width: 500px;
            height: 500px;
            margin-bottom: 1em;
            border: 2px solid black;
            overflow: scroll;
            font-family: sans-serif;
            font-size: 1.25em;
            background: #FBFBFB;
            box-shadow: 0px 0px 0 10px lightgreen;
        }

        form {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        input {
            width: 80%;
            font-size: 1.5em;
        }

        .logoutbutt {
            background: lightgreen;
            height: 2em;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        a {
            color: linen;
            text-decoration: none;
            text-shadow: 1px 1px black;
            font-family: monospace;
            text-align: center;
            margin-top: 1em;
            font-size: 1.5em;
            width: 35%;
        }

    </style>
</head>
<body>
    <div class="chat-wrapper">
        <div id="chat-window"></div>
        <form id="form">
            <input type="text" name="message" id="msg_field" autocomplete="off" placeholder="Let 'em know">
            <!-- <button id="form-sub" type="submit">Send Message</button> -->
            <a href="logout.php"><div class="logoutbutt">Log Out</div></a>
        </form>
        <script>
            function updateChat() {
                fetch("chatlog.txt")
                    .then(response => response.text())
                    .then(data => {
                        document.getElementById("chat-window").innerHTML = data;
                    })
                    .catch(error => {
                console.error('Error fetching chatlog:', error);
            });
            }
    
            updateChat();
            setInterval(updateChat, 1000);

            document.getElementById("form").addEventListener("submit", function(event) {
                event.preventDefault();

                const formData = {
                    message: document.querySelector("#msg_field").value
                }

                fetch("chatserver.php", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json"
                    },
                    body: JSON.stringify(formData)
                })
                .then(response => {
                    if (response.ok) {
                        // Update the chat window after sending the message
                        updateChat();
                        document.getElementById("form").reset();
                    }
                })
            });
        </script>
    </div>
    
</body>
</html>