<?php

namespace App\Service;

use Symfony\Component\HttpFoundation\Request;

interface PageParamsServiceInterface
{
    public function createViewParams(Request $request): array;

    public function createViewParamsAdmin(Request $request): array;
}