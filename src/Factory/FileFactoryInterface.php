<?php

namespace App\Factory;

use App\Entity\File;
use Symfony\Component\HttpFoundation\Request;

interface FileFactoryInterface
{
    public function create(Request $request): File;
}