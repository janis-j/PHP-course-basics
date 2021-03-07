<?php


class BankAccount
{

    private string $name;
    private int $balance;

    public function __construct(string $name, float $balance)
    {
        $this->name = $name;
        $this->balance = $balance * 100;
    }

    public function showUserNameAndBalance(): string
    {
        $f = new NumberFormatter("en", NumberFormatter::CURRENCY);
        return $this->name . ', ' . $f->formatCurrency($this->balance / 100, "USD");
    }
}