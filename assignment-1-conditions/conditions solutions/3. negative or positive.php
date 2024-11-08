<?php

if ($num > 0) {
    $res = "Positive";
} elseif ($num < 0) {
    $res = "Negative";
} else {
    $res = "Zero";
}

echo "number is $res";