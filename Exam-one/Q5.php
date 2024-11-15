<?php

$array = [2, 4, 3, 1, 6, 7, 5, 8, 0, 9];

function removeEvenNumbers($arr) {
    $result = [];
    
    foreach ($arr as $value) {
        if ($value % 2 != 0) {
            $result[] = $value;
        }
    }
    
    return $result;
}

$filteredArray = removeEvenNumbers($array);

echo "Array after removing even numbers: ";
foreach ($filteredArray as $value) {
    echo $value . " ";
}

