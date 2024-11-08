<?php

$arr = array("Sophia"=>"31","Jacob"=>"41","William"=>"39","Ramesh"=>"40");

// a) ascending order sort by value
asort($arr);
var_dump($arr);

// b) ascending order sort by Key
ksort($arr);
var_dump($arr);

// c) descending order sorting by Value
arsort($arr);
var_dump($arr);

// d) descending order sorting by Key
krsort($arr);
var_dump($arr);
