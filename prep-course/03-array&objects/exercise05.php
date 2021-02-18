<?php

$items = [
    [
        [
            "name" => "John",
            "surname" => "Doe",
            "age" => 50
        ],
        [
            "name" => "Jane",
            "surname" => "Doe",
            "age" => 41
        ]
    ]
];

foreach ($items[0] as $values) {
    foreach ($values as $value) {
        echo $value . ' ';
    }
}
