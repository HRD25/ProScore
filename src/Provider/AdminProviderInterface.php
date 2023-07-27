<?php

namespace App\Provider;

use App\Entity\User\Admin;

interface AdminProviderInterface
{
    public function getOneByEmail(?string $email): ?Admin;
}