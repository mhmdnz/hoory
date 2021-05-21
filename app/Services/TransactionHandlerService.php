<?php


namespace App\Services;


use App\Http\Requests\TransactionRequest;
use App\Models\Wallet;
use App\Repositories\Interfaces\TransactionRepositoryInterface;
use App\Services\Interfaces\TransactionHandlerServiceInterface;

class TransactionHandlerService implements TransactionHandlerServiceInterface
{
    /**
     * @var TransactionRepositoryInterface
     */
    private $transactionRepository;

    public function __construct(TransactionRepositoryInterface $transactionRepository)
    {
        $this->transactionRepository = $transactionRepository;
    }

    public function create(TransactionRequest $transactionRequest, Wallet $wallet)
    {
        $this->transactionRepository->save($transactionRequest->amount, $wallet);
    }
}
