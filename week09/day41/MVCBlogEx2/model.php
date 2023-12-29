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

function getID() {
    $db = dbConnect();
    if (!isset($_GET["page"])){
        $getNewest = $db -> prepare('SELECT MAX(id) FROM articles');
        $getNewest -> execute();
        
        $chosenArticle = $getNewest -> fetch(PDO::FETCH_ASSOC);
        $articleID = $chosenArticle["MAX(id)"];
    } else {
        $articleID = $_GET["page"];
    }

    return $articleID;
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
    
    $db = dbConnect();
    $articleID = getID();

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
    $articleID = getID();

    $commentsCall = $db -> prepare('SELECT author, comment, date_created FROM comments WHERE article_id = :articleID');
    $commentsCall -> execute(array(
        "articleID" => $articleID
    ));

    $commentsReceived = $commentsCall -> fetchAll(PDO::FETCH_ASSOC);
    $commentsCall -> closeCursor();
    return $commentsReceived;
}