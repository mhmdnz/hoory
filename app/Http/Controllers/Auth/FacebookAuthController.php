<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Services\Interfaces\OAuth2ExternalInterface;
use Illuminate\Http\Request;

class FacebookAuthController extends Controller
{
    CONST FACEBOOK_PROVIDER_NAME = 'facebook';
    /**
     * @var OAuth2ExternalInterface
     */
    private $OAuth2External;

    public function __construct(OAuth2ExternalInterface $OAuth2External)
    {
        $this->OAuth2External = $OAuth2External;
    }

    public function redirect()
    {
        return $this->OAuth2External->redirect(self::FACEBOOK_PROVIDER_NAME);
    }

    public function callBack(Request $request)
    {
        return$this->OAuth2External->callback(self::FACEBOOK_PROVIDER_NAME);
    }
}
