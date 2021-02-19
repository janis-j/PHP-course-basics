<?php

$person = [
    'name' => "Peter",
    'licenceOnHand' => "M",
    'cash' => 4500
];

$guns = [
    [
        'name' => 'Colt 1911',
        'licence' => ['L', "S"],
        'price' => 1490
    ],
    [
        'name' => 'bazooka',
        'licence' => ['M', 'L'],
        'price' => 5300
    ],
    [
        'name' => 'Walther',
        'licence' => ['S', 'M'],
        'price' => 745
    ]
];

foreach ($guns as $key => $gun) {
    echo "$key: {$gun['name']}, price: {$gun['price']}€" . PHP_EOL;
}

$witchGun = readline("Witch gun would {$person['name']} like to buy?: " . PHP_EOL);

function checkIfEnoughMoney(array $person, array $gun, int $witchGun): bool
{
    return $person['cash'] > $gun[$witchGun]['price'];
}

function checkIfValidLicence(array $person, array $gun, int $witchGun): bool
{
    return $person['licenceOnHand'] === $gun[$witchGun]['licence'][0]
        || $person['licenceOnHand'] === $gun[$witchGun]['licence'][1];
}

function validateBuyer(array $person, array $gun, int $witchGun): string
{
    if (checkIfEnoughMoney($person, $gun, $witchGun) && checkIfValidLicence($person, $gun, $witchGun)) {
        return "{$gun[$witchGun]['name']} is a good choice, that will be {$gun[$witchGun]['price']}€" . PHP_EOL;
    }
    if (!checkIfEnoughMoney($person, $gun, $witchGun) && checkIfValidLicence($person, $gun, $witchGun)) {
        return "Sorry, you don't have enough money to buy {$gun[$witchGun]['name']}..." . PHP_EOL;
    }
    if (checkIfEnoughMoney($person, $gun, $witchGun) && !checkIfValidLicence($person, $gun, $witchGun)) {
        return "Sorry, you don't have the right licence to buy {$gun[$witchGun]['name']}..." . PHP_EOL;
    }
    return "Something went wrong" . PHP_EOL;
}
echo validateBuyer($person, $guns, $witchGun);
