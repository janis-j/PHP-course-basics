<?php
$lowerBound = 1;
$upperBound = 100;
$arrayOfNumbers = [];

for($i = $lowerBound;$i <= $upperBound; $i++){
    array_push($arrayOfNumbers,$i);
}

echo "The sum of $lowerBound to $upperBound is " . array_sum($arrayOfNumbers) . PHP_EOL;
echo "The average is " . array_sum($arrayOfNumbers)/100 . PHP_EOL;

