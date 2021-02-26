<?php

class Product
{
    private string $name;
    private float $priceAtStart;
    private int $amountAtStart;

    public function __construct(string $name, float $priceAtStart, int $amountAtStart)
    {
        $this->name = $name;
        $this->priceAtStart = $priceAtStart;
        $this->amountAtStart = $amountAtStart;
    }

    public function printProduct(): string
    {
        return "$this->name, price " . sprintf('%.2f', $this->priceAtStart) . "EUR, amount {$this->amountAtStart} units";
    }

    public function changePrice(float $newPrice): void
    {
        $this->priceAtStart = $newPrice;
    }

    public function changeQuantity(int $quantityToAddOrRemove): void
    {
        $this->amountAtStart += $quantityToAddOrRemove;
    }
}

$products = [
    new Product("Logitech mouse", 70.00, 14),
    new Product("iPhone 5s", 999.99, 3),
    new Product("Epson EB-U05", 440.46, 1),
];
while (true) {
    print("\033[2J\033[;H");
    foreach ($products as $key => $product) {
        echo "[$key] " . $product->printProduct() . PHP_EOL;
    }
    echo "[3] Exit" . PHP_EOL;
    $chooseProduct = readline("Choose product from the list: ");
    print("\033[2J\033[;H");
    echo "U choose: " . $products[$chooseProduct]->printProduct() . PHP_EOL;
    echo "[0] Change price" . PHP_EOL;
    echo "[1] Change quantity" . PHP_EOL;
    $chooseOption = (int)readline("Choose an option: ");
    if ($chooseOption === 0) {
        print("\033[2J\033[;H");
        echo "Product: " . $products[$chooseProduct]->printProduct() . PHP_EOL;
        (float)$choosePrice = readline("New price: ");
        $products[$chooseProduct]->changePrice($choosePrice);
    } else if ($chooseOption === 1) {
        print("\033[2J\033[;H");
        echo "Product: " . $products[$chooseProduct]->printProduct() . PHP_EOL;
        (int)$chooseQuantity = readline("New quantity: ");
        $products[$chooseProduct]->changeQuantity($chooseQuantity);
    } else {
        exit("Bye!" . PHP_EOL);
    }
}

