<?php //this is the router - https://mastery.wcoding.net/courses/mvc-fsi/lessons/router-creation/
require("controller.php");

$route = isset($_REQUEST['route']);
switch ($route) {
    case "makeReservation": //give it to controller
        makeReservation($_REQUEST["guestName"], $_REQUEST["partyNum"], $_REQUEST["guestContact"], $_REQUEST["guestEmail"], $_REQUEST["reservationTime"]);
        break;
    case "checkExistingReservations": //this would run a function that facilitates blocking out dates/times with not enough seats for given party
        // yeh
}