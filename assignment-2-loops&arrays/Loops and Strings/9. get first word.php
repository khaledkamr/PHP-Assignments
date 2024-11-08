<?php

$text = "get the first word";
$first_word = "";
for ($i = 0; $i < strlen($text); $i++) {
    if ($text[$i] == " ") {
        break;
    }
    $first_word .= $text[$i];
}
echo $first_word;