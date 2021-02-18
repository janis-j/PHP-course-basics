<?php

$john = new stdClass();
$john->name = "John";
$john->surname = "Dolson";
$john->age = 17;
$john->birthday = "30.02.2004";

$jane = new stdClass();
$jane->name = "Jane";
$jane->surname = "Ferguson";
$jane->age = 32;
$jane->birthday = "24.06.1993";

$Mike = new stdClass();
$Mike->name = "Mike";
$Mike->surname = "Dew";
$Mike->age = 50;
$Mike->birthday = "30.02.1971";

$people = [
    $john,
    $jane,
    $Mike
];

function isUnderAge(stdClass $person): bool
{
    return $person->age < 18;
}


foreach ($people as $person) {
    if (isUnderAge($person)) {
        echo "Under 18 - {$person->name} cannot come in!\n";
    } else {
        echo "{$person->name} welcome, common in!\n";
    }
}
