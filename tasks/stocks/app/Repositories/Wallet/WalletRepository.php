<?php

namespace App\Repositories\Wallet;

interface WalletRepository
{
    public function change(int $amount): void;

    public function balance(): int;
}