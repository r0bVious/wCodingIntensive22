<?php
require("model.php");

require("indexView.php");

function checkSeatsRemaining($inDateTime) {
    $madeReservations = checkReservationsMade($inDateTime);
    $availableSeats = 20;

    foreach ($madeReservations as $reservation) {
        $availableSeats = $availableSeats - $reservation["guest-numberof"];
    }

    return $availableSeats;
}

function makeReservation($guestName, $partyNum, $guestContact, $guestEmail, $reservationTime) { //process first and send to model

    if (preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#", $guestEmail)) {
        $checkedEmail = $guestEmail;
    }
    
    $reservation = json_decode($reservationTime);
    $reservation = "2024" . "-" . $reservation[0] . "-" . $reservation[1] . " " . $reservation[2] . ":00:00";

    writeReservation($guestName, $partyNum, $guestContact, $checkedEmail, $reservation);
}