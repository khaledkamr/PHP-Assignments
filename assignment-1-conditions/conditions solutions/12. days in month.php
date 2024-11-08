<?php

if ($month == 2) {
  $res = "28 (29 in leap years)";
} 
elseif ($month == 4 || $month == 6 || $month == 9 || $month == 11) {
  $res = "30 days";
} 
elseif ($month == 1 || $month == 3 || $month == 5 || $month == 7 || $month == 8 || $month == 10 || $month == 12) {
  $res = "31 days";
} 
else {
  $res = "Invalid month number";
}

echo "number of days: $res";