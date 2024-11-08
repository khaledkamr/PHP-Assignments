<?php

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

echo "weekday is $res";