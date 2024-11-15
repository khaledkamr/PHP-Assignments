<?php

function previousMonthNumber($currentMonth) {
    $previousMonth = $currentMonth - 1;
    if ($previousMonth === 0) {
        $previousMonth = 12;
    }

    return $previousMonth;
}

$previousMonth = previousMonthNumber(1);
echo "The previous month number is: $previousMonth";
