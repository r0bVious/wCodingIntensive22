<?php

function coneVolume($radius, $height) {
    return round(((1/3) * M_PI * ($radius*$radius) * $height));
}

$volume = coneVolume(5, 2);
echo 'A cone with a radius of 5 and a height of 2 has a volume of: ' . $volume . ' cm^3' . "\n";
$volume = coneVolume(3, 4);
echo 'A cone with a radius of 3 and a height of 4 has a volume of: ' . $volume . ' cm^3' . "\n";



