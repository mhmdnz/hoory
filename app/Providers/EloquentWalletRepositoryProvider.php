<?php

namespace App\Providers;

use App\Repositories\Eloquent\WalletRepository;
use App\Repositories\Interfaces\WalletRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class EloquentWalletRepositoryProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(WalletRepositoryInterface::class, WalletRepository::class);
    }
}
