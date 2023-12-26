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
    <title>php Date Functions</title>
    <style>
        body {
            margin-left: 1em;
            display: flex;
            flex-direction: column;
            flex-wrap: wrap;
            height: 150vh;
        }
        table {
            margin: 1em;
            max-width: 25%;
        }
    </style>
</head>
<body>
<h2>php Date Functions Exercise</h2>
    <table border=1>
        <tr>
            <td colspan=2><b>Messages from Today's Date</b></td>
        </tr>
        <?php
            echo("<b>Question 1</b>");
            $response = $db->prepare('SELECT userid, message, date_created FROM chatlog WHERE date_created BETWEEN CURDATE() AND "2023-12-22"');
            $response -> execute();
        
            $allMsg = $response -> fetchAll(PDO::FETCH_ASSOC);
            foreach($allMsg as $msg) {
        ?>
        <tr>
            <td><?= $msg['userid'] ?></td>
            <td><?= $msg['message'] ?></td>
        </tr>
        <?php
            } //end loop
            $response -> closeCursor();
        ?>
    </table>
    <table border=1>
        <tr>
            <td colspan=2><b>...from specifically 2023-12-21 10:32:33</b></td>
        </tr>
        <?php
            echo("<b>Question 2</b>");
            $response = $db->prepare('SELECT userid, message, date_created FROM chatlog WHERE date_created = "2023-12-21 10:32:33"');
            $response -> execute();
        
            $allMsg = $response -> fetchAll(PDO::FETCH_ASSOC);
            foreach($allMsg as $msg) {
        ?>
        <tr>
            <td><?= $msg['userid'] ?></td>
            <td><?= $msg['message'] ?></td>
        </tr>
        <?php
            } //end loop
            $response -> closeCursor();
        ?>
    </table>
    <table border=1>
        <tr>
            <td colspan=2><b>...from today between 10AM and 11AM</b></td>
        </tr>
        <?php
            echo("<b>Question 3</b>");
            $response = $db->prepare('SELECT userid, message, date_created FROM chatlog WHERE date_created >= "2023-12-21 10:00:00" AND date_created <= "2023-12-21 11:00:00"');
            $response -> execute();
        
            $allMsg = $response -> fetchAll(PDO::FETCH_ASSOC);
            foreach($allMsg as $msg) {
        ?>
        <tr>
            <td><?= $msg['userid'] ?></td>
            <td><?= $msg['message'] ?></td>
        </tr>
        <?php
            } //end loop
            $response -> closeCursor();
        ?>
    </table>
    <table border=1>
        <tr>
            <td colspan=2><b>...from two days ago</b></td>
        </tr>
        <?php
            echo("<b>Question 4</b>");
            $response = $db->prepare('SELECT userid, message, date_created FROM chatlog WHERE DATE(date_created) = "2023-12-19"');
            $response -> execute();
        
            $allMsg = $response -> fetchAll(PDO::FETCH_ASSOC);
            foreach($allMsg as $msg) {
        ?>
        <tr>
            <td><?= $msg['userid'] ?></td>
            <td><?= $msg['message'] ?></td>
        </tr>
        <?php
            } //end loop
            $response -> closeCursor();
        ?>
    </table>
    <table border=1>
        <tr>
            <td colspan=2><b>...from two days ago</b></td>
        </tr>
        <?php
            echo("<b>Question 5</b>");
            $response = $db->prepare('SELECT userid, message, date_created FROM chatlog WHERE DATE(date_created) = DATE(DATE_SUB(CURDATE(), INTERVAL 2 DAY))');
            $response -> execute();
        
            $allMsg = $response -> fetchAll(PDO::FETCH_ASSOC);
            foreach($allMsg as $msg) {
        ?>
        <tr>
            <td><?= $msg['userid'] ?></td>
            <td><?= $msg['message'] ?></td>
        </tr>
        <?php
            } //end loop
            $response -> closeCursor();
        ?>
    </table>
    <table border=1>
        <tr>
            <td colspan=2><b>...from two days ago @ 10:30:30</b></td>
        </tr>
        <?php
            echo("<b>Question 6</b>");
            $response = $db->prepare('SELECT userid, message, date_created FROM chatlog WHERE date_created = "2023-12-21 10:30:30"');
            $response -> execute();
        
            $allMsg = $response -> fetchAll(PDO::FETCH_ASSOC);
            foreach($allMsg as $msg) {
        ?>
        <tr>
            <td><?= $msg['userid'] ?></td>
            <td><?= $msg['message'] ?></td>
        </tr>
        <?php
            } //end loop
            $response -> closeCursor();
        ?>
    </table>
    <table border=1>
        <tr>
            <td colspan=3><b>...changing the date format manually</b></td>
        </tr>
        <?php
            echo("<b>Question 7</b>");
            $response = $db->prepare('SELECT userid, message, DAY(date_created) as day, MONTH(date_created) as month, YEAR(date_created) as year FROM chatlog LIMIT 20');
            $response -> execute();
        
            $allMsg = $response -> fetchAll(PDO::FETCH_ASSOC);
            foreach($allMsg as $msg) {
        ?>
        <tr>
            <td><?= $msg['userid'] ?></td>
            <td><?= $msg['day'] . "/" . $msg['month'] . "/" . $msg['year'] ?></td>
            <td><?= $msg['message'] ?></td>
        </tr>
        <?php
            } //end loop
            $response -> closeCursor();
        ?>
    </table>
    <table border=1>
        <tr>
            <td colspan=3><b>...changing the date format functionally</b></td>
        </tr>
        <?php
            echo("<b>Question 8</b>");
            $response = $db->prepare('SELECT userid, message, DATE_FORMAT(date_created, "%d/%m/%Y") AS new_date FROM chatlog LIMIT 15');
            $response -> execute();
        
            $allMsg = $response -> fetchAll(PDO::FETCH_ASSOC);
            foreach($allMsg as $msg) {
        ?>
        <tr>
            <td><?= $msg['userid'] ?></td>
            <td><?= $msg['new_date'] ?></td>
            <td><?= $msg['message'] ?></td>
        </tr>
        <?php
            } //end loop
            $response -> closeCursor();
        ?>
    </table>
    <table border=1>
        <tr>
            <td colspan=2><b>...adding expirations</b></td>
            <td colspan=1><b>exp. date</b></td>
        </tr>
        <?php
            echo("<b>Question 9</b>");
            // $addTable = $db->exec('ALTER TABLE chatlog ADD expire datetime');
            // $addTable -> execute();
            $response = $db->prepare('SELECT date_created as og_date, DATE_ADD(date_created, INTERVAL 2 MONTH) as expire_date FROM chatlog');
            $response -> execute();
        
            $allMsg = $response -> fetchAll(PDO::FETCH_ASSOC);
            foreach($allMsg as $msg) {
                $addExp = $db->prepare('UPDATE chatlog SET expire = :expire_date WHERE date_created = :og_date');
                $addExp -> execute( array(
                    "expire_date" => $msg["expire_date"],
                    "og_date" => $msg["og_date"]
                ));
            } //end loop
            $allMsg = $response -> fetchAll(PDO::FETCH_ASSOC);
            $response -> closeCursor();
        ?>
        <tr>
                <td>*check DB for exp dates*</td>
        </tr>
    </table>