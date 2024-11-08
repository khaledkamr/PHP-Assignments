<?php

/*
     - b (+/-) sqrt(b^2 - 4ac)
x = ---------------------------
               2a
*/

$d = ($b ** 2) - 4 * $a * $c;
if ($d > 0) {
  $root1 = (-$b + sqrt($d)) / (2 * $a);
  $root2 = (-$b - sqrt($d)) / (2 * $a);
  echo "Root 1: $root1, Root 2: $root2";
} 
elseif ($d == 0) {
  $root = -$b / (2 * $a);
  echo "Root : $root";
} 
else {
  echo "Invalid";
}