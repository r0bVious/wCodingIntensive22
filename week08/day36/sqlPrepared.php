<?php

$inBrand = htmlspecialchars($_GET['brand']);

try {
    $db = new PDO('mysql:host=localhost;dbname=intensive;charset=utf8', 'root');
}
catch(Exception $e) {
    die('Error : ' . $e->getMessage());
}

$response = $db->prepare('SELECT brand, model FROM phones where brand= ?');
$response->execute([$inBrand]);
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SQL Prepared</title>
</head>
<body>
    <table border="1">
        <tr>
            <td>Brand</td>
            <td>Model</td>
        </tr>
        <?php
            $allPhones = $response -> fetchAll(PDO::FETCH_ASSOC);
            foreach($allPhones as $phone) {
        ?>
        <tr>
            <td><?= $phone['brand'] ?></td>
            <td><?= $phone['model'] ?></td>
        </tr>
        <?php
            } //end while loop
            $response -> closeCursor();
        ?>
    </table> 
    
</body>
</html>