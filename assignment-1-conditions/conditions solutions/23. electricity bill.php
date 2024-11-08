<?php

$first_50 = 50 * 0.50;
$next_150 = (50 * 0.50) + (100 * 0.75);
$next_250 = (50 * 0.50) + (100 * 0.75) + (100 * 1.20);

if ($units <= 50) {
  $bill = $units * 0.50;
} 
elseif ($units <= 150) {
  $bill = $first50 + (($units - 50) * 0.75);
} 
elseif ($units <= 250) {
  $bill = $next_150 + (($units - 150) * 1.20);
} 
else {
  $bill = $next_250 + (($units - 250) * 1.50);
}

echo $bill + ($bill * 0.20); // Adding 20% surcharge