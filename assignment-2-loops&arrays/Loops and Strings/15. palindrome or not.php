<?php

$number = 12321;
$number = (string)$number;
$left = 0;
$right = strlen($number) - 1;
$palindrome = true;
while ($left != $right) {
    if ($number[$left] != $number[$right]) {
        $palindrome = false;
        break;
    }
    $left++;
    $right--;
}
echo $palindrome ? "yes" : "no";