<?php

namespace App\Twig;

use Ramsey\Uuid\Uuid;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class ImageExtension extends AbstractExtension
{
    public function getFunctions(){
        return [
            new TwigFunction('generate_token', [$this, 'generateToken'])
        ];
    }

    public function generateToken(): string
    {
        return Uuid::uuid4()->toString();
    }
}