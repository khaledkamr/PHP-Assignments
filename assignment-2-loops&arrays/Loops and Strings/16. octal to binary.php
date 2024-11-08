<?php

$octal = "10"; 
$decimal = 0;
$binary = ""; 
$length = strlen($octal);
for ($i = 0; $i < $length; $i++) {
    $decimal += (int)($octal[$i]) * (8 ** ($length - $i - 1));
}
while ($decimal > 0) {
    $binary = ($decimal % 2) . $binary;
    $decimal = (int)($decimal / 2);
}
echo "Binary: " . $binary;