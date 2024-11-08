<?php

$keys = ['x', 'y', 'z'];
$values = [10, 20, 30];
$res = [];
if (count($keys) === count($values)) {
    $res = array_combine($keys, $values);
}
print_r($res);