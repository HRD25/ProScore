<?php

namespace App\Provider\admin;

use App\Entity\User\Admin;
use App\Provider\AdminProviderInterface;
use App\Repository\User\AdminRepository;

class AdminProvider implements AdminProviderInterface
{
    public function __construct(
        private readonly AdminRepository $repository
    ){}

    public function getOneByEmail(?string $email): ?Admin
    {
        return $this->repository->findOneBy(['email' => $email]);
    }
}