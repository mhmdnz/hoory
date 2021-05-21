<?php

namespace App\Providers;

use App\Services\Interfaces\WalletHandlerServiceInterface;
use App\Services\WalletHandlerService;
use Illuminate\Support\ServiceProvider;

class WalletHandlerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(WalletHandlerServiceInterface::class, WalletHandlerService::class);
    }
}
