<?php
session_start();

$data = json_decode(file_get_contents('php://input'), true);

try {
    $db = new PDO('mysql:host=localhost;dbname=intensive;charset=utf8', 'root');
}
catch(Exception $err) {
    die("Error: " . $err -> getMessage());
}

$msgInsert = $db -> prepare('INSERT INTO chatlog(`id`, `userid`, `message`, `date_created`) VALUES ("", :inUserid, :inMessage, NOW())');
$msgInsert -> execute(array(
    "inUserid" => $_SESSION["userid"],
    "inMessage" => $data[2]
));