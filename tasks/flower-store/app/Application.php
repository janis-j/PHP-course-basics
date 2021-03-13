<?php

namespace App;

use App\Warehouses\Warehouse1;
use App\Warehouses\Warehouse2;
use App\Warehouses\Warehouse3;
use App\FlowerStore;
use NumberFormatter;

class Application
{
    private FlowerStore $flowerStore;

    public function __construct()
    {
        $this->flowerStore = new FlowerStore;
        $this->flowerStore->addWarehouse(new Warehouse1);
        $this->flowerStore->addWarehouse(new Warehouse2);
        $this->flowerStore->addWarehouse(new Warehouse3);
    }

    public function run()
    {
        $f = new NumberFormatter("en", NumberFormatter::CURRENCY);
        while (true) {
            foreach ($this->flowerStore->products()->all() as ['product' => $product, 'amount' => $amount]) {
                echo sprintf("%-11s", $product->goods()->name() . ': ') . sprintf("%-3s", $amount) . " available - "
                    . $f->formatCurrency($product->price() / 100, "EUR") . PHP_EOL;
            }

            $whichFlowers = ucfirst(strtolower(readline("Which flowers would you like to buy?: ")));
            $amount = (int)readline("How many?: ");
            $gender = strtolower(readline("What is you're gender (f/m)?: "));

            echo $this->printTotal($whichFlowers, $amount, $gender);
            sleep(3);
        }
    }

    public function printTotal(string $whichFlowers, int $amount, string $gender): string
    {
        $f = new NumberFormatter("en", NumberFormatter::CURRENCY);
        switch ($gender) {
            case 'm':
                return "Good choice! $whichFlowers: $amount pcs, In total - " .
                    $f->formatCurrency($this->flowerStore->getTotal($whichFlowers, $amount) / 100, "EUR")
                    . PHP_EOL;
            case 'f':
                $total = $this->flowerStore->getTotal($whichFlowers, $amount);
                return "20% discount just for you!! $whichFlowers: $amount pcs, In total - " .
                    $f->formatCurrency(($total * 0.2 + $total) / 100, "EUR") . PHP_EOL;
            default:
                return 'Sorry, input vas invalid...' . PHP_EOL;
        }
    }
}