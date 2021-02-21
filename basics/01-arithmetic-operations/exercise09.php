<?php

$inputWeight = readline("Enter you're weight in (KG): ") * 2.20462262;
$inputHeight = readline("Enter you're height (M): ") * 39.3700787;

function calculateBodyIndex(int $inputWeight, int $inputHeight): float
{
    return round($inputWeight * 703 / ($inputHeight ** 2),1);
}

$bodyMassIndex = calculateBodyIndex($inputWeight, $inputHeight);

function checkIfInOptimalWeight(float $bodyMassIndex): string
{
    $lowerLimit = 18.5;
    $higherLimit = 25;
    if ($bodyMassIndex < $lowerLimit) {
        return "you are underweight!";
    } else if ($higherLimit < $lowerLimit) {
        return "you are overweight!";
    } else {
        return "you're weight is optimal!";
    }
}

echo "You're body mass index is: $bodyMassIndex, " . checkIfInOptimalWeight($bodyMassIndex) . PHP_EOL;
