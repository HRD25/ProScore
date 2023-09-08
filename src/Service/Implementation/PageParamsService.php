<?php

namespace App\Service\Implementation;

use App\Service\PageParamsServiceInterface;
use Symfony\Component\HttpFoundation\Request;

class PageParamsService implements PageParamsServiceInterface
{
    public function createViewParams(Request $request): array{
        $response = [];
        $this->createParams($response, $request);

        return $response;
    }

    public function createViewParamsAdmin(Request $request): array{
        $defaultResponse = [
            'title' => $request->get('title', ''),
            'description' => $request->get('description', ''),
            'breadCrumbs' => $request->get('breadCrumbs', [])
        ];
       $this->createParams($defaultResponse, $request);

        return $defaultResponse;
    }

    private function createParams(array &$response, Request $request): void{
        $requestData = $request->request->all();
        foreach ($requestData as $key => $elementData){
            $response[$key] = $elementData;
        }
    }
}