<?php

if (!isset($_GET["stateOrCapital"])) die("Error - Please enter a valid search query.");

$userInput = $_GET["stateOrCapital"];

//creates array ready for use
$data = unserialize(file_get_contents("capitalCities.txt"));

$stateList = [];
foreach($data as $state) {
   $stateList[] = explode(" - ", $state);
}

// This requires the full name of state or capital
// for ($i = 0; $i < count($stateList); $i++) {
//     for ($j = 0; $j <= 1; $j++) {
//         if ($stateList[$i][$j] === $userInput) {
//             echo "{$stateList[$i][0]} | {$stateList[$i][1]}";
//         }
//     }
// }

//checks for partial matches - no reason to separate the states/caps if you're going to just rejoin them in the echo, dummy
for ($i = 0; $i < count($stateList); $i++) {
    for ($j = 0; $j <= 1; $j++) {
        if (str_contains(strtoupper($stateList[$i][$j]), strtoupper($userInput))) {
            echo "{$stateList[$i][0]} - {$stateList[$i][1]} | ";
        }
    }
}