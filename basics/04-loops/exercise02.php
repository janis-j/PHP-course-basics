<?php

$inputNumber = readline("Input number you want to multiply by itself: ");
$multiplyTimes = readline("How many times?: ");
$result = $inputNumber;
for ($i = 1; $i < $multiplyTimes; $i++) {
    $result *= $inputNumber;
}
echo "$inputNumber^$multiplyTimes=$result" . PHP_EOL;

//todo complete loop to multiply i with itself n times, it is NOT allowed to use built-in pow() function

