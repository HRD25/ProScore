<?php

namespace App\Factory\Implementation;

use App\Entity\User\User;
use App\Factory\UserFactoryInterface;
use Symfony\Component\HttpFoundation\Request;

class UserFactory implements UserFactoryInterface
{
    public function create(Request $request): User
    {
        return new User(
            $request->get('email', null),
            $request->get('firstName', null),
            $request->get('surName', null),
        );
    }
}