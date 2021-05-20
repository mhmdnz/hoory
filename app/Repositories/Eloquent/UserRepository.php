<?php

namespace App\Repositories\Eloquent;

use App\Models\User;
use App\Repositories\Interfaces\UserRepositoryInterface;

class UserRepository implements UserRepositoryInterface
{

    public function findByEmail($email)
    {
        return User::where('email', $email)->first();
    }

    public function save($name, $email, $password, $emailVerifiedAt = null): User
    {
        $user = new User();
        $user->name = $name;
        $user->email = $email;
        $user->password = $password;
        $user->email_verified_at = $emailVerifiedAt;
        $user->save();

        return $user;
    }
}
