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
    <title>Phone Queries</title>
    <style>
        body {
            padding-left: 3em;
        }
        li {
            list-style: none;
            color: firebrick;
            width: 50vw;
        }
    </style>
</head>
<body>
    <h1>Phone Query Exercise</h1>
    <ul>
        <?php
            echo("<b>1</b> - Stacy's Phones");
            $response = $db->prepare('SELECT * FROM phones where owner="Stacy"');
            $response -> execute();
        
            $allPhones = $response -> fetchAll(PDO::FETCH_ASSOC);
            foreach($allPhones as $phone) {
        ?>
                <li>
                    Model: <?= $phone['model'] ?>,
                    Brand: <?= $phone['brand'] ?>,
                    Owner: <?= $phone['owner'] ?>,
                    Price: <?= $phone['price'] ?> dollars
                </li>
        <?php
            } //end while loop
            $response -> closeCursor();
        ?>
    </ul>
    <ul>
        <?php
            echo("<b>2</b> - 295g Phones");
            $response = $db->prepare('SELECT * FROM phones where weight="295"');
            $response -> execute();
        
            $allPhones = $response -> fetchAll(PDO::FETCH_ASSOC);
            foreach($allPhones as $phone) {
        ?>
                <li>
                    Model: <?= $phone['model'] ?>,
                    Brand: <?= $phone['brand'] ?>,
                    Owner: <?= $phone['owner'] ?>,
                    Price: <?= $phone['price'] ?> dollars
                </li>
        <?php
            } //end while loop
            $response -> closeCursor();
        ?>
    </ul>
    <ul>
        <?php
            echo("<b>3</b> - Nokia Phones");
            $response = $db->prepare('SELECT * FROM phones where brand="Nokia"');
            $response -> execute();
        
            $allPhones = $response -> fetchAll(PDO::FETCH_ASSOC);
            foreach($allPhones as $phone) {
        ?>
                <li>
                    Model: <?= $phone['model'] ?>,
                    Brand: <?= $phone['brand'] ?>,
                    Owner: <?= $phone['owner'] ?>,
                    Price: <?= $phone['price'] ?> dollars
                </li>
        <?php
            } //end while loop
            $response -> closeCursor();
        ?>
    </ul>
    <ul>
        <?php
            echo("<b>4</b> - Nokia and Apple Phones");
            $response = $db->prepare('SELECT * FROM phones WHERE brand IN ("Nokia", "Apple")');
            $response -> execute();
        
            $allPhones = $response -> fetchAll(PDO::FETCH_ASSOC);
            foreach($allPhones as $phone) {
        ?>
                <li>
                    Model: <?= $phone['model'] ?>,
                    Brand: <?= $phone['brand'] ?>,
                    Owner: <?= $phone['owner'] ?>,
                    Price: <?= $phone['price'] ?> dollars
                </li>
        <?php
            } //end while loop
            $response -> closeCursor();
        ?>
    </ul>
    <ul>
        <?php
            echo("<b>5</b> - $115 Phones");
            $response = $db->prepare('SELECT * FROM phones where price=115');
            $response -> execute();
        
            $allPhones = $response -> fetchAll(PDO::FETCH_ASSOC);
            foreach($allPhones as $phone) {
        ?>
                <li>
                    Model: <?= $phone['model'] ?>,
                    Brand: <?= $phone['brand'] ?>,
                    Owner: <?= $phone['owner'] ?>,
                    Price: <?= $phone['price'] ?> dollars
                </li>
        <?php
            } //end while loop
            $response -> closeCursor();
        ?>
    </ul>
    <ul>
        <?php
            echo("<b>6</b> - Phones by Weight");
            $response = $db->prepare('SELECT * FROM phones ORDER BY weight LIMIT 10');
            $response -> execute();
        
            $allPhones = $response -> fetchAll(PDO::FETCH_ASSOC);
            foreach($allPhones as $phone) {
        ?>
                <li>
                    Model: <?= $phone['model'] ?>,
                    Brand: <?= $phone['brand'] ?>,
                    Owner: <?= $phone['owner'] ?>,
                    Price: <?= $phone['price'] ?> dollars,
                    Weight: <?= $phone['weight'] ?>
                </li>
        <?php
            } //end while loop
            $response -> closeCursor();
        ?>
    </ul>
    <ul>
        <?php
            echo("<b>7</b> - 5 of Victoria's Phones");
            $response = $db->prepare('SELECT * FROM phones where owner="Victoria" LIMIT 5');
            $response -> execute();
        
            $allPhones = $response -> fetchAll(PDO::FETCH_ASSOC);
            foreach($allPhones as $phone) {
        ?>
                <li>
                    Model: <?= $phone['model'] ?>,
                    Brand: <?= $phone['brand'] ?>,
                    Owner: <?= $phone['owner'] ?>,
                    Price: <?= $phone['price'] ?> dollars
                </li>
        <?php
            } //end while loop
            $response -> closeCursor();
        ?>
    </ul>
    <ul>
        <?php
            echo("<b>8</b> - Nina's Phones Under $250");
            $response = $db->prepare('SELECT * FROM phones where owner="Nina" AND price < 250 ORDER BY price DESC');
            $response -> execute();
        
            $allPhones = $response -> fetchAll(PDO::FETCH_ASSOC);
            foreach($allPhones as $phone) {
        ?>
                <li>
                    Model: <?= $phone['model'] ?>,
                    Brand: <?= $phone['brand'] ?>,
                    Owner: <?= $phone['owner'] ?>,
                    Price: <?= $phone['price'] ?> dollars
                </li>
        <?php
            } //end while loop
            $response -> closeCursor();
        ?>
    </ul>
    <ul>
        <?php
            $inParams = [];
            $prepareString = "";
            if (isset($_GET['owner'])) {
                $inOwner = htmlspecialchars($_GET['owner']);
                $inParams[] = $inOwner;
                if ($prepareString === "") {
                    $prepareString .= " owner= ?";
                } else {
                    $prepareString .= " AND owner= ?";
                }
            }
            if (isset($_GET['brand'])) {
                $inBrand = htmlspecialchars($_GET['brand']);
                $inParams[] = $inBrand;
                if ($prepareString === "") {
                    $prepareString .= " brand= ?";
                } else {
                $prepareString .= " AND brand= ?";
                }
            }
            if (isset($_GET['weight'])) {
                $inWeight = htmlspecialchars($_GET['weight']);
                $inParams[] = $inWeight;
                if ($prepareString === "") {
                    $prepareString .= " weight= ?";
                } else {
                $prepareString .= " AND weight= ?";
                }
            }
            if (isset($_GET['model'])) {
                $inModel = htmlspecialchars($_GET['model']);
                $inParams[] = $inModel;
                if ($prepareString === "") {
                    $prepareString .= " model= ?";
                } else {
                $prepareString .= " AND model= ?";
                }
            }
            if (isset($_GET['price'])) {
                $inPrice = htmlspecialchars($_GET['price']);
                $inParams[] = $inPrice;
                if ($prepareString === "") {
                    $prepareString .= " price= ?";
                } else {
                $prepareString .= " AND price= ?";
                }
            }

            echo("<b>9</b> - Using ?s (ie \$_GET as ?owner=Stacy&...)");
            $response = $db->prepare('SELECT * FROM phones where' . $prepareString);
            $response -> execute($inParams);
        
            $allPhones = $response -> fetchAll(PDO::FETCH_ASSOC);
            foreach($allPhones as $phone) {
        ?>
                <li>
                    Model: <?= $phone['model'] ?>,
                    Brand: <?= $phone['brand'] ?>,
                    Owner: <?= $phone['owner'] ?>,
                    Price: <?= $phone['price'] ?> dollars
                </li>
        <?php
            } //end while loop
            $response -> closeCursor();
        ?>
    </ul>
    <ul>
        <?php
            $inParams = [];
            $prepareString = "";
            if (isset($_GET['owner'])) {
                $inParams["owner"] = htmlspecialchars($_GET['owner']);
                if ($prepareString === "") {
                    $prepareString .= " owner= :owner";
                } else {
                    $prepareString .= " AND owner= :owner";
                }
            }
            if (isset($_GET['brand'])) {
                $inParams["brand"] = htmlspecialchars($_GET['brand']);
                if ($prepareString === "") {
                    $prepareString .= " brand= :brand";
                } else {
                $prepareString .= " AND brand= :brand";
                }
            }
            if (isset($_GET['weight'])) {
                $inParams["weight"] = htmlspecialchars($_GET['weight']);
                if ($prepareString === "") {
                    $prepareString .= " weight= :weight";
                } else {
                $prepareString .= " AND weight= :weight";
                }
            }
            if (isset($_GET['model'])) {
                $inParams["model"] = htmlspecialchars($_GET['model']);
                if ($prepareString === "") {
                    $prepareString .= " model= :model";
                } else {
                $prepareString .= " AND model= :model";
                }
            }
            if (isset($_GET['price'])) {
                $inParams["price"] = htmlspecialchars($_GET['price']);
                if ($prepareString === "") {
                    $prepareString .= " price= :price";
                } else {
                $prepareString .= " AND price= :price";
                }
            }
            echo("<b>10</b> - Nominative Markers");
            $response = $db->prepare('SELECT * FROM phones where' . $prepareString);
            $response -> execute($inParams);
        
            $allPhones = $response -> fetchAll(PDO::FETCH_ASSOC);
            foreach($allPhones as $phone) {
        ?>
                <li>
                    Model: <?= $phone['model'] ?>,
                    Brand: <?= $phone['brand'] ?>,
                    Owner: <?= $phone['owner'] ?>,
                    Price: <?= $phone['price'] ?> dollars
                    Comment: <span style="font-style: italic;"><?= $phone['comment'] ?></span>
                </li>
        <?php
            } //end while loop
            $response -> closeCursor();
        ?>
    </ul>
</body>
</html>