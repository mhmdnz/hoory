<?php


namespace App\Repositories\Eloquent;


use App\Models\Transaction;
use App\Models\Wallet;
use App\Repositories\Interfaces\TransactionRepositoryInterface;
use App\Repositories\Interfaces\WalletRepositoryInterface;
use Illuminate\Support\Facades\Auth;

class TransactionRepository implements TransactionRepositoryInterface
{

    /**
     * @var WalletRepositoryInterface
     */
    private $walletRepository;

    public function __construct(WalletRepositoryInterface $walletRepository)
    {
        $this->walletRepository = $walletRepository;
    }

    public function save($amount, Wallet $wallet): Transaction
    {
        $transaction = new Transaction();
        $user = Auth::user();
        $newBalance = $wallet->balance + $amount;
        $transaction->amount = $amount;
        $transaction->wallet_old_balance = $wallet->balance;
        $transaction->wallet_new_balance = $newBalance;
        $transaction->wallet_type = $wallet->type;
        $transaction->wallet()->associate($wallet);
        $user->transactions()->save($transaction);
        $this->walletRepository->updateBalance($wallet->id, $newBalance);

        return $transaction;
    }
}
