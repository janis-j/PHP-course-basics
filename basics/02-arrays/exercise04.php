<?php

$originalArray = [];

for ($i = 0; $i < 10; $i++){
    array_push($originalArray, rand(1,100));
}

$copyOfArray = $originalArray;

$change = array (count($originalArray)-1 => -7);

array_pop($originalArray);
array_push($originalArray,-7);

echo "Array 1: ";
foreach ($originalArray as $number){
    echo $number . ' ';
}
echo PHP_EOL;
echo "Array 2: ";
foreach ($copyOfArray as $number){
    echo $number . ' ';
}
echo PHP_EOL;