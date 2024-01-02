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

function checkReservationsMade($inMonth, $inDay) {
    $db = dbConnect();
    $checkSeatsTaken = $db -> prepare('SELECT HOUR(`guest-reservation`), `guest-numberof` FROM `restaurant-guests` where MONTH(`guest-reservation`) = :inMonth AND DAY(`guest-reservation`) = :inDay');
    $checkSeatsTaken -> execute(array (
        ":inMonth" => $inMonth,
        ":inDay" => $inDay
    ));

    $madeReservations = $checkSeatsTaken -> fetchAll(PDO::FETCH_ASSOC);
    return $madeReservations;
}

//this comes from controller, processed and ready to smash into db
function writeReservation($guestName, $partyNum, $guestContact, $guestEmail, $resvCode, $reservationTime) {
    $db = dbConnect();
    $reservationInsert = $db -> prepare('INSERT INTO `restaurant-guests` (`guest-name`, `guest-numberof`, `guest-contact`, `guest-email`, `guest-reservation`, `guest-reservation-code`, `guest-createdwhen`) VALUES (:guestName, :partyNum, :guestContact, :guestEmail, :guestReservationTime, :resvCode, NOW())');
    $insertCheck = $reservationInsert -> execute(array(
        ":guestName" => $guestName,
        ":partyNum" => $partyNum,
        ":guestContact" => $guestContact,
        ":guestEmail" => $guestEmail,
        ":resvCode" => $resvCode,
        ":guestReservationTime" => $reservationTime
    ));

    if ($insertCheck) {
        return true;
    } else {
        return false;
    }
    //this should be rewritten as an insert attempt with an ok/not okay return for controller
}