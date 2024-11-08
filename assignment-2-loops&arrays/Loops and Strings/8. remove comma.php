<?php

$number = "1,234,567";
$new_number = "";
for ($i = 0; $i < strlen($number); $i++) {
    if ($number[$i] != ',') {
        $new_number .= $number[$i];
    }
}
echo $new_number;
