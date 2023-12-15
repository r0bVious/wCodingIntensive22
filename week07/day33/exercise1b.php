<?php

// $gender = strip_tags($_POST["gender"]);
// $lname = strip_tags($_POST["lastname"]);
// $fname = strip_tags($_POST["firstname"]);
// $age = strip_tags($_POST["age"]);
// $login = strip_tags($_POST["login"]);
// $pw = strip_tags($_POST["password"]);
// $country = strip_tags($_POST["country"]);
// $newsletter = strip_tags($_POST["newsletter"]);

//Prettier way of stripping data of tags
$userData = [];
foreach ($_POST as $value) {
    $userData[] = strip_tags($value);
}

$gender = $userData[0];
$lname = $userData[1];
$fname = $userData[2];
$age = $userData[3];
$login = $userData[4];
$pw = $userData[5];
$confpw = $userData[6];
$country = $userData[7];
$newsletter = $userData[8];

$curatedData = [];
$curatedData[] = $gender;
$curatedData[] = ucfirst($lname);
$curatedData[] = ucfirst($fname);
if (is_numeric($age)) {
    $curatedData[] = $age;
} else {
    $curatedData[] = "Invalid";
}
$curatedData[] = $login;
if ($pw === $confpw) {
    $curatedData[] = $pw;
} else {
    $curatedData[] = "Invalid";
}
$curatedData[] = $country;
$curatedData[] = $newsletter;

echo(implode("|", $curatedData));

