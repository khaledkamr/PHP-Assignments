<?php

$mainArray = [1, 2, 3, 4, 5];
$secondArray = [2, 5];
$isSubset = empty(array_diff($secondArray, $mainArray));
echo $isSubset ? "subset" : "not a subset";