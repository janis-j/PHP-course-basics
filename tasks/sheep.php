<?php

$animals = ['sheep', 'sheep', 'wolf', 'sheep', 'wolf', 'sheep', 'sheep', 'sheep'];

for ($i = 0; $i < count($animals)-1; $i++) {
    if ($animals[$i] === 'sheep' && $animals[$i+1] === 'wolf') {
        echo "OMG" . ' ';
    }
    else if ($animals[$i] === 'sheep')
    {
        echo "Happy" . ' ';
    }
    else if ($animals[$i] === 'wolf')
    {
        echo "HEHE" . ' ';
    }
    PHP_EOL;
}