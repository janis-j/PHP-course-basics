<?php

$firstNum = readline("Input the 1st number: ");

$secondNum = readline("Input the 2nd number: ");

$thirdNum = readline("Input the 3rd number: ");

$numArray = [
    $firstNum,
    $secondNum,
    $thirdNum
];

echo "The largest number is: " . max($numArray) . PHP_EOL;