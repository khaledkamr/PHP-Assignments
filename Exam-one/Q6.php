<?php

$numbers = [10, 30, 20];

$max = $numbers[0];

if ($numbers[1] > $max) {
    $max = $numbers[1];
}

if ($numbers[2] > $max) {
    $max = $numbers[2];
}

echo "The maximum number is: " . $max;

