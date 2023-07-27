<?php

namespace App\Config\admin;

class RouteSchema
{
    public const LOGIN = 'admin_login';
    public const LOGOUT = 'admin_logout';
    public const MAIN = 'admin_main';
    public const AFTER_LOGIN = self::MAIN;
    public const USER_LIST = 'admin_user_list';
    public const GAME_LIST = 'admin_game_list';
}