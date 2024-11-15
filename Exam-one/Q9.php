<?php

$mainString = "i love php";

$substring = "php";

if (preg_match("/$substring/", $mainString)) {
    echo "The string contains '$substring'.";
} else {
    echo "The string does not contain '$substring'.";
}

