<?php

if (ctype_alpha($char)) {
  if ($char == 'a' || $char == 'e' || $char == 'i' || $char == 'o' || $char == 'u') {
    $res = "vowel";
  }
  else {
    $res = "consonant";
  }
}
else {
  $res = "Not an Alphabet";
}

echo "character is $res";