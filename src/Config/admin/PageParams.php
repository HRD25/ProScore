<?php

namespace App\Config\admin;

class PageParams
{
    private const DEFAULT_BREAD_CRUMB = [
        'route' => RouteSchema::MAIN,
        'name' => self::TITLE[RouteSchema::MAIN]
    ];

    private const USER_TITLE = 'Użytkownik';
    private const USER_DESCRIPTION = 'Użytkownik';

    public const TITLE = [
        RouteSchema::LOGIN => 'Login',
        RouteSchema::MAIN => 'Main',
        RouteSchema::USER_LIST => self::USER_TITLE,
        RouteSchema::USER_EDIT => self::USER_TITLE,
        RouteSchema::USER_CREATE => self::USER_TITLE,
        RouteSchema::GAME_LIST => 'Mecze',
        RouteSchema::SETTINGS => 'Ustawienia',
    ];

    public const DESCRIPTION = [
        RouteSchema::LOGIN => 'Zaloguj się do panelu admina.',
        RouteSchema::MAIN => 'Witamy w aplikacji.',
        RouteSchema::USER_LIST => self::USER_DESCRIPTION,
        RouteSchema::USER_EDIT => self::USER_DESCRIPTION,
        RouteSchema::USER_CREATE => self::USER_DESCRIPTION,
        RouteSchema::GAME_LIST => 'Mecze',
        RouteSchema::SETTINGS => 'Ustawienia',
    ];

    public const BREAD_CRUMB = [
        RouteSchema::USER_LIST => [
            self::DEFAULT_BREAD_CRUMB,
            [
                'route' => RouteSchema::USER_LIST,
                'name' => self::TITLE[RouteSchema::USER_LIST]
            ],
        ],
        RouteSchema::GAME_LIST =>[
            self::DEFAULT_BREAD_CRUMB,
            [
                'route' => RouteSchema::GAME_LIST,
                'name' => self::TITLE[RouteSchema::GAME_LIST]
            ],
        ],
        RouteSchema::SETTINGS =>[
            self::DEFAULT_BREAD_CRUMB,
            [
                'route' => RouteSchema::SETTINGS,
                'name' => self::TITLE[RouteSchema::SETTINGS]
            ],
        ],
    ];
}