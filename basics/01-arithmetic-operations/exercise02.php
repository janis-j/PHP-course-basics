<?php

$input = readline("Enter an integer: ");

function chekIfOddOrEven(int $input): bool
{
    return $input % 2 === 0;
}

if (chekIfOddOrEven($input)) {
    echo "Even Number" . PHP_EOL;
    exit("Bye!") . PHP_EOL;
} else {
    echo "Odd Number" . PHP_EOL;
    exit("Bye!") . PHP_EOL;
}