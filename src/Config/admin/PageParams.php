<?php

namespace App\Config\admin;

class PageParams
{
    public const TITLE = [
        RouteSchema::LOGIN => 'Login',
        RouteSchema::MAIN => 'Main',
        RouteSchema::USER_LIST => 'User List',
        RouteSchema::GAME_LIST => 'Game List'
    ];

    public const DESCRIPTION = [
        RouteSchema::LOGIN => 'Zaloguj się do panelu admina.',
        RouteSchema::MAIN => 'Witamy w aplikacji.',
        RouteSchema::USER_LIST => 'User List',
        RouteSchema::GAME_LIST => 'Game List',
    ];
}