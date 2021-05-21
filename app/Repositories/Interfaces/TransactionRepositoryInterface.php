<?php


namespace App\Repositories\Interfaces;


use App\Models\Transaction;
use App\Models\Wallet;

interface TransactionRepositoryInterface
{
    public function save($amount, Wallet $wallet): Transaction;
}
