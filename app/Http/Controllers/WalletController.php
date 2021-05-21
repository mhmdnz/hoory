<?php

namespace App\Http\Controllers;

use App\Http\Requests\WalletRequest;
use App\Models\Wallet;
use App\Services\WalletHandlerService;
use Illuminate\Http\Request;

class WalletController extends Controller
{
    /**
     * @var WalletHandlerService
     */
    private $walletHandlerService;

    public function __construct(WalletHandlerService $walletHandlerService)
    {
        $this->walletHandlerService = $walletHandlerService;
    }

    public function show()
    {
        return view('addWallet');
    }

    public function create(WalletRequest $walletRequest)
    {
        $this->walletHandlerService->create($walletRequest);

        return redirect('/wallet');
    }
}
