<?php

namespace App\Http\Controllers;

use App\Http\Requests\TransactionRequest;
use App\Models\Wallet;
use App\Services\Interfaces\TransactionHandlerServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class TransactionController extends Controller
{
    /**
     * @var TransactionHandlerServiceInterface
     */
    private $transactionHandlerService;

    public function __construct(TransactionHandlerServiceInterface $transactionHandlerService)
    {
        $this->transactionHandlerService = $transactionHandlerService;
    }

    public function create(TransactionRequest $transactionRequest, Wallet $wallet)
    {
        $this->transactionHandlerService->create($transactionRequest, $wallet);

        return Redirect::route('wallet.balance', ['wallet' => $wallet]);
    }
}
