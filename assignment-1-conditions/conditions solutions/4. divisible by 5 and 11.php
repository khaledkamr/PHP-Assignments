<?php

if ($num % 5 == 0 && $num % 11 == 0) {
    $res = "Divisible";
} else {
    $res = "Not divisible";
}

echo "number is $res";