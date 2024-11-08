<?php 

$color = array('A' => 'Blue', 'B' => 'Green', 'c' => 'Red');
// to lower
foreach ($color as $key => $value) {
    $color[$key] = strtolower($value);
}
print_r($color);

//to upper
foreach ($color as $key => $value) {
    $color[$key] = strtoupper($value);
}
print_r($color);