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
    <title>Table Joins</title>
    <style>
        body {
            margin-left: 1em;
            display: flex;
            flex-direction: column;
            flex-wrap: wrap;
        }
        table {
            margin: 1em;
            max-width: 25%;
        }
        ul {
            list-style: none;
        }

        .list-group {
            display: flex;
            flex-wrap: wrap;
            width: 100%;
        }
    </style>
</head>
<body>
<h2>php Functions Exercise</h2>
<div class="list-group one">
    <ul>
        <li><b>Question 1</b></li>
        <?php
            $response = $db->prepare('SELECT phones.model as phone_model, owners.firstname as ownername
                                    FROM phones, owners
                                    WHERE phones.owner_id = owners.id');
            $response -> execute();
        
            $allPhones = $response -> fetchAll(PDO::FETCH_ASSOC);
            foreach($allPhones as $phone) {
        ?>
        <li>
            <?= $phone['ownername'] ?> - <?= $phone['phone_model'] ?>
        </li>
        <?php
            } //end loop
            $response -> closeCursor();
        ?>
    </ul>
    <ul>
        <li><b>Question 2</b></li>
        <?php
            $response = $db->prepare('SELECT phones.model as phone_model, owners.firstname as ownername
                                    FROM phones
                                    JOIN owners
                                    ON phones.owner_id = owners.id');
            $response -> execute();
        
            $allPhones = $response -> fetchAll(PDO::FETCH_ASSOC);
            foreach($allPhones as $phone) {
        ?>
        <li>
            <?= $phone['ownername'] ?> - <?= $phone['phone_model'] ?>
        </li>
        <?php
            } //end loop
            $response -> closeCursor();
        ?>
    </ul>
    <ul>
        <li><b>Question 3</b></li>
        <?php
            $response = $db->prepare('SELECT phones.model as phone_model, owners.firstname as ownername
                                    FROM phones
                                    RIGHT JOIN owners
                                    ON phones.owner_id = owners.id'); //the exercise called this a "left join", but I used "right" because I ordered the tables the other way on the SELECT
            $response -> execute();
        
            $allPhones = $response -> fetchAll(PDO::FETCH_ASSOC);
            foreach($allPhones as $phone) {
        ?>
        <li>
            <?= $phone['ownername'] ?> - <?= $phone['phone_model'] ?>
        </li>
        <?php
            } //end loop
            $response -> closeCursor();
        ?>
    </ul>
    <ul>
        <li><b>Question 4</b></li>
        <?php
            $response = $db->prepare('SELECT phones.model as phone_model, owners.firstname as ownername
                                    FROM phones
                                    LEFT JOIN owners
                                    ON phones.owner_id = owners.id'); //the exercise called this a "right join", but I used "left" because I ordered the tables the other way on the SELECT
            $response -> execute();
        
            $allPhones = $response -> fetchAll(PDO::FETCH_ASSOC);
            foreach($allPhones as $phone) {
        ?>
        <li>
            <?= $phone['ownername'] ?> - <?= $phone['phone_model'] ?>
        </li>
        <?php
            } //end loop
            $response -> closeCursor();
        ?>
    </ul>
</div>
<h2>Part 2: Brands</h2>
<div class="list-group two">
    <ul>
        <li><b>Question 1</b></li>
        <?php
            $response = $db->prepare('SELECT phones.model as phone_model, brand.brand_name as brandname
                                    FROM phones, brand
                                    WHERE phones.brand_id = brand.id');
            $response -> execute();
        
            $allPhones = $response -> fetchAll(PDO::FETCH_ASSOC);
            foreach($allPhones as $phone) {
        ?>
        <li>
            <?= $phone['phone_model'] ?> - <?= $phone['brandname'] ?>
        </li>
        <?php
            } //end loop
            $response -> closeCursor();
        ?>
    </ul>
    <ul>
        <li><b>Question 2</b></li>
        <?php
            $response = $db->prepare('SELECT phones.model as phone_model, brand.brand_name as brandname
                                    FROM phones
                                    JOIN brand
                                    ON phones.brand_id = brand.id');
            $response -> execute();
        
            $allPhones = $response -> fetchAll(PDO::FETCH_ASSOC);
            foreach($allPhones as $phone) {
        ?>
        <li>
            <?= $phone['phone_model'] ?> - <?= $phone['brandname'] ?>
        </li>
        <?php
            } //end loop
            $response -> closeCursor();
        ?>
    </ul>
    <ul>
        <li><b>Question 3</b></li>
        <?php
            $response = $db->prepare('SELECT phones.model as phone_model, brand.brand_name as brandname
                                    FROM phones
                                    RIGHT JOIN brand
                                    ON phones.brand_id = brand.id'); //the exercise called this a "left join", but I used "right" because I ordered the tables the other way on the SELECT
            $response -> execute();
        
            $allPhones = $response -> fetchAll(PDO::FETCH_ASSOC);
            foreach($allPhones as $phone) {
        ?>
        <li>
            <?= $phone['phone_model'] ?> - <?= $phone['brandname'] ?>
        </li>
        <?php
            } //end loop
            $response -> closeCursor();
        ?>
    </ul>
    <ul>
        <li><b>Question 4</b></li>
        <?php
            $response = $db->prepare('SELECT phones.model as phone_model, brand.brand_name as brandname
                                        FROM phones
                                        LEFT JOIN brand
                                        ON phones.brand_id = brand.id'); //the exercise called this a "right join", but I used "left" because I ordered the tables the other way on the SELECT
            $response -> execute();
        
            $allPhones = $response -> fetchAll(PDO::FETCH_ASSOC);
            foreach($allPhones as $phone) {
        ?>
        <li>
            <?= $phone['brandname'] ?> - <?= $phone['phone_model'] ?>
        </li>
        <?php
            } //end loop
            $response -> closeCursor();
        ?>
    </ul>

</div>
</body>
</html>