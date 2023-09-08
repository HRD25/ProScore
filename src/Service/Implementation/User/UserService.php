<?php

namespace App\Service\Implementation\User;

use App\Factory\UserFactoryInterface;
use App\Service\User\UserServiceInterface;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;

class UserService implements UserServiceInterface
{

    public function __construct(
        private readonly UserFactoryInterface$userFactory,
        private readonly EntityManagerInterface $entityManager
    ){}

    public function create(Request $request): void{
        $user = $this->userFactory->create($request);
        $this->entityManager->persist($user);
        $this->entityManager->flush();
    }

    public function edit(Request $request): void{}

    public function remove(Request $request): void{}
}