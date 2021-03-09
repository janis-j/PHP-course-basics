<?php


class Flowers
{
    private string $name;
    private int $amount;
    private string $warehouse;

    public function __construct(string $name, int $amount, string $warehouse)
    {
        $this->name = $name;
        $this->amount = $amount;
        $this->warehouse = $warehouse;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getAmount(): int
    {
        return $this->amount;
    }

    public function setAmount(int $amount): void
    {
        $this->amount += $amount;
    }

}