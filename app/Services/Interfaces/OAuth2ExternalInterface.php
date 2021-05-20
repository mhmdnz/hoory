<?php

namespace App\Services\Interfaces;

interface OAuth2ExternalInterface
{
    public function redirect($provider);

    public function callback($provider);
}
