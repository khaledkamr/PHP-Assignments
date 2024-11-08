<?php 

$arrOne = [1, 2, 3, 4, 5];
$arrTwo = [6, 7, 8, 9, 10];
$arrThree = [];
foreach ($arrOne as $value) {
    $arrThree[] = $value;
}
foreach ($arrTwo as $value) {
    $arrThree[] = $value;
}
print_r($arrThree);