<?php
session_start();

if (isset($_POST)) {
    $json = file_get_contents('php://input');
    $formData = json_decode($json, true);
    echo $formData;

    $message = $formData['message'];

    $logFile = 'chatlog.txt';
    $currentLog = file_get_contents($logFile);
    $currentLog .= date('H:i:s') . ': ' . '<b>' . $_SESSION["username"] . '</b>' . ': '. $message . "<br>" . "\n";
    file_put_contents($logFile, $currentLog);
}
