<?php

namespace App\Controller\Admin\Security;

use App\Config\Admin\RouteSchema;
use App\Exception\PasswordNotSame;
use App\Exception\UserDoesNotExist;
use App\Service\PageParamsServiceInterface;
use App\Service\Security\LoginServiceInterface;
use Exception;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/admin/', name: 'admin_')]
class SecurityController extends AbstractController
{
    private const LOGIN = 'admin/security/login.twig';

    public function __construct(
        private readonly PageParamsServiceInterface $pageParamsService,
        private readonly LoginServiceInterface $loginService
    ){}

    #[Route('', name: 'default_redirect', methods: ['GET'])]
    public function defaultRedirect(): Response{
        return $this->redirectToRoute('admin_login');
    }

    #[Route('login', name: 'login', methods: ['GET', 'POST'])]
    public function login(Request $request): Response{
        if($request->isMethod('POST')){
            try {
                return $this->loginService->login($request);
            }catch (PasswordNotSame $e){
                $this->addFlash('error', 'Błędne hasło.');
            }catch (UserDoesNotExist $e){
                $this->addFlash('error', 'Użytkownik o podanym email nie istnieje.');
            }catch (Exception $e){
                $this->addFlash('error', 'Nieznany błąd.');
            }
        }

        return $this->render(self::LOGIN,  $viewParams = $this->pageParamsService->createViewParamsAdmin($request));
    }

    #[Route('logout', name: 'logout', methods: ['GET'])]
    public function logout(): Response{
        return $this->redirectToRoute(RouteSchema::LOGIN);
    }


}