<?php

namespace App;

class Authorization
{
    public static function login($ID, $username)
    {
        $_SESSION['ID'] = $ID;
        $_SESSION['username'] = $username;
    }

    public static function logout()
    {
        unset($_SESSION['ID']);
        unset($_SESSION['username']);
    }

    public static function isLogged()
    {
        return isset($_SESSION['ID']);
    }

    public static function getID()
    {
        return (Authorization::isLogged() ? $_SESSION['ID'] : '');
    }

    public static function getUsername()
    {
        return (Authorization::isLogged() ? $_SESSION['username'] : 'Anonymous');
    }
}