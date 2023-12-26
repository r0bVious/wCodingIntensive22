<?php
session_start();

try {
    $db = new PDO('mysql:host=localhost;dbname=intensive;charset=utf8', 'root');
}
catch(Exception $err) {
    die("Error: " . $err -> getMessage());
}

$login = htmlspecialchars($_POST['login-input']);
$password = $_POST['password-input'];

$checkExisting = $db -> prepare('SELECT id, password FROM `users` WHERE login = :inLogin');
$checkExisting -> execute(array(
    ":inLogin" => $login
));

$user = $checkExisting->fetch(PDO::FETCH_ASSOC);

if (($user) && (password_verify($password, $user['password']))) {
    $_SESSION["username"] = $login;
    $_SESSION["userid"] = $user["id"];
    header("Location: chatroom.php");
} else {
    header("Location: index.php");
}