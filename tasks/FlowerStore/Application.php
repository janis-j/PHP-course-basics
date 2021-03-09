<?php

class Application
{
    private FlowerShop $flowerShop;

    public function __construct()
    {
        $this->flowerShop = new FlowerShop;
    }

    public function run()
    {
        $warehouse1 = new Warehouse1;
        $warehouse2 = new Warehouse2;
        $warehouse3 = new Warehouse3;

        $warehouse1->addFewFlowers([new Flowers('Tulip', 20, 'wrh1'), new Flowers('Lilly', 50, 'wrh1'),
            new Flowers('Narcissus', 30, 'wrh1'), new Flowers('Rose', 20, 'wrh1')]);

        $warehouse2->addFewFlowers([new Flowers('Tulip', 20, 'wrh2'), new Flowers('Lilly', 50, 'wrh2'),
            new Flowers('Iris', 50, 'wrh2'), new Flowers('Orchid', 60, 'wrh2')]);

        $warehouse3->addFewFlowers([new Flowers('Tulip', 150, 'wrh3')]);

        while (true) {
            $this->flowerShop = new FlowerShop;
            $this->flowerShop->addCollections($warehouse1, $warehouse2, $warehouse3);
            foreach ($this->flowerShop->getCollection() as $flowers) {
                $this->flowerShop->addQuantity($flowers->getName(), $flowers->getAmount());
            }

            foreach ($this->flowerShop->getShopStock() as $flower => $quantity) {
                echo sprintf("%-10s", $flower) . ":" . sprintf("%-3s", $quantity) . " available - "
                    . $this->flowerShop->getPrice($flower, 1, 1) . " | W1: " . $warehouse1->getAmount($flower)
                    . " | W2: " . $warehouse2->getAmount($flower) . " | W3: " . $warehouse3->getAmount($flower) . PHP_EOL;
            }

            $gender = strtolower(readline("What is you're gender (f/m)?: "));
            $witchFlowers = ucfirst(strtolower(readline("Which flowers you would like to buy?: ")));
            $amount = (int)readline("How many?: ");

            $this->flowerShop->removeQuantity($witchFlowers, $amount);

            switch ($gender) {
                case 'm':
                    echo "Good choice! $witchFlowers, $amount pcs in total: " .
                        $this->flowerShop->getPrice($witchFlowers, $amount, 1) . PHP_EOL;
                    sleep(3);
                    break;
                case 'f':
                    echo "20% discount just for you!! $witchFlowers, $amount pcs in total: " .
                        $this->flowerShop->getPrice($witchFlowers, $amount, 1.2) . PHP_EOL;
                    sleep(3);
                    break;
            }
        }
    }
}