<?php

$arr1 = array(array(77, 87), array(23, 45));
$arr2 = array("w3resource", "com");
$res = [];
foreach ($arr1 as $key => $value) {
    $res[] = array_merge([$arr2[$key]], $value);
}
print_r($res);