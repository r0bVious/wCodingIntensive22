<?php
session_start();

try {
    $db = new PDO('mysql:host=localhost;dbname=intensive;charset=utf8', 'root');
}
catch(Exception $err) {
    die("Error: " . $err -> getMessage());
}

// $logCall = $db -> prepare('SELECT userid, message, date_created FROM chatlog ORDER BY id DESC');
$logCall = $db -> prepare('SELECT users.login as username, chatlog.message as message, chatlog.date_created as timestamp 
                            FROM chatlog
                            JOIN users ON users.id = chatlog.userid
                            ORDER BY timestamp');
$logCall -> execute();

$allData = $logCall -> fetchAll(PDO::FETCH_ASSOC);

echo(json_encode($allData));

?>