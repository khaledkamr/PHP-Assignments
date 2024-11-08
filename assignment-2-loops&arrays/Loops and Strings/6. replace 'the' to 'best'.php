<?php

$text = "the sun is bigger than the moon";
$len = strlen($text);
$word = "best";
$new_text = "";
for ($i = 0; $i <= $len - 3; $i++) {
    if ($i == 0 && substr($text, $i, 3) == "the") {
        $str = substr($text, $i + 3);
        $new_text = $word.$str;
        break;
    }
    elseif ($i == $len - 3 && substr($text, $i, 3) == "the") {
        $str = substr($text, 0 , $len - ($len - $i));
        $new_text = $str.$word;
        break;
    }
    elseif (substr($text, $i, 3) == "the") {
        $str1 = substr($text, 0, $len - ($len - $i));
        $str2 = substr($text, $i + 3);
        $new_text = $str1 . $word . $str2;
        break;
    }
}
echo $new_text;