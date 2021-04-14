<?php


namespace App\Services;


class StoreStockRequest
{
    private string $id;
    private string $name;
    private string $amount;
    private int $price;
    private int $timestamp;

    public function __construct(
        string $id,
        string $name,
        string $amount,
        int $price,
        int $timestamp
    )
    {

        $this->id = $id;
        $this->setName($name);
        $this->setAmount($amount);
        $this->price = $price;
        $this->timestamp = $timestamp;
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

    public function timestamp(): int
    {
        return $this->timestamp;
    }

    private function setName(string $name): void
    {
        $this->name = $name;
    }

    private function setAmount(string $amount): void
    {
        $this->amount = $amount;
    }

    private function setTimestamp(int $timestamp): void
    {
        $this->timestamp = $timestamp;
    }

}