<?php


namespace App\Repositories\Interfaces;

use App\Models\User;

interface UserRepositoryInterface
{
    public function findByEmail($email);

    public function save($name, $email, $password, $emailVerifiedAt = null): User;
}
