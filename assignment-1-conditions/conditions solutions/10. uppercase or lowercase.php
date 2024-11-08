<?php

if (ctype_upper($char)) {
  $res = "Uppercase";
} 
elseif (ctype_lower($char)) {
  $res = "Lowercase";
} 
else {
  $res = "Not an Alphabet";
}

echo "character is $res";