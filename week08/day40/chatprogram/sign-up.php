<?php
session_start();

try {
    $db = new PDO('mysql:host=localhost;dbname=intensive;charset=utf8', 'root');
}
catch(Exception $err) {
    die("Error: " . $err -> getMessage());
}

$login = addslashes(htmlspecialchars(htmlentities(trim($_POST['login-input']))));
$email = addslashes(htmlspecialchars(htmlentities(trim($_POST['email-input']))));
$password =  $_POST['password-input'];
$passwordConfirm = $_POST['password-confirmation-input'];

if ((preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#", $email)) && ($password === $passwordConfirm)) {

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $newUserInsert = $db -> prepare('INSERT INTO users(`id`, `login`, `password`, `email`, `date_subscription`) VALUES ("", :inLogin, :inPass, :inEmail, NOW())');
    $newUserInsert -> execute(array(
        "inLogin" => $login,
        "inPass" => $hashedPassword,
        "inEmail" => $email,
    ));

};

header("Location: index.php");