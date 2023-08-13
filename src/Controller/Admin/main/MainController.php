<?php

namespace App\Controller\Admin\Main;

use App\Service\PageParamsServiceInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/admin/main', name: 'admin_main')]
class MainController extends AbstractController
{
    private const MAIN = 'admin/main/main.twig';

    public function __construct(
        private readonly PageParamsServiceInterface $pageParamsService
    ){}

    #[Route('', name: '', methods: ['GET'])]
    public function show(Request $request): Response{
        return $this->render(self::MAIN, $this->pageParamsService->createViewParamsAdmin($request));
    }
}