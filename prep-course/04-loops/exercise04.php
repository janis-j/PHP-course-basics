<?php

$numbers = [1, 3, 5, 8, 9, 4, 5, 6];

foreach ($numbers as $number) {
    if ($number % 3 === 0) {
        echo $number . PHP_EOL;
    }
}