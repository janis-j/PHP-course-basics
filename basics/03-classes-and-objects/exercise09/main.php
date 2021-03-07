<?php

require_once 'BankAccount.php';

$account1 = new BankAccount('Benson', 17);

echo $account1->showUserNameAndBalance() . PHP_EOL;