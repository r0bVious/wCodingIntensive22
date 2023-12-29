<?php

function dbConnect() {
    try {
        $db = new PDO('mysql:host=localhost;dbname=intensive;charset=utf8', 'root');
    }
    catch(Exception $e) {
        die('Error : ' . $e->getMessage());
    }
    return $db;
}

function getNewest() {

    $db = dbConnect();
    $getNewest = $db -> prepare('SELECT MAX(id) FROM articles');
    $getNewest -> execute();
    
    $chosenArticle = $getNewest -> fetch(PDO::FETCH_ASSOC);
    $articleID = $chosenArticle["id"];
    
        if (isset($_GET["page"])) {
            $articleID = $_GET["page"];
        }
    
        if (isset($_SESSION["username"])) {
            $userName = $_SESSION["username"];
        } else {
            $userName = "Log in!";
        }
    
    }

function getNavLinks() {
    
    $db = dbConnect();

    $getNavLinks = $db -> prepare('SELECT title, DATE_FORMAT(date_created, "%Y/%m/%d") as date, id FROM articles ORDER BY id DESC');
    $getNavLinks -> execute();

    $navLinks = $getNavLinks -> fetchAll(PDO::FETCH_ASSOC);
    $getNavLinks -> closeCursor();
    return $navLinks;
}

function getArticle() {

    if (!$_GET) {
        return getNewest();
    }
    
    $db = dbConnect();

    $articleCall = $db -> prepare('SELECT title, tag, author, content, date_created FROM articles WHERE id = :articleID');
    $articleCall -> execute(array(
        "articleID" => $articleID 
    ));

    $articleRetrieve = $articleCall -> fetch(PDO::FETCH_ASSOC);
    $articleCall -> closeCursor();
    return $articleRetrieve;
}

function getComments() {
    
    $db = dbConnect();

    $commentsCall = $db -> prepare('SELECT author, comment, date_created FROM comments WHERE article_id = :articleID');
    $commentsCall -> execute(array(
        "articleID" => $articleID
    ));

    $commentsReceived = $commentsCall -> fetchAll(PDO::FETCH_ASSOC);
    $commentsCall -> closeCursor();
    return $commentsReceived;
}