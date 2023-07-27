<?php

namespace App\Controller\admin\user;

use App\Service\PageParamsServiceInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('admin/user/', name: 'admin_user')]
class UserController extends AbstractController
{
    private const LIST = 'admin/user/list.twig';

    public function __construct(
        private readonly PageParamsServiceInterface $pageParamsService
    ){}

    #[Route('list', name: '_list', methods: ['GET'])]
    public function list(Request $request): Response{
        return $this->render(self::LIST, $this->pageParamsService->createViewParamsAdmin($request));
    }
}