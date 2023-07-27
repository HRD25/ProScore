<?php

namespace App\Service\Security;

use App\Entity\User\Admin;
use Symfony\Component\HttpFoundation\Request;

interface PasswordServiceInterface
{
    public function changePassword(?Admin $admin, Request $request): void;
}