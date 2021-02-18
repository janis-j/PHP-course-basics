<?php

$john = new stdClass();
$john->name = "John";
$john->surname = "Dolson";
$john->age = 30;
$john->birthday = "30.02.1991";

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

$persons = [
    $john,
    $jane,
    $Mike
];

foreach ($persons as $person) {
    foreach ($person as $key => $val) {
        echo "$key: $val \n";
    }
}