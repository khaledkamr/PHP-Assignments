<?php

$text = "techstudy";
$last_three = "";
for ($i = strlen($text) - 3; $i < strlen($text); $i++) {
    $last_three .= $text[$i];
}
echo "Last three characters: $last_three";