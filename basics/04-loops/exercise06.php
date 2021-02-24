<?php

$howManyRows = readline("How many rows to print?: ");

for ($i = 0; $i < $howManyRows - 1; $i++) {
    for ($j = 0; $j < $howManyRows - 1 - $i; $j++) {
        echo "////";
    }
    for ($j = 0; $j < $i; $j++) {
        echo "********";
    }
    for ($j = 0; $j < $howManyRows - 1 - $i; $j++) {
        echo "\\\\\\\\";
    }
    echo PHP_EOL;
}
echo str_repeat('********', $howManyRows - 1) . PHP_EOL;
