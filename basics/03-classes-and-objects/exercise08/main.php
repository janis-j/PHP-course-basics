<?php

require_once 'SavingsAccount.php';

$account = new SavingsAccount(readline('Input start balance: '));
$account->setAnnualRate(readline('Input annual rate: '));
$howLongOpen = readline('How long has the account been opened?: ');

for ($i = 1; $i <= $howLongOpen; $i++)
{
    $account->addFunds(readline('Enter amount deposited for ' . $i . '. month: '));
    $account->withdrawFunds(readline('Enter amount withdrawn for ' . $i . '. month: '));
    $account->addMonthlyInterest();
}

$f = new NumberFormatter("en", NumberFormatter::CURRENCY);
echo 'Total deposited: ' . $f->formatCurrency($account->getTotalDeposited(), "USD") . PHP_EOL;
echo 'Total withdrawn: ' . $f->formatCurrency($account->getWithdrawn(), "USD") . PHP_EOL;
echo 'Interest earned: ' . $f->formatCurrency($account->getInterestEarned(), "USD") . PHP_EOL;
echo 'Ending balance: ' . $f->formatCurrency($account->getBalance(), "USD") . PHP_EOL;
