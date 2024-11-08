<?php

$arr = ["  Hello World  ", "  PHP  "];
array_walk($arr, function(&$element) {
    $element = preg_replace("/ /", "", $element);
});
print_r($arr);