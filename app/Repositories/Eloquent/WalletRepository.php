<?php


namespace App\Repositories\Eloquent;


use App\Models\User;
use App\Models\Wallet;
use App\Repositories\Interfaces\WalletRepositoryInterface;

class WalletRepository implements WalletRepositoryInterface
{

    public function save($name, $number, $type, User $user): Wallet
    {
        $wallet = new Wallet();
        $wallet->name = $name;
        $wallet->number = $number;
        $wallet->type = $type;
        $user->wallets()->save($wallet);

        return $wallet;
    }

    public function updateBalance($walletId, $newBalance)
    {
        $wallet = Wallet::find($walletId);
        $wallet->balance = $newBalance;
        $wallet->update();
    }
}
