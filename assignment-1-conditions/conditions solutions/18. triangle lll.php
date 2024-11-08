<?php

if ($a == $b && $b == $c) {
  $res = "Equilateral Triangle";
} 
elseif ($a == $b || $b == $c || $a == $c) {
  $res = "Isosceles Triangle";
} 
else {
  $res = "Scalene Triangle";
}

echo "triangle is $res";