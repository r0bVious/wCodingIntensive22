<?php
    $ages = array (12,23,30,56,140);
    //or
    $ages[0] = 12;
    $ages[1] = 23;
    $ages[2] = 33;
    $ages[3] = 56;
    $ages[4] = 114;

    // or 
    $ages[] = 12;
    $ages[] = 23;
    $ages[] = 30;
    $ages[] = 54;
    $ages[] = 100;

    $group1 = array (
        'language' => 'French',
        'day_class' => 'Monday',
        'is_already_started' => false,
        'nb_of_students' => 15);

    echo $group1['language'];

    // or
    $group2['language'] = 'English';
    $group2['day_class'] = 'Tuesday';
    $group2['is_already_started'] = false;
    $group2['nb_of_students'] = 8;

    echo $group2['is_already_started'];

    $colors = array ("blue", "red", "pink", "green", "white", "orange", "black", "purple", "yellow", "gray");
    for ($i = 0; $i < count($colors); $i++) {
        echo $i . " " . $colors[$i] . "\n";
    }

    foreach($colors as $index => $shade) {
        echo $index . " " . $shade . "\n";
    }

    $x = array (1, 4, 6, 12, 15, 2, 3, 7, 8, 2);
    $y = array (4, 8, 56, 23, 8, 4, 9, 12, 34, 0);
    $z = array (6, 0, 12, 3, 67, 2, 8, 32, 1, 5);
    for ($i = 0; $i < count($x); $i++) {
        echo "the x axis is equal to " . $x[$i] . "\n";
        echo "the y axis is equal to " . $y[$i] . "\n";
        echo "the z axis is equal to " . $z[$i] . "\n";
    }