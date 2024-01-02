<?php
require("model.php");

function checkSeatsRemaining($inData) {
    $seatsAtHour = array(
        11 => 20,
        12 => 20,
        13 => 20,
        14 => 20,
        15 => 20,
        16 => 20,
        17 => 20,
        18 => 20,
        19 => 20,
        20 => 20,
        21 => 20,
        22 => 20,
    );

    $inMonth = $inData[0];
    $inDay = $inData[1];
    
    $madeReservations = checkReservationsMade($inMonth, $inDay);

    foreach ($madeReservations as $reservation) {
        $seatsAtHour[$reservation["HOUR(`guest-reservation`)"]] = ($seatsAtHour[$reservation["HOUR(`guest-reservation`)"]] - $reservation["guest-numberof"]);
        $seatsAtHour[$reservation["HOUR(`guest-reservation`)"] + 1] = ($seatsAtHour[$reservation["HOUR(`guest-reservation`)"]] - $reservation["guest-numberof"]);
    }

    return $seatsAtHour;
}

function makeReservation($guestName, $partyNum, $guestContact, $guestEmail, $resvCode, $reservationTime) { //process first and send to model

    if (filter_var($guestEmail, FILTER_VALIDATE_EMAIL)) {
        $checkedEmail = $guestEmail;
    }
    
    $reservation = json_decode($reservationTime);
    $reservation = "2024" . "-" . $reservation[0] . "-" . $reservation[1] . " " . $reservation[2] . ":00:00";

    // $resvCode = substr(md5(rand()), 0, 6);
    writeReservation($guestName, $partyNum, $guestContact, $checkedEmail, $resvCode, $reservation);
}