<?php

$number = 5;

function factorial(int $number): int{
    if($number <= 1){
        return 1;
    }
    else{
        return $number * factorial($number - 1);
    }
}

echo factorial($number) . PHP_EOL;