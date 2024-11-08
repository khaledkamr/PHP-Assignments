<?php

if ($basicSalary <= 10000) {
  $HRA = $basicSalary * 0.20;
  $DA = $basicSalary * 0.80;
} 
elseif ($basicSalary <= 20000) {
  $HRA = $basicSalary * 0.25;
  $DA = $basicSalary * 0.90;
} 
else {
  $HRA = $basicSalary * 0.30;
  $DA = $basicSalary * 0.95;
}
$grossSalary = $basicSalary + $HRA + $DA;

echo "gross salary: $grossSalary";