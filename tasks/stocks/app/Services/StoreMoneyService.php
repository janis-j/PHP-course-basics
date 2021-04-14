<?php

namespace App\Services;

use App\Repositories\Wallet\WalletRepository;

class StoreMoneyService
{
    private WalletRepository $walletRepository;

    public function __construct(WalletRepository $walletRepository)
    {
        $this->walletRepository = $walletRepository;
    }

    public function execute(int $amount): bool
    {
       $balance = $this->walletRepository->balance();
       if($balance > $amount){
            $this->walletRepository->change($balance - $amount);
            return true;
       }else{
           return false;
       }
    }

    public function balance(): int
    {
        return $this->walletRepository->balance();
    }
}