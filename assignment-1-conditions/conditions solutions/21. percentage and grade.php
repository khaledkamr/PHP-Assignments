<?php

$total = $physics + $chemistry + $biology + $maths + $computer;
$percentage = ($total / $fullMark) * 100;
if ($percentage <= 100 && $percentage >= 90) {
  $grade = "A";
} 
elseif ($percentage >= 80) {
  $grade = "B";
} 
elseif ($percentage >= 70) {
  $grade = "C";
} 
elseif ($percentage >= 60) {
  $grade = "D";
} 
elseif ($percentage >= 40) {
  $grade = "E";
} 
elseif ($percentage < 40) {
  $grade = "F";
} 
else {
  $grade = "invalid";
}

echo "percentage: $percentage and grade: $grade";