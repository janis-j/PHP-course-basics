<?php

$numbers = [
    1789, 2035, 1899, 1456, 2013,
    1458, 2458, 1254, 1472, 2365,
    1456, 2265, 1457, 2456
];

$userEntry = readline("Enter the value to search for: " . PHP_EOL);

//todo check if an array contains a value user entered

if(in_array($userEntry, $numbers)){
    echo "Is in array!" . PHP_EOL;
} else {
    echo "Not in array!" . PHP_EOL;
}