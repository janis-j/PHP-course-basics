<?php

namespace App\Models;

class Stock
{
    private int $id;
    private string $name;
    private int $amount;
    private int $price;

    public function __construct(
        int $id,
        string $name,
        int $amount,
        int $price
    )
    {
        $this->setId($id);
        $this->setName($name);
        $this->setAmount($amount);
        $this->setPrice($price);
    }

    private function setId(int $id): void
    {
        $this->id = $id;
    }

    private function setName(string $name): void
    {
        $this->name = ucfirst(strtolower($name));
    }

    private function setAmount(int $amount)
    {
        $this->amount = $amount;
    }

    private function setPrice(int $price)
    {
        $this->price = $price;
    }

    public function id(): string
    {
        return $this->id;
    }

    public function name(): string
    {
        return $this->name;
    }

    public function amount(): int
    {
        return $this->amount;
    }

    public function price(): int
    {
        return $this->price;
    }

    public function toArray(): array
    {
        return [
            "id" => $this->id(),
            "name" => $this->name(),
            "amount" => $this->amount(),
            "price" => $this->price(),
        ];
    }
}