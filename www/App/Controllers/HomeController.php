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
        $this->redirectToHome();
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
        $this->redirectToHome();
    }

    public function authentication()
    {
        if (!Authorization::isLogged()) {
            $username = $this->request()->getValue('username');
            $password = $this->request()->getValue('password');

            $usernamePattern = '/^(?=[a-zA-Z0-9._]{6,24}$)(?!.*[_.]{2})[^_.].*[^_.]$/';
            $passwordPattern = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[A-Za-z\d@$!%*?&]{6,72}$/';

            if (preg_match($usernamePattern, $username) && preg_match($passwordPattern, $password)) {
                $user = User::getUser($username);

                if (!is_null($user)) {
                    if (password_verify($password, $user->Password)) {
                        Authorization::login($user->ID);
                    }
                }
            }

        }
        $this->redirectToHome();
    }

    /**
     * @throws \Exception
     */
    public function createNewAccount()
    {
        if (!Authorization::isLogged()) {
            $email = $this->request()->getValue('email');
            $password = $this->request()->getValue('password');
            $username = $this->request()->getValue('username');
            $fullName = $this->request()->getValue('fullName');

            $emailPattern = '/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/';
            $passwordPattern = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[A-Za-z\d@$!%*?&]{6,72}$/';
            $usernamePattern = '/^(?=[a-zA-Z0-9._]{6,24}$)(?!.*[_.]{2})[^_.].*[^_.]$/';
            $fullNamePattern = "/^[a-z ,.'-]{1,255}$/i";

            if (preg_match($emailPattern, $email) && preg_match($passwordPattern, $password)
                && preg_match($usernamePattern, $username) && preg_match($fullNamePattern, $fullName)) {
                $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

                $newUser = new User();
                $newUser->Email = $email;
                $newUser->Password = $hashedPassword;
                $newUser->Username = $username;
                $newUser->FullName = $fullName;
                $newUser->save();
            }
        }
        $this->redirectToHome();
    }

    /**
     * @throws \Exception
     */
    public function myAccount()
    {
        if (Authorization::isLogged()) {
            $user = User::getOne(Authorization::getID());
            return $this->html([$user]);
        } else {
            $this->redirectToHome();
        }
    }

    /**
     * @throws \Exception
     */
    public function changePassword()
    {
        if (Authorization::isLogged()) {
            $currentPassword = $this->request()->getValue('currentPassword');
            $newPassword = $this->request()->getValue('newPassword');
            $retypedNewPassword = $this->request()->getValue('retypedNewPassword');

            $passwordPattern = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[A-Za-z\d@$!%*?&]{6,72}$/';

            if (preg_match($passwordPattern, $currentPassword) && preg_match($passwordPattern, $newPassword)
                && preg_match($passwordPattern, $retypedNewPassword)) {
                if ($newPassword == $retypedNewPassword) {
                    $user = User::getOne(Authorization::getID());
                    if (password_verify($currentPassword, $user->Password)) {
                        $hashedNewPassword = password_hash($newPassword, PASSWORD_DEFAULT);
                        $user->Password = $hashedNewPassword;
                        $user->save();
                    }
                }
            }
        }
        $this->redirectToHome();
    }

    /**
     * @throws \Exception
     */
    public function deleteAccount()
    {
        if (Authorization::isLogged()) {
            $user = User::getOne(Authorization::getID());
            Authorization::logout();
            $user->delete();
        }
        $this->redirectToHome();
    }

    public function redirectToHome()
    {
        header('Location: ?c=home');
    }
}