<?php

namespace App\Controller\Admin;

use App\Service\PageParamsServiceInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/admin/game', name: 'admin_game')]
class GameController extends AbstractController
{
    public function __construct(
        private readonly PageParamsServiceInterface $pageParamsService
    ){}

    private const LIST = 'admin/game/list.twig';

   #[Route('', name: '_list', methods: ['GET'])]
    public function list(Request $request): Response
   {
       return $this->render(self::LIST, $this->pageParamsService->createViewParamsAdmin($request));
   }
}