<?php

$numbers = [2, 4, 3, 1, 6, 7, 5, 8, 0, 9];

function calculateAverage($arr) {
    $sum = 0;
    $size = count($arr);

    for ($i = 0; $i < $size; $i++) {
        $sum += $arr[$i];
    }

    $average = $sum / $size;
    return $average;
}

$average = calculateAverage($numbers);
echo "The average is: " . $average;

