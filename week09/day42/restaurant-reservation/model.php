<?php

function dbConnect() {
    try {
        $db = new PDO('mysql:host=localhost;dbname=intensive;charset=utf8', 'root');
    }
    catch(Exception $e) {
        die('Error : ' . $e->getMessage());
    }
    return $db;
}

function checkReservationsMade($inDateTime) {
    $db = dbConnect();
    $checkSeatsLeft = $db -> prepare('SELECT * FROM restaurant-guests where guest-reservationtime = :inDateTime');
    $checkSeatsLeft -> execute(array (
        "inDateTime" => $inDateTime
    ));

    $madeReservations = $checkSeatsLeft -> fetchAll(PDO::FETCH_ASSOC);
    $checkSeatsLeft -> closeCursor();
    return $madeReservations;
}

//this comes from controller, processed and ready to smash into db
function writeReservation($guestName, $partyNum, $guestContact, $guestEmail, $reservationTime) {
    $db = dbConnect();
    $reservationInsert = $db -> prepare('INSERT INTO `restaurant-guests` (`guest-name`, `guest-numberof`, `guest-contact`, `guest-email`, `guest-reservation`, `guest-createdwhen`) VALUES (:guestName, :partyNum, :guestContact, :guestEmail, :guestReservationTime, NOW())');
    $reservationInsert -> execute(array(
        ":guestName" => $guestName,
        ":partyNum" => $partyNum,
        ":guestContact" => $guestContact,
        ":guestEmail" => $guestEmail,
        ":guestReservationTime" => $reservationTime
    ));
    $reservationInsert -> closeCursor();
}