<?php

try {
    $db = new PDO('mysql:host=localhost;dbname=intensive;charset=utf8', 'root');
}
catch(Exception $e) {
    die('Error : ' . $e->getMessage());
}

?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>phpFunctions</title>
    <style>
        body {
            margin-left: 1em;
            display: flex;
            flex-direction: column;
            flex-wrap: wrap;
            height: 200vh;
        }
        table {
            margin: 1em;
            max-width: 25%;
        }
    </style>
</head>
<body>
<h2>php Functions Exercise</h2>
    <table border=1>
        <tr>
            <td><b>Brand</b></td>
            <td><b>Model</b></td>
        </tr>
        <?php
            echo("<b>Question 1</b>");
            $response = $db->prepare('SELECT UPPER(brand) as brand_up, LOWER(model) as model_low FROM phones LIMIT 5');
            $response -> execute();
        
            $allPhones = $response -> fetchAll(PDO::FETCH_ASSOC);
            foreach($allPhones as $phone) {
        ?>
        <tr>
            <td><?= $phone['brand_up'] ?></td>
            <td><?= $phone['model_low'] ?></td>
        </tr>
        <?php
            } //end loop
            $response -> closeCursor();
        ?>
    </table>
    <table border=1>
        <tr>
            <td><b>Phone List</b></td>
        </tr>
        <?php
            echo("<b>Question 2</b>");
            $response = $db->prepare('SELECT CONCAT(owner, " ---- ", model, "(", brand, ")", price, "$") as phone_info FROM phones LIMIT 5');
            $response -> execute();
        
            $allPhones = $response -> fetchAll(PDO::FETCH_ASSOC);
            foreach($allPhones as $phone) {
        ?>
        <tr>
            <td><?= $phone['phone_info'] ?></td>
        </tr>
        <?php
            } //end loop
            $response -> closeCursor();
        ?>
    </table>
    <table border=1>
        <tr>
            <td><b>Model</b></td>
            <td><b>Comment Length</b></td>
        </tr>
        <?php
            echo("<b>Question 3</b>");
            $response = $db->prepare('SELECT model, LENGTH(comment) as comlength FROM phones LIMIT 5');
            $response -> execute();
        
            $allPhones = $response -> fetchAll(PDO::FETCH_ASSOC);
            foreach($allPhones as $phone) {
        ?>
        <tr>
            <td><?= $phone['model'] ?></td>
            <td><?= $phone['comlength'] ?></td>
        </tr>
        <?php
            } //end loop
            $response -> closeCursor();
        ?>
    </table>
    <table border=1>
        <tr>
            <td><b>Avg. Weight of Brad's Phones</b></td>
        </tr>
        <?php
            echo("<b>Question 4</b>");
            $response = $db->prepare('SELECT AVG(weight) AS avg_weight FROM Phones WHERE owner = :owner');
            $response -> execute( array (
                "owner" => "brad"
            ));
        
            $allPhones = $response -> fetchAll(PDO::FETCH_ASSOC);
            foreach($allPhones as $phone) {
        ?>
        <tr>
            <td><?= $phone['avg_weight'] ?></td>
        </tr>
        <?php
            } //end loop
            $response -> closeCursor();
        ?>
    </table>
    <table border=1>
        <tr>
            <td><b>Owner</b></td>
            <td><b>Total Price</b></td>
        </tr>
        <?php
            echo("<b>Question 5</b>");
            $responseBrad = $db->prepare('SELECT SUM(price) AS sum_price FROM Phones WHERE owner = :owner');
            $responseBrad -> execute( array (
                "owner" => "Brad"
            ));
            $BradPhones = $responseBrad -> fetch(PDO::FETCH_ASSOC);
            $responseRoland = $db->prepare('SELECT SUM(price) AS sum_price FROM Phones WHERE owner = :owner');
            $responseRoland -> execute( array (
                "owner" => "Roland"
            ));
            $RolandPhones = $responseRoland -> fetch(PDO::FETCH_ASSOC);
        ?>
        <tr>
            <td>Brad</td>
            <td><?= $BradPhones['sum_price'] ?></td>
        </tr>
        <tr>
            <td>Roland</td>
            <td><?= $RolandPhones['sum_price'] ?></td>
        </tr>
        <?php
            $response -> closeCursor();
        ?>
    </table>
    <table border=1>
        <tr>
            <td><b>Richard's $$$$$ Phone</b></td>
        </tr>
        <?php
            echo("<b>Question 6</b>");
            $response = $db->prepare('SELECT MAX(price) AS max_price FROM Phones WHERE owner = :owner');
            $response -> execute( array (
                "owner" => "Richard"
            ));
        
            $allPhones = $response -> fetchAll(PDO::FETCH_ASSOC);
            foreach($allPhones as $phone) {
        ?>
        <tr>
            <td><?= $phone['max_price'] ?></td>
        </tr>
        <?php
            } //end loop
            $response -> closeCursor();
        ?>
    </table>
    <table border=1>
        <tr>
            <td><b>Frank's $ Phone</b></td>
        </tr>
        <?php
            echo("<b>Question 7</b>");
            $response = $db->prepare('SELECT MIN(price) AS min_price FROM Phones WHERE owner = :owner');
            $response -> execute( array (
                "owner" => "Frank"
            ));
        
            $allPhones = $response -> fetchAll(PDO::FETCH_ASSOC);
            foreach($allPhones as $phone) {
        ?>
        <tr>
            <td><?= $phone['min_price'] ?></td>
        </tr>
        <?php
            } //end loop
            $response -> closeCursor();
        ?>
    </table>
    <table border=1>
        <tr>
            <td><b>Owner</b></td>
            <td><b>Total Phones</b></td>
        </tr>
        <?php
            echo("<b>Question 8</b>");
            $people = array ("Brad", "Stacy");
            $numPhones = [];
            
            foreach($people as $person) {
            $response = $db->prepare('SELECT COUNT(model) AS no_phones FROM Phones WHERE owner = :owner');
            $response -> execute( array (
                "owner" => $person
            ));
            $AllPhones = $response -> fetch(PDO::FETCH_ASSOC);
        ?><tr>
            <td><?= $person ?></td>
            <td><?= $AllPhones["no_phones"] ?></td>
        </tr>
        <?php
            }
            $response -> closeCursor();
        ?>
    </table>
    <table border=1>
        <tr>
            <td><b>Owner</b></td>
            <td><b>Total Phones</b></td>
        </tr>
        <?php
            echo("<b>Question 9</b>");
            // $people = []; ----------- UNNECESSARY LOL
            // $response = $db->prepare('SELECT DISTINCT owner FROM Phones');
            // $response -> execute();
            // $AllPhones = $response -> fetchAll(PDO::FETCH_ASSOC);

            // foreach ($AllPhones as $row) {
            //     $people[] = $row['owner'];
            // }
            // $numPhones = [];
            
            // foreach($people as $person) {
            $response = $db -> prepare('SELECT COUNT(model) AS no_phones, owner FROM Phones GROUP BY owner');
            $response -> execute();
            $AllPhones = $response -> fetchAll(PDO::FETCH_ASSOC);

            foreach($AllPhones as $phone) {
        ?><tr>
            <td><?= $phone["owner"] ?></td>
            <td><?= $phone["no_phones"] ?></td>
        </tr>
        <?php
            }
            $response -> closeCursor();
        ?>
    </table>
    <table border=1>
        <tr>
            <td><b>Brand</b></td>
            <td><b>Total Phones</b></td>
        </tr>
        <?php
            echo("<b>Question 10</b>");
            $brands = [];
            $response = $db->prepare('SELECT DISTINCT brand FROM Phones');
            $response -> execute();
            $AllPhones = $response -> fetchAll(PDO::FETCH_ASSOC);

            foreach ($AllPhones as $row) {
                $brands[] = $row['brand'];
            }
            
            foreach($brands as $brand) {
            $response = $db->prepare('SELECT COUNT(model) AS no_phones FROM Phones WHERE brand = :brand');
            $response -> execute( array (
                "brand" => $brand
            ));
            $AllPhones = $response -> fetch(PDO::FETCH_ASSOC);
        ?><tr>
            <td><?= $brand ?></td>
            <td><?= $AllPhones["no_phones"] ?></td>
        </tr>
        <?php
            }
            $response -> closeCursor();
        ?>
    </table>
    <table border=1>
        <tr>
            <td><b>Brand</b></td>
            <td><b>Avg. Price</b></td>
            <td><b>Total Phones</b></td>
        </tr>
        <?php
            echo("<b>Question 11</b>");

            $response = $db->prepare('SELECT ROUND(AVG(price),1) AS avg_price, brand, COUNT(model) AS models FROM Phones GROUP BY brand HAVING avg_price < 125');
            $response -> execute();
            $AllPhones = $response -> fetchAll(PDO::FETCH_ASSOC);
            foreach($AllPhones as $phone) {
        ?><tr>
            <td><?= $phone["brand"] ?></td>
            <td><?= $phone["avg_price"] ?></td>
            <td><?= $phone["models"] ?></td>
        </tr>
        <?php
            }
            $response -> closeCursor();
        ?>
    </table>
    <table border=1>
        <tr>
            <td><b>Brand</b></td>
            <td><b>No. of Phones Weight > 170</b></td>
        </tr>
        <?php
            echo("<b>Question 12</b>");

            $response = $db->prepare('SELECT COUNT(model) AS models, brand FROM Phones WHERE weight > 170 GROUP BY brand HAVING models > 3');
            $response -> execute();
            $AllPhones = $response -> fetchAll(PDO::FETCH_ASSOC);
            foreach($AllPhones as $phone) {
        ?><tr>
            <td><?= $phone["brand"] ?></td>
            <td><?= $phone["models"] ?></td>
        </tr>
        <?php
            }
            $response -> closeCursor();
        ?>
    </table>
</body>
</html>