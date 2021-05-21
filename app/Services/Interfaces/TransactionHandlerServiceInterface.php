<?php


namespace App\Services\Interfaces;


use App\Http\Requests\TransactionRequest;
use App\Models\Wallet;

interface TransactionHandlerServiceInterface
{
    public function create(TransactionRequest $transactionRequest, Wallet $wallet);
}
