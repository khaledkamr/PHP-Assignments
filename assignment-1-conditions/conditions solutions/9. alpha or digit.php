<?php

if (ctype_alpha($char)) {
  $res = "Alphabet";
} 
elseif (ctype_digit($char)) {
  $res = "Digit";
} 
else {
  $res = "Special Character";
}

echo "character is $res";