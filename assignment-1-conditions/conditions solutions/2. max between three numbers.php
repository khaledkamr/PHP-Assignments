<?php 

if ($a >= $b && $a >= $c) {
    $res = $a;
} elseif ($b >= $a && $b >= $c) {
    $res = $b;
} else {
    $res = $c;
}

echo "mac = $res";