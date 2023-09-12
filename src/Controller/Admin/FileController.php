<?php

namespace App\Controller\Admin;

use App\Service\FileServiceInterface;
use Exception;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('admin/file/', name: 'admin-file-')]
class FileController extends AbstractController
{

    public function __construct(
        private readonly FileServiceInterface $fileService
    ){}

    #[Route('create', name: 'create', methods: ["GET", "POST"])]
    public function create(Request $request): Response{
        return new Response('ok');
    }

    #[Route('create/json', name: 'create-json', methods: ["POST"])]
    public function createJson(Request $request): Response
    {
        try {
            $file = $this->fileService->create($request);
            return new JsonResponse([
                'id' => $file->getId(),
                'path' => $file->getPathFile($file->getSafeName()),
                'type' => 'success'
            ]);
        }catch (Exception $e){
            return new JsonResponse([
                'type' => 'danger'
            ]);
        }
    }
}