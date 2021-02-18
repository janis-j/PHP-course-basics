<?php

$products = [
    [
        "name" => 'Milk',
        "price" => 2
    ],
    [
        "name" => 'Sugar',
        "price" => 4
    ],
    [
        "name" => 'Coffee',
        "price" => 7
    ],
    [
        "name" => 'Bread',
        "price" => 3
    ],
];
function shopping(array $products): string
{
    foreach ($products as $key => $product) {
        echo "$key: {$product['name']}, price: {$product['price']}€" . PHP_EOL;
    }
    $chooseProduct = readline("What would you like to buy?: ");

    $chooseAmount = readline("How many?: ");

    $totalAmount = $chooseAmount * $products[$chooseProduct]['price'];

    echo "You ordered {$products[$chooseProduct]['name']}, $chooseAmount pcs., total amount {$totalAmount}€" . PHP_EOL;

    $restartOrQuit = readline("Would like to shop some more?(yes/no):" . PHP_EOL);

    if ($restartOrQuit === 'yes') {
        echo shopping($products) . PHP_EOL;
    }
    return "Bye!" . PHP_EOL;
}

echo shopping($products);
