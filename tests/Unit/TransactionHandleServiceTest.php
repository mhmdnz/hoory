<?php

namespace Tests\Unit;

use App\Http\Requests\TransactionRequest;
use App\Models\Transaction;
use App\Models\Wallet;
use App\Repositories\Eloquent\TransactionRepository;
use App\Services\Interfaces\TransactionHandlerServiceInterface;
use App\Services\TransactionHandlerService;
use Tests\TestCase;

class TransactionHandleServiceTest extends TestCase
{
    public function test_implementation()
    {
        $transactionRepositoryMock = \Mockery::mock(TransactionRepository::class);
        $transactionHandleServiceMock = new TransactionHandlerService($transactionRepositoryMock);
        $this->assertTrue($transactionHandleServiceMock instanceof TransactionHandlerServiceInterface);
    }

    public function test_create_function()
    {
        $transactionRequestMock = $this->mockTransaction();

        $walletMock = \Mockery::mock(Wallet::class)->makePartial();

        $transactionMock = \Mockery::mock(Transaction::class)->makePartial();

        $transactionRepositoryMock = \Mockery::mock(TransactionRepository::class)->makePartial();
        $transactionRepositoryMock->shouldReceive('save')->andReturn($transactionMock);
        $transactionHandleServiceMock = new TransactionHandlerService($transactionRepositoryMock);

        $transactionHandleServiceMock->create($transactionRequestMock, $walletMock);
    }

    /**
     * @return TransactionRequest|\Mockery\LegacyMockInterface|\Mockery\MockInterface
     */
    private function mockTransaction()
    {
        $transactionRequestMock = \Mockery::mock(TransactionRequest::class);
        $transactionRequestMock
            ->shouldReceive('amount')
            ->andReturnTrue();

        $transactionRequestMock
            ->shouldReceive('all')
            ->andReturnTrue();

        $transactionRequestMock
            ->shouldReceive('route')
            ->andReturnTrue();
        return $transactionRequestMock;
    }

    public function setUp(): void
    {
        parent::setUp();
        $this->artisan('migrate:refresh');
        $this->artisan('db:seed',['--class' => 'Database\Seeders\UserSeeder']);
    }
}
