<?php


namespace App\Services;


class StoreStockRequest
{
    private string $id;
    private string $name;
    private string $amount;
    private int $price;

    public function __construct(
        string $id,
        string $name,
        string $amount,
        int $price
    )
    {

        $this->id = $id;
        $this->setName($name);
        $this->setAmount($amount);
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

    public function amount(): string
    {
        return $this->amount;
    }

    public function price(): int
    {
        return $this->price;
    }

    private function setName(string $name): void
    {
        $this->name = $name;
    }

    private function setAmount(string $amount): void
    {
        $this->amount = $amount;
    }

}