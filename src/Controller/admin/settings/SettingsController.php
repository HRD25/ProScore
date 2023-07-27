<?php

namespace App\Controller\admin\settings;

use App\Config\admin\RouteSchema;
use App\Exception\PasswordNotSame;
use App\Service\PageParamsServiceInterface;
use App\Service\PageViewServiceInterface;
use App\Service\Security\PasswordServiceInterface;
use Exception;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/admin/', name: 'admin_settings')]
class SettingsController extends AbstractController
{
    private const SETTING = 'admin/settings/settings.twig';

    public function __construct(
        private readonly PageParamsServiceInterface $pageParamsService,
        private readonly PageViewServiceInterface $pageViewService,
        private readonly PasswordServiceInterface $passwordService
    ){}

    #[Route('settings', name: '', methods: ['GET'])]
    public function show(Request $request): Response
    {
        return $this->render(self::SETTING, $this->pageParamsService->createViewParamsAdmin($request));
    }

    #[Route('change_password', name: '_change_password', methods: ['POST'])]
    public function changePassword(Request $request): Response
    {
        try {
            $this->passwordService->changePassword($this->getUser(), $request);
            $this->addFlash('success', 'Hasło zostało zmienione.');
            $url = $this->generateUrl(RouteSchema::LOGOUT);

            return new Response(new RedirectResponse($url));
        }catch (PasswordNotSame $exception){
            $this->addFlash('error', 'Hasła są różne.');
            return new JsonResponse($this->pageViewService->createAlert($request));
        }catch (Exception $exception){
            $this->addFlash('error', 'Nieznany problem.');
            return new JsonResponse($this->pageViewService->createAlert($request));
        }
    }
}