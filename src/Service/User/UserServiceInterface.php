<?php

namespace App\Service\User;

use Symfony\Component\HttpFoundation\Request;

interface UserServiceInterface
{
    public function create(Request $request): void;

    public function edit(Request $request): void;

    public function remove(Request $request): void;
}