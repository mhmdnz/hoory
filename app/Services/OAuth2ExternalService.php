<?php

namespace App\Services;

use App\Repositories\Interfaces\UserRepositoryInterface;
use App\Services\Interfaces\OAuth2ExternalInterface;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class OAuth2ExternalService implements OAuth2ExternalInterface
{
    CONST OAUTH_DEFAULT_PASSWORD = '123456';
    /**
     * @var UserRepositoryInterface
     */
    protected $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function redirect($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function callback($provider)
    {
        $googleUser = Socialite::driver($provider)->stateless()->user();
        $user = $this->userRepository->findByEmail($googleUser->getEmail());
        if (!$user) {
            $user = $this->userRepository->save(
                $googleUser->getName(),
                $googleUser->getEmail(),
                md5(self::OAUTH_DEFAULT_PASSWORD),
                Carbon::now()
            );
        }

        Auth::login($user);

        return redirect('/dashboard');
    }
}
