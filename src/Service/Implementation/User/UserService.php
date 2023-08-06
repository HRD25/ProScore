<?php

namespace App\Service\Implementation\User;

use App\Service\User\UserServiceInterface;
use Symfony\Component\HttpFoundation\Request;

class UserService implements UserServiceInterface
{
    public function create(Request $request): void{}

    public function edit(Request $request): void{}

    public function remove(Request $request): void{}
}