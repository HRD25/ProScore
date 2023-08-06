<?php

namespace App\Service\Implementation;

use App\Config\admin\PageParams;
use App\Service\PageParamsServiceInterface;
use Symfony\Component\HttpFoundation\Request;

class PageParamsService implements PageParamsServiceInterface
{
    public function createViewParams(Request $request): array{
        $response = [];
        $params = $request->request->all();
        foreach ($params as $key => $param){
            $response[$key] = $param;
        }

        return $response;
    }

    public function createViewParamsAdmin(Request $request): array{
        $routeName = $request->attributes->get('_route');
        $params = $request->request->all();
        $defaultResponse = [
            'title' => PageParams::TITLE[$routeName] ?? '-',
            'description' => PageParams::DESCRIPTION[$routeName] ?? '-',
            'breadCrumbs' => PageParams::BREAD_CRUMB[$routeName] ?? []
        ];
        foreach ($params as $key => $param){
            $defaultResponse[$key] = $param;
        }

        return $defaultResponse;
    }
}