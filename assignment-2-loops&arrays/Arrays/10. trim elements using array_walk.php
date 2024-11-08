<?php

$arr = ["  Hello  ", "  World  ", "  PHP  "];
array_walk($arr, function ($element) {
    $element = trim($element);
});
print_r($arr);