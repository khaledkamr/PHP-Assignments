<?php

// find maximum between two numbers
if ($a > $b) {
  $res = $a;
}
else {
  $res = $b;
}

// 2. Find maximum between three numbers
if ($a >= $b && $a >= $c) {
  $res = $a;
} 
elseif ($b >= $a && $b >= $c) {
  $res = $b;
} 
else {
  $res = $c;
}

// 3. Check whether a number is negative, positive or zero
if ($num > 0) {
  $res = "Positive";
} 
elseif ($num < 0) {
  $res = "Negative";
} 
else {
  $res = "Zero";
}

// 4. Check whether a number is divisible by 5 and 11
if ($num % 5 == 0 && $num % 11 == 0) {
  $res = "Divisible";
}
else {
  $res = "Not divisible";
}

// 5. Check whether a number is even or odd
if ($num % 2 == 0) {
  $res = "even";
}
else {
  $res = "odd";
}

// 6. Check whether a year is leap year or not
if (($year % 4 == 0 && $year % 100 != 0) || ($year % 400 == 0)) {
  $res = "leap";
}
else {
  $res = "not leap";
}

// 7. Check whether a character is alphabet or not
if (ctype_alpha($char)) {
  $res = "Alphabet";
} 
else {
  $res = "Not an Alphabet";
}

// 8. Check whether an alphabet is vowel or consonant
if (ctype_alpha($char)) {
  if ($char == 'a' || $char == 'e' || $char == 'i' || $char == 'o' || $char == 'u') {
    $res = "vowel";
  }
  else {
    $res = "consonant";
  }
}
else {
  echo "Not an Alphabet";
}

// 9. Check whether a character is alphabet, digit or special character
if (ctype_alpha($char)) {
  $res = "Alphabet";
} 
elseif (ctype_digit($char)) {
  $res = "Digit";
} 
else {
  $res = "Special Character";
}

// 10. Check whether a character is uppercase or lowercase alphabet
if (ctype_upper($char)) {
  $res = "Uppercase";
} 
elseif (ctype_lower($char)) {
  $res = "Lowercase";
} 
else {
  $res = "Not an Alphabet";
}

// 11. Input week number and print weekday
$res = match ($num) {
  1 => "saturday",
  2 => "sunday",
  3 => "monday",
  4 => "tuesday",
  5 => "wednesday",
  6 => "thursday",
  7 => "friday",
  default => "invalid",
};

// 12. Input month number and print number of days in that month
if ($month == 2) {
  $res = "28 (29 in leap years)";
} 
elseif ($month = 4, $month = 6, $month = 9, $month = 11) {
  $res = "30 days";
} 
elseif ($month = 1, $month = 3, $month = 5, $month = 7, $month = 8, $month = 10, $month = 12) {
  $res = "31 days";
} 
else {
  $res = "Invalid month number";
}

// 13. Count total number of notes in given amount
$amount = 3768;
$category = [2000, 500, 200, 100, 50, 20, 10, 5, 2, 1];
$noteCounter = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0];

for ($i = 0; $i < count($category); $i++) 
{
  if ($amount >= $category[$i]) 
  {
    $noteCounter[$i] = (int)($amount / $category[$i]);
    $amount %= $category[$i];
  }
}

for ($i = 0; $i < count($noteCounter); $i++) 
{
  echo "$category[$i]: $noteCounter[$i]\n";
}

// 14. Handling different user roles in switch
switch ($role) {
  case 'admin':
    echo "You have full access to the system.";
    break;
  case 'editor':
    echo "You can edit and manage content.";
    break;
  case 'viewer':
    echo "You can view the content.";
    break;
  case 'guest':
    echo "You have limited access to the system.";
    break;
  default:
    echo "Invalid role. Please check your user role.";
}

// 15. Use || (OR) to check for multiple conditions
if ($a == 1 || $b == 1 || $c == 1) {
  echo "One of them is 1";
}
else {
  echo "None of them is 1";
}

// 16. Check whether a triangle is valid with angles
if ($a + $b + $c == 180) {
  $res = "valid";
}
else {
  $res = "invalid";
}

// 17. Check whether a triangle is valid with sides
if (($a + $b > $c) && ($a + $c > $b) && ($b + $c > $a)) {
  $res = "valid";
}
else {
  $res = "invalid";
}

// 18. Check whether triangle is equilateral, isosceles or scalene
if ($a == $b && $b == $c) {
  $res = "Equilateral Triangle";
} 
elseif ($a == $b || $b == $c || $a == $c) {
  $res = "Isosceles Triangle";
} 
else {
  $res = "Scalene Triangle";
}

// 19. Find all roots of a quadratic equation
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

// 20. Calculate profit or loss
if ($sellingPrice > $costPrice) {
  echo "Profit: " . ($sellingPrice - $costPrice);
} 
elseif ($sellingPrice < $costPrice) {
  echo "Loss: " . ($costPrice - $sellingPrice);
} 
else {
  echo "No Profit No Loss";
}

// 21. Calculate percentage and grade
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

// 22. Calculate Gross salary
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

// 23. Calculate total electricity bill
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