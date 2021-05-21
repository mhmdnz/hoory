<?php

namespace App\Providers;

use App\Services\Interfaces\TransactionHandlerServiceInterface;
use App\Services\TransactionHandlerService;
use Illuminate\Support\ServiceProvider;

class TransactionHandlerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(TransactionHandlerServiceInterface::class, TransactionHandlerService::class);
    }
}
