<?php

namespace App;

class Authorization
{
    public static function login($ID)
    {
        $_SESSION['ID'] = $ID;
    }

    public static function logout()
    {
        unset($_SESSION['ID']);
    }

    public static function isLogged()
    {
        return isset($_SESSION['ID']);
    }

    public static function getID()
    {
        return (Authorization::isLogged() ? $_SESSION['ID'] : '');
    }
}