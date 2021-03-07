<?php

require_once 'Bank.php';
require_once 'Account.php';


$myAccount = new Account('My Account', 0);
$mattsAccount = new Account('Matts Account', 100);
$joshAccount = new Account('Josh Account', 0);
$bank = new Bank;
$bank = [
    $myAccount,
    $mattsAccount,
    $joshAccount
];

foreach($bank as $account){
    echo $account->getAccount() . PHP_EOL;
}

echo PHP_EOL;

$mattsAccount->makeTransfer($myAccount, 50);

$myAccount->makeTransfer($joshAccount, 25);

foreach($bank as $account){
    echo $account->getAccount() . PHP_EOL;
}

