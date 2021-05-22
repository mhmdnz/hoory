<?php

namespace Tests\Unit;

use App\Http\Requests\WalletRequest;
use App\Models\User;
use App\Models\Wallet;
use App\Repositories\Eloquent\WalletRepository;
use App\Services\Interfaces\WalletHandlerServiceInterface;
use App\Services\WalletHandlerService;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;
use Tests\TestCase;

class WalletHandlerServiceTest extends TestCase
{
    public function test_implementation()
    {
        $walletRepositoryMock = \Mockery::mock(WalletRepository::class);
        $walletHandlerService = new WalletHandlerService($walletRepositoryMock);
        $this->assertTrue($walletHandlerService instanceof WalletHandlerServiceInterface);
    }

    public function test_create_function()
    {
        $walletRepositoryMock = $this->getWalletRepositoryMock();
        $walletRequestMock = $this->getWalletRequestMock();
        Auth::shouldReceive('user')->once()->andreturn(User::find(1));
        $walletHandlerService = new WalletHandlerService($walletRepositoryMock);
        $result = $walletHandlerService->create($walletRequestMock);
        $this->assertTrue($result);
    }

    /**
     * @return \Mockery\Mock
     */
    private function getWalletRequestMock()
    {
        $walletRequestMock = \Mockery::mock(WalletRequest::class)->makePartial();
        $walletRequestMock
            ->shouldReceive('name')
            ->andReturn('Mohammad');
        $walletRequestMock
            ->shouldReceive('number')
            ->andReturn('9351566696');
        $walletRequestMock
            ->shouldReceive('type')
            ->andReturn('debit');
        $walletRequestMock
            ->shouldReceive('all')
            ->andReturn(true);
        return $walletRequestMock;
    }

    /**
     * @return WalletRepository|\Mockery\LegacyMockInterface|\Mockery\MockInterface
     */
    private function getWalletRepositoryMock()
    {
        $walletInstance = \Mockery::mock(Wallet::class);
        $walletRepositoryMock = \Mockery::mock(WalletRepository::class);
        $walletRepositoryMock->shouldReceive('save')->andReturn($walletInstance);
        return $walletRepositoryMock;
    }

    public function setUp(): void
    {
        parent::setUp();
        $this->artisan('migrate:refresh');
        $this->artisan('db:seed',['--class' => 'Database\Seeders\UserSeeder']);
    }
}
