<?php

$text = "techstudy";
$uppercaseText = "";
for ($i = 0; $i < strlen($text); $i++) {
    if (ord($text[$i]) >= 97 && ord($text[$i]) <= 122) {
        $uppercaseText .= chr(ord($text[$i]) - 32);
    } else {
        $uppercaseText .= $text[$i];
    }
}
echo $uppercaseText;
