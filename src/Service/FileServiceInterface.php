<?php

namespace App\Service;

use App\Entity\File;
use Symfony\Component\HttpFoundation\Request;

interface FileServiceInterface
{
    public function create(Request $request): File;
}