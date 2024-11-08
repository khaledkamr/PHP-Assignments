<?php

$number = 12345;
$number = (string)$number;
echo $number[-1] . substr($number, 1, strlen($number)- 2) . $number[0];