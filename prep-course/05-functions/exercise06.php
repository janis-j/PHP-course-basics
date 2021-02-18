<?php

$array = [2, 5, 2, 2.5, "string"];

function doubledInteger($integer)
{
    return $integer * 2;
}

for ($i = 0; $i < count($array); $i++) {
    if (gettype($array[$i]) === "integer") {
        echo doubledInteger($array[$i]) . PHP_EOL;
    } else {
        echo $array[$i] . PHP_EOL;
    }
}
