<?php
$integer1 = readline("Enter first number:");
$integer2 = readline("Enter second number:");

function ifOneOfThem15(int $integer1, int $integer2): bool{
    return $integer1 === 15 || $integer2 === 15;
}

echo ifOneOfThem15($integer1,$integer2);