<?php 
    $my_age = 10;
    $name = "Marie";
    $country = "Korea";
    $isWoman = true;

    if ($my_age < 3) {
        echo "You are really young... just " . $my_age . " years old";
    }
    if ($my_age > 3) {
        echo "It\'s okay you can continue on to this web page, {$name}\n";
    }

    if ($name == "Marie" && $country  == "Korea") {
        echo "Welcome to " . $country . ', ' . $name.PHP_EOL;
    }

    if (!$isWoman OR $name != "Marie\n" ) {
        echo "KICK ROCKS";
    }

    $pollution = 400;

    if ($pollution === 0) {
        echo "No pollution\n";
    } else if ($pollution > 0 && $pollution <= 20) {
        echo "No pollution\n";
    } else if ($pollution > 20 && $pollution <= 50) {
        echo "Little pollution\n";
    } else if ($pollution > 50 && $pollution <= 90) {
        echo "Little pollution --> wear a mask\n";        
    } else if ($pollution > 90 && $pollution <= 110) {
        echo "Medium pollution --> wear a mask\n";     
    } else if ($pollution > 110 && $pollution <= 140) {
        echo "Medium pollution --> wear a mask\n";     
    } else if ($pollution > 140 && $pollution <= 180) {
        echo "High pollution --> wear a mask and no activities outside\n";     
    } else if ($pollution > 180 && $pollution <= 210) {
        echo "Very high pollution --> stay at home!\n";     
    } else if ($pollution > 210) {
        echo "Very high pollution --> stay at home!\n";     
    } else {
        echo "No data - Do what you want!\n";
    }

    switch ($pollution) {
        case 0:
            echo "No pollution\n";
            break;
        case $pollution > 0 && $pollution <= 20:
            echo "No pollution\n";
            break;
        case $pollution > 20 && $pollution <= 50:
            echo "Little pollution\n";
            break;
        case $pollution > 50 && $pollution <= 90:
            echo "Little pollution --> wear a mask\n";  
            break;
        case $pollution > 90 && $pollution <= 110:
            echo "Medium pollution --> wear a mask\n";   
            break;
        case $pollution > 110 && $pollution <= 140:
            echo "Medium pollution --> wear a mask\n";    
            break;
        case $pollution > 140 && $pollution <= 180:
            echo "High pollution --> wear a mask and no activities outside\n";   
            break;
        case $pollution > 180 && $pollution <= 210:
            echo "Very high pollution --> stay at home!\n";  
            break;
        case $pollution > 210:
            echo "Very high pollution --> stay at home!\n";  
            break;
        case is_numeric($pollution) == false:
            echo "No data - Do what you want!\n";
    }

    $password = "banana";
    echo $password ? "Password correct - {$password}\n" : "Password incorrect\n";

    $isEmployed = false;
    if ($isEmployed == true) {
        echo "you have a job\n";
    } else {
        echo "get a job\n";
    }
?>