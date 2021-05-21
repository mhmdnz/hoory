<?php


namespace App\Services\Interfaces;


use App\Http\Requests\WalletRequest;

interface WalletHandlerServiceInterface
{
    public function create(WalletRequest $walletRequest): bool;
}
