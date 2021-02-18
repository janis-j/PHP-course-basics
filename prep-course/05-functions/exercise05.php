<?php

$fruits = [
    [
        'name' => 'Apples',
        'weight' => 6
    ],
    [
        'name' => 'Bananas',
        'weight' => 12
    ],
    [
        'name' => 'Mango',
        'weight' => 22
    ],
    [
        'name' => 'Pineapples',
        'weight' => 35
    ]
];

$ShippingCost = [
    10 => 1,
    20 => 2,
    30 => 3
];

function checkShippingCost(int $fruitWeight, array $ShippingCost): int
{
    foreach ($ShippingCost as $limit => $price) {
        if ($fruitWeight < $limit) {
            return $price;
        }
    }
    return 5;
}


foreach ($fruits as $fruit) {
    echo "We have {$fruit['weight']}kg of {$fruit['name']}, so shipping will cost " . checkShippingCost($fruit['weight'], $ShippingCost) . "€" . PHP_EOL;
};