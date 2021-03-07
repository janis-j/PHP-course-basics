<?php


class Bank
{
    private array $bank;

    public function addBankAccount(Account $account)
    {
        $this->bank[] = $account;
    }
}