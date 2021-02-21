<?php

$integer1 = readline("Enter first number:");
$integer2 = readline("Enter second number:");

function isSumOrDifferenceOrOneOfThem(int $integer1, int $integer2): bool
{
    return $integer1 === 15 ||
           $integer2 === 15 ||
           $integer1 + $integer2 === 15 ||
           $integer1 - $integer2 === 15 ||
           $integer2 - $integer1 === 15;
}

if (isSumOrDifferenceOrOneOfThem($integer1, $integer2)) {
    echo "true" . PHP_EOL;
} else {
    echo "false" . PHP_EOL;
}