<?php

$person = new stdClass();
$person->name = "Igor";
$person->surname = "Grimski";
$person->age = 17;

function checkAge(stdClass $person): string
{
    return $person->age < 18;
}

if (checkAge($person)) {
    echo "Under 18 - {$person->name} cannot come in!" . PHP_EOL;
} else {
    echo "{$person->name} welcome, common in!" . PHP_EOL;
}


