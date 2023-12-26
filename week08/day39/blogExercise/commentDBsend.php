<?php
session_start();

$data = json_decode(file_get_contents('php://input'), true);

try {
    $db = new PDO('mysql:host=localhost;dbname=intensive;charset=utf8', 'root');
}
catch(Exception $err) {
    die("Error: " . $err -> getMessage());
}

$commentInsert = $db -> prepare('INSERT INTO comments(`id`, `article_id`, `author`, `comment`, `date_created`) VALUES ("", :inArticleid, :inUserid, :inMessage, NOW())');
$commentInsert -> execute(array(
    "inArticleid" => $data[0],
    "inUserid" => $data[1], //$_SESSION["username"] eventually
    "inMessage" => $data[2]
));