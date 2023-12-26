<?php
session_start();

if (isset($_POST)) {
    $_SESSION["username"] = htmlspecialchars($_POST["user_id"]);
}

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

        ul {
            list-style: none;
            padding: 0px 10px;
            width: 100%;
        }

        li {
            padding: 5px 0;
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
            background: WhiteSmoke;
            box-shadow: 0px 0px 0 10px cornflowerblue;
            display: flex;
            justify-content: center;
            
        }

        form {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            width: 100%;
        }

        input[type="text"] {
            width: 90%;
            font-size: 1.5em;
        }

        .button-zone {
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 1em;
        }

        .button-zone input[type="button"], .logoutbutt {
            background: cornflowerblue;
            height: 2em;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        a, .button-zone input[type="button"] {
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
        }
        
        .radios {
            display: flex;
            flex-direction: column;
            color: linen;
        }

        .usernames {
            font-weight: bold;
        }

    </style>
</head>
<body>
    <div class="chat-wrapper">
        <div id="chat-window">
            <ul id="chat-text"> <!-- begin chat -->
            
            </ul>
        </div>
        <div id="send-form">
            <input type="text" name="message" id="msg_field" autocomplete="off" placeholder="">
            <div class="button-zone">
                <input type="button" class="logoutbutt" id="send" value="Send Message">
                <input type="button" class="logoutbutt" id="refresh" value="Refresh">
                <div class="radios">
                    <span><input type="radio" name="msgcount" value="10" id="radio10">10</input></span>
                    <span><input type="radio" name="msgcount" value="20" id="radio20">20</input></span>
                    <span><input type="radio" name="msgcount" value="9999" id="radioAll">All</input></span>
                </div>
            </div>
            <a href="logout.php"><div class="logoutbutt">Log Out</div></a>
        </div>
    </div>

    <script>
    let refreshButton = document.querySelector("#refresh");
    let sendButton = document.querySelector("#send");
    let chatWindow = document.querySelector("#chat-window");
    let inputBox = document.querySelector("#msg_field");
    let chatBox = document.querySelector("#chat-text");
    let selectedRadio;

    refreshButton.addEventListener("click", () => {
        selectedRadio = document.querySelector("input[name='msgcount']:checked");
        fetchChat();
    });

    sendButton.addEventListener("click", sendChat);

    function populateChat(inData) {
        chatBox.innerHTML = "";

        for (let i = 0; i < selectedRadio.value - 1; i++) {
            const newLine = document.createElement("li");
            const username = inData[i].userid;
            const message = inData[i].message;
            const timestamp = inData[i].date_created;
            newLine.innerHTML = "<span style='font-size: .5em'>" + timestamp + "</span><br>" + " <span class='usernames' title='<?= $_SESSION["userIP"] ?>'>" + username + "</span>: " + message;
            chatBox.append(newLine);
        }

    }

    async function sendChat() {
        try {
            const response = await fetch("chatDBsend.php", {
                method: "POST",
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify(["", "<?= $_SESSION["username"] ?>", inputBox.value])
        });
        } catch (error) {
            console.error("Error fetching chatlog:", error);
        }
        inputBox.value = "";
    }

    async function fetchChat() {
        try {
            const response = await fetch("chatDBreceive.php")                    
                    .then(response => response.json())
                    .then(data => {
                        populateChat(data);
                    });
        } catch (error) {
            console.error("Error fetching chatlog:", error);
        }
    }

    </script>
</body>
</html>