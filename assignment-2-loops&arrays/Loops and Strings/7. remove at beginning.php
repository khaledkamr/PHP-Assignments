<?php

$text = "remove part from the beginning";
$removed_length = 7;
$new_text = "";
for ($i = $removed_length; $i < strlen($text); $i++) {
    $new_text .= $text[$i];
}
echo $new_text;