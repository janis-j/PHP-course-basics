<?php


class FlowerShop
{
    const PRICES =
        [
            'Tulip' => 150,
            'Lilly' => 450,
            'Narcissus' => 90,
            'Rose' => 350,
            'Iris' => 130,
            'Orchid' => 600
        ];

    private array $shopStock =
        [
            'Tulip' => 0,
            'Lilly' => 0,
            'Narcissus' => 0,
            'Rose' => 0,
            'Iris' => 0,
            'Orchid' => 0
        ];

    private array $allWarehouseCollection;

    private function removeQuantity(string $name, int $quantity): void
    {
        $quant = $quantity;
        while ($quant !== 0) {
            foreach ($this->allWarehouseCollection as &$flower) {
                if ($flower->getName() === $name) {
                    if ($flower->getAmount() < $quant) {
                        $quant -= $flower->getAmount();
                        $flower->setAmount(-$flower->getAmount());
                    } else {
                        $flower->setAmount(-$quant);
                        $quant = 0;
                    }
                }
            }
        }
    }

    public function addCollections(Warehouse1 $wrh1, Warehouse2 $wrh2, Warehouse3 $wrh3): void
    {
        $this->allWarehouseCollection = array_merge($wrh1->getAllStock(), $wrh2->getAllStock(), $wrh3->getAllStock());
    }

    public function getCollection(): array
    {
        return $this->allWarehouseCollection;
    }

    public function getPrice(string $name, int $amount, float $discount): string
    {
        $f = new NumberFormatter("en", NumberFormatter::CURRENCY);
        if (!array_key_exists($name, $this->shopStock)) {
            return 'Sorry, the flower type has been input wrong...';
        } else if ($amount > $this->shopStock[$name] || $amount <= 0) {
            return 'Sorry, amount you have chosen is not available or valid!!';
        } else if ($discount === 1) {
            $this->removeQuantity($name, $amount);
            return "Good choice! $name, $amount pcs in total: "
                . $f->formatCurrency(FlowerShop::PRICES[$name] * $amount / $discount / 100, "EUR");
        } else {
            $this->removeQuantity($name, $amount);
            return "20% discount just for you!! $name, $amount pcs in total: "
                . $f->formatCurrency(FlowerShop::PRICES[$name] * $amount / $discount / 100, "EUR");
        }
    }

    public function addQuantity(string $name, int $quantity): void
    {
        $this->shopStock[$name] += $quantity;
    }

    public function getShopStock(): array
    {
        return $this->shopStock;
    }

}