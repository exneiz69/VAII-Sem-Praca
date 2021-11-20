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
        if (!Authorization::isLogged()) {
            return $this->html([]);
        }
        else {
            $this->redirectToHome();
        }
    }

    public function logout()
    {
        if (Authorization::isLogged()) {
            Authorization::logout();
        }
        $this->redirectToHome();
    }

    public function registration()
    {
        if (!Authorization::isLogged()) {
            return $this->html([]);
        }
        else {
            $this->redirectToHome();
        }
    }

    public function authentication()
    {
        if (!Authorization::isLogged()) {
            $username = $this->request()->getValue('username');
            $password = $this->request()->getValue('password');

            $user = User::getUser($username, $password);

            if ($user) {
                Authorization::login($user->ID);
            }
        }
        $this->redirectToHome();
    }

    public function createNewAccount()
    {
        if (!Authorization::isLogged()) {
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

    public function myAccount()
    {
        $user = User::getOne(Authorization::getID());
        return $this->html([$user]);
    }

    public function changePassword()
    {
        if (Authorization::isLogged()) {
            $currentPassword = $this->request()->getValue('currentPassword');
            $newPassword = $this->request()->getValue('newPassword');
            $retypedNewPassword = $this->request()->getValue('retypedNewPassword');
            if ($newPassword == $retypedNewPassword) {
                $user = User::getOne(Authorization::getID());
                if ($currentPassword == $user->Password) {
                    $user->Password = $newPassword;
                    $user->save();
                }
            }
        }
        $this->redirectToHome();
    }

    public function redirectToHome()
    {
        header('Location: ?c=home');
    }
}