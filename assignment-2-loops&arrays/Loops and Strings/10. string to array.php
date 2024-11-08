<?php

$text = "Burch Jr, Philip H., The American es";
$word = "";
$arr = [];
for($i = 0; $i < strlen($text); $i++) {
    if ($text[$i] == " ") {
        $arr[] = $word;
        $word = "";
        continue;
    }
    elseif ($text[$i] == ',') {
        continue;
    }
    $word .= $text[$i];
}
$arr[] = $word;
var_dump($arr);