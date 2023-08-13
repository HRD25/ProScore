<?php

namespace App\Controller\Front;

use App\Service\PageParamsServiceInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/', name: 'front_')]
class PageController extends AbstractController
{
    private const PAGE = 'front/page.twig';

    public function __construct(
        private readonly PageParamsServiceInterface $pageParamsService
    ){}

    #[Route('', name: 'page')]
    public function page(Request $request): Response{
        return $this->render(self::PAGE, $this->pageParamsService->createViewParams($request));
    }
}