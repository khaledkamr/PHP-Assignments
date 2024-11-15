<?php

$array = [2, 4, 3, 1, 6, 7, 5, 8, 0, 9];

function bubbleSortAsc($arr) {
    $n = count($arr);
    for ($i = 0; $i < $n - 1; $i++) {
        for ($j = 0; $j < $n - $i - 1; $j++) {
            if ($arr[$j] > $arr[$j + 1]) {
                $temp = $arr[$j];
                $arr[$j] = $arr[$j + 1];
                $arr[$j + 1] = $temp;
            }
        }
    }
    return $arr;
}

function bubbleSortDesc($arr) {
    $n = count($arr);
    for ($i = 0; $i < $n - 1; $i++) {
        for ($j = 0; $j < $n - $i - 1; $j++) {
            if ($arr[$j] < $arr[$j + 1]) {
                $temp = $arr[$j];
                $arr[$j] = $arr[$j + 1];
                $arr[$j + 1] = $temp;
            }
        }
    }
    return $arr;
}

$result1 = bubbleSortAsc($array);
echo "Ascending Order: ";
foreach ($result1 as $value) {
    echo $value . " ";
}
echo "<br>";

$result2 = bubbleSortDesc($array);
echo "Descending Order: ";
foreach ($result2 as $value) {
    echo $value . " ";
}

