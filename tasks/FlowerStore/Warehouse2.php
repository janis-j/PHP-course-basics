<?php

class Warehouse2 extends Warehouse1 implements iWarehouse
{
    private function addFlower(Flowers $flower): void
    {
        $this->fridge[] = $flower;
    }

    public function addFewFlowers(array $flowers): void
    {
        foreach ($flowers as $flower) {
            $this->addFlower($flower);
        }
    }

    public function getAmount(string $flowerName): int
    {
        $tempInteger = 0;
        foreach($this->fridge as $flower)
        {
            if($flower->getName() === $flowerName)
            {
                $tempInteger = $flower->getAmount();
            }
        }
        return $tempInteger;
    }

    public function setAmount(string $flowerName, int $amountToAdd): void
    {
        foreach($this->fridge as $flower)
        {
            if($flower->getName() === $flowerName)
            {
                $flower->setAmount($amountToAdd);
            }
        }
    }

    public function getAllStock(): array
    {
        return $this->fridge;
    }
}