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
        "name" => 'Coffe',
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
        echo "$key: {$product['name']}, price: {$product['price']}€ \n";
    }
    $chooseProduct = readline("What would you like to buy?: ");

    $chooseAmount = readline("How many?: ");

    $totalAmount = $chooseAmount * $products[$chooseProduct]['price'];

    echo "You ordered {$products[$chooseProduct]['name']}, $chooseAmount pcs., total amount {$totalAmount}€\n";

    $reatarOrQuit = readline("Would like to shop some more?(yes/no):");

    if ($reatarOrQuit === 'yes') {
        echo shopping($products);
    }
    echo "Bye!";
    return PHP_EOL;
}

echo shopping($products);
//