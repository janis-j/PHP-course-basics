<?php


class Account
{
    private string $name;
    private int $balance;

    public function __construct(string $name, int $balance)
    {
        $this->name = $name;
        $this->balance = $balance * 100;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getBalance(): string
    {
        $f = new NumberFormatter("en", NumberFormatter::CURRENCY);
        return $f->formatCurrency($this->balance / 100, "USD");
    }

    public function addBalance(float $amount): void
    {
        $this->balance += $amount;
    }

    public function getAccount(): string
    {
        return $this->name . ', balance: ' . $this->getBalance();
    }

    public function makeTransfer(Account $toAccount, float $amount)
    {
        $this->balance -= $amount*100;
        $toAccount->addBalance($amount*100);
    }
}