<?php

$arr = array("abcd","abc","de","hjjj","g","wer");
$minLength = PHP_INT_MAX;
$maxLength = 0;
foreach($arr as $element) {
    if (strlen($element) < $minLength) {
        $minLength = strlen($element);
    }
    if (strlen($element) > $maxLength) {
        $maxLength = strlen($element);
    }
}
echo "the shortest array length is $minLength.";
echo "the longest array length is $maxLength.";