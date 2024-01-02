<?php //this is the router - https://mastery.wcoding.net/courses/mvc-fsi/lessons/router-creation/
require("controller.php");
error_reporting(E_ERROR | E_PARSE); //this is just to take away that initial warning :/

$requestURI = $_SERVER['REQUEST_URI'];
// file_put_contents("reserve.log", date('Y-m-d H:i:s') . " index.php: " . $requestURI . " Body: " . file_get_contents('php://input') . PHP_EOL, FILE_APPEND);

$route = $_REQUEST['route'];

file_put_contents("reserve.log", date('Y-m-d H:i:s') . " index.php: " . $route . " Body: " . file_get_contents('php://input') . PHP_EOL, FILE_APPEND);
switch ($route) {

    case "makeReservation": //give it to controller
        makeReservation($_REQUEST["guestName"], $_REQUEST["partyNum"], $_REQUEST["guestContact"], $_REQUEST["guestEmail"], $_REQUEST["resvCode"], $_REQUEST["reservationTime"]);
        //upon successful creation, run script to present code HERE - maybe echo the above function and JS can pick it up?
        require("indexView.php");
        break;

    case "checkExistingReservations": //this would run a function that facilitates blocking out dates/times with not enough seats for given party
        $bodyContent = file_get_contents('php://input');
        $decodedData = json_decode($bodyContent);
        $result = json_encode(checkSeatsRemaining($decodedData));

        echo($result);
        break;

    case "createResvCode":
        $resvCode = json_encode(substr(md5(rand()), 0, 6));
        header('Content-Type: application/json');
        echo($resvCode);
        break;

    default: 
        require("indexView.php");
}