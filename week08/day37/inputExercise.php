<?php

try {
    $db = new PDO('mysql:host=localhost;dbname=intensive;charset=utf8', 'root');
}
catch(Exception $err) {
    die("Error: " . $err -> getMessage());
}

$db -> exec('INSERT INTO phones (`id`, `model`, `brand`, `owner`, `price`, `weight`, `comment`) VALUES ("", "S8", "Samsung", "Alexis", 80, 173, "Good for watching videos")');

echo("Added Alexis's Samsung S8 to the database.");

$dataInsert = $db -> prepare('INSERT INTO phones(`id`, `model`, `brand`, `owner`, `price`, `weight`, `comment`) VALUES ("", :inModel, :inBrand, :inOwner, :inPrice, :inWeight, :inComment)');
$dataInsert -> execute(array(
    "inModel" => "iPhone 12",
    "inBrand" => "Apple",
    "inOwner" => "Alex",
    "inPrice" => 700,
    "inWeight" => 164,
    "inComment" => "my company provided a phone i don\'t need thi sone anymore, brand new"
));

echo("Added Alex's iPhone 12 to the database.");

$db -> exec('UPDATE phones SET price = 690 WHERE owner = "Alex" AND model = "iPhone 12" AND weight = 164');

$dataUpdate = $db -> prepare('UPDATE phones SET comment = CONCAT(comment, :inComment) WHERE owner = :inOwner AND model = :inModel AND weight = :inWeight');
$dataUpdate -> execute(array(
    "inComment" => "And listening to music",
    "inOwner" => "Alex",
    "inModel" => "iPhone 12",
    "inWeight" => 164
));

echo("Updated Alex's comment about his iPhone 12.");

$dataDelete = $db -> prepare('DELETE FROM phones WHERE owner = :inOwner AND brand = :inBrand AND model = :inModel AND price = :inPrice AND weight = :inWeight');
$dataDelete -> execute(array(
    "inOwner" => "Alexis",
    "inBrand" => "Samsung",
    "inModel" => "S8",
    "inPrice" => 80,
    "inWeight" => 173
));

echo("Deleted Alexis's Samsung S8 from the database.");

?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>php mySQL insert</title>
</head>
<body>
    
</body>
</html>