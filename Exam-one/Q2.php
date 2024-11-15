<?php

echo "First Shape:<br>";
$rows = 5; 

for ($i = 1; $i <= $rows; $i++) {
    for ($j = $rows - $i; $j > 0; $j--) {
        echo "&nbsp;&nbsp;";
    }
    for ($k = 1; $k <= $i; $k++) {
        echo "* ";
    }
    echo "<br>";
}

for ($i = $rows - 1; $i >= 1; $i--) {
    for ($j = $rows - $i; $j > 0; $j--) {
        echo "&nbsp;&nbsp;";
    }
    for ($k = 1; $k <= $i; $k++) {
        echo "* ";
    }
    echo "<br>";
}

echo "<br><br>";

echo "Second Shape:<br>";
for ($i = 1; $i <= $rows; $i++) {
    for ($j = 1; $j <= $i; $j++) {
        echo "* ";
    }
    echo "<br>";
}

for ($i = $rows; $i >= 1; $i--) {
    for ($j = 1; $j <= $i; $j++) {
        echo "* ";
    }
    echo "<br>";
}

echo "<br><br>";

echo "Third Shape:<br>";
$rows = 3;

for ($i = 1; $i <= $rows; $i++) {
    for ($j = 1; $j <= (2 * $i - 1); $j++) {
        echo "* ";
    }
    echo "<br>";
}

for ($i = $rows - 1; $i >= 1; $i--) {
    for ($j = 1; $j <= (2 * $i - 1); $j++) {
        echo "* ";
    }
    echo "<br>";
}

