<?php

namespace App\Providers;

use App\Services\Interfaces\OAuth2ExternalInterface;
use App\Services\OAuth2ExternalService;
use Illuminate\Support\ServiceProvider;

class OAuth2ExternalServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(OAuth2ExternalInterface::class, OAuth2ExternalService::class);
    }
}
