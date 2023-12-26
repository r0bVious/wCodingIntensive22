<?php
session_start();

try {
    $db = new PDO('mysql:host=localhost;dbname=intensive;charset=utf8', 'root');
}
catch(Exception $e) {
    die('Error : ' . $e->getMessage());
}

$getNewest = $db -> prepare('SELECT MAX(id) FROM articles');
$getNewest -> execute();

$chosenArticle = $getNewest -> fetch(PDO::FETCH_ASSOC);
$articleID = $chosenArticle["id"];

$userName = "Log in!";
if ($_SESSION["username"]) {
    $userName = $_SESSION["username"];
}

if (isset($_GET["page"])) {
    $articleID = $_GET["page"];
}

?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog Exercise</title>
    <link rel="stylesheet" href="styles.css" />
</head>
<body>

<!-- LOG IN PROMPT -->
<div class="log-in-prompt">
<h1>Log-in to view content and post comments!</h1>  
    <form action="login.php" method="POST">
        <input type="text" id="log-in-text" placeholder="Enter a username" name="username"/>
        <button id="log-in-button">Log-in</button>
    </form>
</div>

    <h1 id="page-head">Blog Exercise</h1> <!-- stays static -->

        <!-- NAV, ON RIGHT (flex-direction: row-reverse'd) -->
        <nav>
        <h1>Recent Articles</h1>
        <ul class="nav-list">
            <?php
            $getNavLinks = $db -> prepare('SELECT title, DATE_FORMAT(date_created, "%Y/%m/%d") as date, id FROM articles ORDER BY id DESC');
            $getNavLinks -> execute();

            $navLinks = $getNavLinks -> fetchAll(PDO::FETCH_ASSOC); //gets titles and dates for populating nav w/ article links
            forEach($navLinks as $entry) {
            ?>
                <a href="index.php?page=<?= $entry["id"] ?>"><li class="link-title"><?= $entry["title"] ?> - <?= $entry["date"] ?></li></a>
            <?php
            }
            $getNavLinks -> closeCursor();
            ?>
        </ul>
    </nav>

<div class="page">
    <!-- PAGE CONTENT -->
    <div class="content-wrapper">
        <!-- ARTICLE AREA, COMMENTS BELOW -->
        <div class="article-wrapper">
            <?php 
                $articleCall = $db -> prepare('SELECT title, tag, author, content, date_created FROM articles WHERE id = :articleID');
                $articleCall -> execute(array(
                    "articleID" => $articleID //created at the top, either from most recent article id in $db or from $_GET
                ));

                $articleRetrieve = $articleCall -> fetch(PDO::FETCH_ASSOC);
                $articleCall -> closeCursor();
            ?>
            <h2 class="title"><?= $articleRetrieve["title"] ?></h2>
            <span>by <span class="byline"><?= $articleRetrieve["author"] ?></span></span>
            <p class="article-content"><?= $articleRetrieve["content"] ?></p>
            <span>Posted at <span class="created-at"><?= $articleRetrieve["date_created"] ?></span></span>
        </div>

        <div class="comments-wrapper">

            <!-- COMMENT CREATION -->
            <div class="comment-creation">
                <span class="comment-author"><?= $userName ?></span>
                <input type="text" id="comment-textbox" placeholder="...join the conversation!" />
                <button id="postComment">Post Comment</button>
            </div>

            <!-- COMMENTS PULLED FROM DB -->
            <?php
                $commentsCall = $db -> prepare('SELECT author, comment, date_created FROM comments WHERE article_id = :articleID');
                $commentsCall -> execute(array(
                    "articleID" => $articleID
                ));

                $commentsReceived = $commentsCall -> fetchAll(PDO::FETCH_ASSOC);
                foreach($commentsReceived as $comment) {
                ?>
            <div class="comment-box">
                    <div class="comment-info">
                        <span class="comment-author"><?= $comment["author"] ?></span>
                        <span class="comment-date"><?= $comment["date_created"] ?></span>
                    </div>
                    <div class="comment-content"><?= $comment["comment"] ?></div>
            </div>
                <?php
                }
                $getNavLinks -> closeCursor();
                ?>
        </div>
    </div>
</div>
</body>

<script>
//LOG IN SYSTEM
let loginPromptBox = document.querySelector(".log-in-prompt");
let loginTextBox = document.querySelector("#log-in-text");
let loginButton = document.querySelector("#log-in-button");
let sessionUser;

if ("<?= $_SESSION['username'] ?>") {
    loginPromptBox.style.display = "none";
    sessionUser = "<?= $_SESSION['username'] ?>";
}

//COMMENT SYSTEM
let sendCommentButton = document.querySelector("#postComment");
let sendCommentBox = document.querySelector("#comment-textbox");
sendCommentButton.addEventListener("click", sendComment);

async function sendComment() {
    try {
        const response = await fetch("commentDBsend.php", {
            method: "POST",
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(["<?= $articleID ?>", "<?= $_SESSION["username"] ?>", sendCommentBox.value])
    });
    } catch (error) {
        console.error("Error connecting to comments database:", error);
    }
    sendCommentBox.value = "";
    location.replace("index.php?page=<?= $articleID ?>");
}
</script>

</html>