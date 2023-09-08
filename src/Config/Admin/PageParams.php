<?php

namespace App\Config\Admin;

use Symfony\Component\HttpFoundation\Request;

class PageParams
{
    public const TITLE = [
        'user' => [
            'list' => 'Użytkownik Lista',
            'create' => 'Użytkownik Dodaj',
            'edit' => 'Użytkownik Edytuj',
        ]
    ];

    public const DESCRIPTION = [
        'user' => [
            'list' => 'Użytkownik Lista',
            'create' => 'Użytkownik Dodaj',
            'edit' => 'Użytkownik Edytuj',
        ]
    ];

    public static function getDataFromKeys(array $keys, Request $request): Request
    {
        foreach ($keys as $keyArray){
            if(key_exists($keyArray, self::TITLE)){
                $response = self::TITLE[$keyArray];
                if(key_exists($keyArray, $response)){
                    $request->request->set('title', $response[$keyArray]);
                }
            }
            if(key_exists($keyArray, self::DESCRIPTION)){
                $response = self::DESCRIPTION[$keyArray];
                if(key_exists($keyArray, $response)){
                    $request->request->set('description', $response[$keyArray]);
                }
            }
        }

        return $request;
    }
}