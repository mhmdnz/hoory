<?php


namespace App\Services;


use App\Http\Requests\WalletRequest;
use App\Repositories\Interfaces\WalletRepositoryInterface;
use App\Services\Interfaces\WalletHandlerServiceInterface;
use Illuminate\Support\Facades\Auth;

class WalletHandlerService implements WalletHandlerServiceInterface
{
    /**
     * @var WalletRepositoryInterface
     */
    private $walletRepository;

    public function __construct(WalletRepositoryInterface $walletRepository)
    {
        $this->walletRepository = $walletRepository;
    }

    public function create(WalletRequest $walletRequest): bool
    {
        if($this->walletRepository->save(
            $walletRequest->name,
            $walletRequest->number,
            $walletRequest->type,
            Auth::user()
        )) {
            return true;
        }

        return false;
    }
}
