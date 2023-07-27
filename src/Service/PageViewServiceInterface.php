<?php

namespace App\Service;

use Symfony\Component\HttpFoundation\Request;

interface PageViewServiceInterface
{
    public function createAlert(Request $request): string;
}