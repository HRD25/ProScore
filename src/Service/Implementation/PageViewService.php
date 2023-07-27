<?php

namespace App\Service\Implementation;

use App\Service\PageViewServiceInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

class PageViewService extends AbstractController implements PageViewServiceInterface
{
    private const ALERT = 'admin/elements/alert/alert.twig';

    public function createAlert(Request $request): string{
        return $this->renderView(self::ALERT);
    }
}