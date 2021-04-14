<?php

namespace App\Models;

use DateTime;

class Stock
{
    private int $id;
    private string $name;
    private int $amount;
    private int $price;
    private int $timestamp;

    public function __construct(
        int $id,
        string $name,
        int $amount,
        int $price,
        int $timestamp
    )
    {
        $this->setId($id);
        $this->setName($name);
        $this->setAmount($amount);
        $this->setPrice($price);
        $this->setTimestamp($timestamp);
    }

    private function setId(int $id): void
    {
        $this->id = $id;
    }

    private function setName(string $name): void
    {
        $this->name = strtoupper($name);
    }

    private function setAmount(int $amount): void
    {
        $this->amount = $amount;
    }

    private function setPrice(int $price): void
    {
        $this->price = $price;
    }

    private function setTimestamp(int $timestamp): void
    {
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

    public function amount(): int
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

    public function toArray(): array
    {
        return [
            "id" => $this->id(),
            "name" => $this->name(),
            "amount" => $this->amount(),
            "price" => $this->price(),
            "date" => date('m/d/Y H:i:s', $this->timestamp())
        ];
    }
}