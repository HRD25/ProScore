<?php

namespace App\Service\Implementation\Security;

use App\Config\Admin\RouteSchema;
use App\Entity\User\User;
use App\Exception\PasswordNotSame;
use App\Exception\UserDoesNotExist;
use App\Provider\AdminProviderInterface;
use App\Service\Security\LoginServiceInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;
use Symfony\Component\Security\Http\Event\InteractiveLoginEvent;
use Symfony\Contracts\EventDispatcher\EventDispatcherInterface;

class LoginService extends AbstractController implements LoginServiceInterface
{
    public function __construct(
        private readonly EventDispatcherInterface $eventDispatcher,
        private readonly AdminProviderInterface $adminProvider
    ){}

    public function login(Request $request): Response
    {
        $email = $request->get('_username');
        $password = $request->get('_password');
        $user = $this->adminProvider->getOneByEmail($email);
        $this->checkUserIsExists($user);
        $this->checkTheSamePassword($password, $user->getPassword());
        $token = new UsernamePasswordToken($user, 'user_firewall', $user->getRoles());
        $this->container->get("security.token_storage")->setToken($token);
        $event = new InteractiveLoginEvent($request, $token);
        $this->eventDispatcher->dispatch($event);

        return new RedirectResponse($this->generateUrl('admin_main'));
    }

    private function checkUserIsExists($user): void
    {
        if(is_null($user)){
            throw new UserDoesNotExist();
        }
    }

    private function checkTheSamePassword($passwordToCheck, $password): void
    {
        if(password_verify($passwordToCheck, $password) === false){
            throw new PasswordNotSame();
        }
    }
}