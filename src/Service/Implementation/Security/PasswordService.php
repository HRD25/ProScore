<?php

namespace App\Service\Implementation\Security;

use App\Entity\User\Admin;
use App\Exception\PasswordNotSame;
use App\Service\Security\PasswordServiceInterface;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;

class PasswordService implements PasswordServiceInterface
{
    public function __construct(
        private readonly EntityManagerInterface $manager
    ){}

    public function changePassword(?Admin $admin, Request $request): void
    {
        if(is_null($admin)){
            return;
        }
        $password = $request->get('password');
        $passwordToCheck = $request->get('repeat_password');
        $this->checkTheSamePassword($passwordToCheck, $password);
        $admin->changePassword($password);
        $this->manager->persist($admin);
        $this->manager->flush();
    }

    private function checkTheSamePassword($passwordToCheck, $password): void
    {
        if($passwordToCheck !== $password){
            throw new PasswordNotSame();
        }
    }
}