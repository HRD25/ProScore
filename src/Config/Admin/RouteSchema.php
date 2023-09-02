<?php

namespace App\Config\Admin;

class RouteSchema
{
    public const LOGIN = 'admin_login';
    public const LOGOUT = 'admin_logout';
    public const MAIN = 'admin_main';
    public const AFTER_LOGIN = self::MAIN;

    /// TODO -> USER
    public const USER_LIST = 'admin_user_list';

    public const USER_EDIT = 'admin_user_edit';

    public const USER_CREATE = 'admin_user_create';

    public const GAME_LIST = 'admin_game_list';
    public const SETTINGS = 'admin_settings';
}