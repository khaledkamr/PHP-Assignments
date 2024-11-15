<?php

function incrementDateByMonth($date) {
    $date = date_create($date);
    date_modify($date, "+1 month");
    return date_format($date, "Y-m-d");
}

$date = incrementDateByMonth("2012-12-21");

echo "New date: " . $date;
