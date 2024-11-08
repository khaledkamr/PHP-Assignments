<?php

if (($year % 4 == 0 && $year % 100 != 0) || ($year % 400 == 0)) {
  $res = "leap";
}
else {
  $res = "not leap";
}

echo "this year is $res";