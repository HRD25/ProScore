<?php

namespace App\Service\Implementation;

use App\Entity\File;
use App\Factory\FileFactoryInterface;
use App\Service\FileServiceInterface;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;

class FileService implements FileServiceInterface
{
    public function __construct(
        private readonly FileFactoryInterface $fileFactory,
        private readonly EntityManagerInterface $entityManager
    ){}

    public function create(Request $request): File
    {
        $fileEntity = $this->fileFactory->create($request);
        $this->entityManager->persist($fileEntity);
        $this->entityManager->flush();

        return $fileEntity;
    }
}