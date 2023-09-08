<?php

namespace App\Controller\Admin\User;

use App\Config\Admin\PageParams;
use App\Service\PageParamsServiceInterface;
use App\Service\User\UserServiceInterface;
use PharIo\Manifest\Exception;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('admin/user/', name: 'admin_user')]
class UserController extends AbstractController
{
    private const LIST = 'admin/user/list.twig';
    private const EDIT = 'admin/user/edit.twig';
    private const CREATE = 'admin/user/create.twig';

    public function __construct(
        private readonly PageParamsServiceInterface $pageParamsService,
        private readonly UserServiceInterface $userService
    ){}

    #[Route('list', name: '_list', methods: ['GET'])]
    public function list(Request $request): Response{
        return $this->render(self::LIST, $this->pageParamsService->createViewParamsAdmin(PageParams::getDataFromKeys(['user', 'list'], $request)));
    }

    #[Route('edit', name: '_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request): Response{
        if($request->isMethod('POST')){
            try {
                $this->userService->edit($request);
                $this->addFlash('success', 'Zapisano');
            }catch (Exception $e){
                $this->addFlash('danger', 'Nieznany blad');
            }
        }

        return $this->render(self::EDIT, $this->pageParamsService->createViewParamsAdmin($request));
    }

    #[Route('create', name: '_create', methods: ['GET', 'POST'])]
    public function create(Request $request): Response{
        if($request->isMethod('POST')){
            try {
                $this->userService->create($request);
                $this->addFlash('success', 'Dodano');
            }catch (Exception $e){
                $this->addFlash('danger', 'Nieznany blad');
            }
        }

        return $this->render(self::CREATE, $this->pageParamsService->createViewParamsAdmin($request));
    }
}