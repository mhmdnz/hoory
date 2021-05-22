<?php

namespace Tests\Unit;

use App\Models\User;
use App\Repositories\Eloquent\UserRepository;
use App\Repositories\Interfaces\UserRepositoryInterface;
use App\Services\Interfaces\OAuth2ExternalInterface;
use App\Services\OAuth2ExternalService;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Tests\TestCase;

class OAuth2ExternalServiceTest extends TestCase
{
    public function test_implementation()
    {
        $mockUserRepository= \Mockery::mock(UserRepository::class);
        $OAuth2ExternalService = new OAuth2ExternalService($mockUserRepository);
        $this->assertTrue($OAuth2ExternalService instanceof OAuth2ExternalInterface);
    }

    public function test_redirect()
    {
        $socialiteStdClass = new class {
            public function redirect() {
                return true;
            }
        };
        Socialite::shouldReceive('driver')->with('google')->andReturn($socialiteStdClass);
        $mockUserRepository= \Mockery::mock(UserRepository::class);
        $OAuth2ExternalService = new OAuth2ExternalService($mockUserRepository);
        $this->assertTrue($OAuth2ExternalService->redirect('google'));
    }

    public function test_callback_available_user()
    {
        $googleUser = $this->getGoogleUser();
        Socialite::shouldReceive('driver')->with('google')->andReturn($googleUser);
        $mockUserRepository = \Mockery::mock(UserRepository::class);
        $mockUserRepository->shouldReceive('findByEmail')->andReturn(true);
        $mockUserRepository->shouldNotReceive('save');
        Auth::shouldReceive('login')->once()->andReturnTrue();
        $OAuth2ExternalService = new OAuth2ExternalService($mockUserRepository);
        $OAuth2ExternalService->callback('google');
    }

    public function test_callback_new_user()
    {
        $googleUser = $this->getGoogleUser();
        Socialite::shouldReceive('driver')->with('google')->andReturn($googleUser);
        $mockUserRepository = \Mockery::mock(UserRepository::class);
        $mockUserRepository->shouldReceive('findByEmail')->andReturn(null);
        $mockUserRepository->shouldReceive('save')->andReturn(User::find(1));
        Auth::shouldReceive('login')->once()->andReturnTrue();
        $OAuth2ExternalService = new OAuth2ExternalService($mockUserRepository);
        $OAuth2ExternalService->callback('google');
    }

    private function getGoogleUser()
    {
        return new class
        {
            public function stateless()
            {
                return new class
                {
                    public function user()
                    {
                        return new class
                        {
                            public function getEmail($userEmail = 'test@test.com')
                            {
                                return $userEmail;
                            }

                            public function getName()
                            {
                                return 'mohammad';
                            }
                        };
                    }

                };
            }
        };
    }

    public function setUp(): void
    {
        parent::setUp();
        $this->artisan('migrate:refresh');
        $this->artisan('db:seed',['--class' => 'Database\Seeders\UserSeeder']);
    }
}
