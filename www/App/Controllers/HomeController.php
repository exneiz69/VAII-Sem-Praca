<?php

namespace App\Controllers;

use App\Authorization;
use App\Core\AControllerBase;
use App\Models\User;

/**
 * Class HomeController
 * @package App\Controllers
 */
class HomeController extends AControllerBase
{
    public function index()
    {
        return $this->html([]);
    }

    public function login()
    {
        if (!\App\Authorization::isLogged()) {
            return $this->html([]);
        }
        else {
            $this->redirectToHome();
        }
    }

    public function logout()
    {
        if (\App\Authorization::isLogged()) {
            Authorization::logout();
        }
        $this->redirectToHome();
    }

    public function registration()
    {
        if (!\App\Authorization::isLogged()) {
            return $this->html([]);
        }
        else {
            $this->redirectToHome();
        }
    }

    public function authentication()
    {
        if (!\App\Authorization::isLogged()) {
            $username = $this->request()->getValue('username');
            $password = $this->request()->getValue('password');

            $user = User::getUser($username, $password);

            if ($user) {
                Authorization::login($user->ID, $user->Username);
            }
        }
        $this->redirectToHome();
    }

    public function createNewAccount()
    {
        if (!\App\Authorization::isLogged()) {
            $email = $this->request()->getValue('email');
            $password = $this->request()->getValue('password');
            $username = $this->request()->getValue('username');
            $fullName = $this->request()->getValue('fullName');

            if ($email && $password && $username && $fullName) {
                $newUser = new User();
                $newUser->Email = $email;
                $newUser->Password = $password;
                $newUser->Username = $username;
                $newUser->FullName = $fullName;
                $newUser->save();
            }
        }
        $this->redirectToHome();
    }

    public function redirectToHome()
    {
        header('Location: ?c=home');
    }
}