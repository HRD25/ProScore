<?php

namespace App\Service\Security;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

interface LoginServiceInterface
{
    public function login(Request $request): Response;
}