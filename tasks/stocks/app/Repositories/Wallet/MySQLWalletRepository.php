<?php

namespace App\Repositories\Wallet;

use Medoo\Medoo;

class MySQLWalletRepository implements WalletRepository
{
    private Medoo $database;

    public function __construct()
    {
        $this->database = new Medoo([
            'database_type' => 'mysql',
            'database_name' => 'codelex',
            'server' => 'localhost',
            'username' => 'janis',
            'password' => 'Maximus21@'
        ]);
    }

    public function change(int $amount): void
    {
        $this->database->update("Wallet", [
            "amount" => $amount
        ]);
    }

    public function balance(): int
    {
        return $this->database->select("Wallet", "*")[0]['amount'];
    }
}