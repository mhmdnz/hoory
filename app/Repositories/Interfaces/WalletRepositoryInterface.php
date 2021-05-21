<?php


namespace App\Repositories\Interfaces;


use App\Models\User;
use App\Models\Wallet;

interface WalletRepositoryInterface
{
    public function save($name, $number, $type, User $user): Wallet;

    public function updateBalance($walletId, $newBalance);
}
