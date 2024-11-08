<?php

$arr = [1,2,3,3,4,4,5,5,5];
$res = [];
foreach ($arr as $value) {
    if (!in_array($value, $res)) {
        $res[] = $value;
    }
}
print_r($res);