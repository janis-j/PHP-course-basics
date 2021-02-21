<?php

$cozaLozaWozaArray = [];

for ($i = 1; $i <= 110; $i++) {
    if ($i % 3 === 0) {
        array_push($cozaLozaWozaArray, "coza");
    } else if ($i % 5  === 0) {
        array_push($cozaLozaWozaArray, "loza");
    } else if ($i % 7  === 0) {
        array_push($cozaLozaWozaArray, "woza");
    } else {
        array_push($cozaLozaWozaArray, $i);
    }
}

foreach ($cozaLozaWozaArray as $value) {
    echo "$value ";
}
