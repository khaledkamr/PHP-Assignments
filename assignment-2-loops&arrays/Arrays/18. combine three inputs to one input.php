<?php

$orgArr = [
    'desciplines' => [
        'program test',
        'program test 2',
    ],
    'program_descriptions' => [
        'program desc',
        'program desc 2',
    ],
    'fees' => [
        'fees 1',
        'fees 2',
    ],
];
$res = [];
for ($i = 0; $i < 2; $i++) {
    $res[] = [
        'name' => $orgArr['desciplines'][$i],
        'program_descriptions' => $orgArr['program_descriptions'][$i],
        'fees' => $orgArr['fees'][$i],
    ];
}
print_r($res);