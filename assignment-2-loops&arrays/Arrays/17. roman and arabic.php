<?php

$result = [];
$numbers = ["one", "two", "three", "four"];
$roman = ['I', 'II', 'III', 'IV'];
$arabic = [1, 2, 3, 4];
for ($i = 0; $i < count($numbers); $i++) {
    $result['Roman'][$numbers[$i]] = $roman[$i];
    $result['Arabic'][$numbers[$i]] = $arabic[$i];
}
print_r($result);