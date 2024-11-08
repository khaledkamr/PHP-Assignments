<?php

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