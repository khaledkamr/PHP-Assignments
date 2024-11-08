<?php

if (($a + $b > $c) && ($a + $c > $b) && ($b + $c > $a)) {
  $res = "valid";
}
else {
  $res = "invalid";
}