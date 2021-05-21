<?php

namespace App\Providers;

use App\Repositories\Eloquent\TransactionRepository;
use App\Repositories\Interfaces\TransactionRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class EloquentTransactionRepositoryProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(TransactionRepositoryInterface::class, TransactionRepository::class);
    }
}
