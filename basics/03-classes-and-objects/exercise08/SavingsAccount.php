<?php


class SavingsAccount
{
    private int $balance;
    private float $annualRate;
    private int $totalWithdrawn = 0;
    private int $totalDeposited = 0;
    private int $totalInterestEarned;

    public function __construct(int $balance)
    {
        $this->balance = $balance * 100;
    }

    public function setAnnualRate(int $annualRate): void
    {
        $this->annualRate = $annualRate;
    }

    public function addFunds(float $funds): void
    {
        $this->balance += $funds * 100;
        $this->totalDeposited += $funds * 100;
    }

    public function withdrawFunds(float $funds): void
    {
        $this->balance -= $funds * 100;
        $this->totalWithdrawn += $funds * 100;
    }

    public function setMonthlyInterestRate(int $howLongAccountOpened): void
    {
        $this->monthlyRate = $this->annualRate / 100 / 12;
    }

    public function addMonthlyInterest(): void
    {
        $this->totalInterestEarned = $this->balance * $this->annualRate/12;
    }

    public function getTotalDeposited(): float
    {
        return round($this->totalDeposited / 100, 2);
    }

    public function getWithdrawn(): float
    {
        return round($this->totalWithdrawn / 100, 2);
    }

    public function getInterestEarned(): float
    {
        return round($this->totalInterestEarned / 100, 2);
    }

    public function getBalance(): float
    {
        return round(($this->balance + $this->totalInterestEarned) / 100, 2);
    }

}