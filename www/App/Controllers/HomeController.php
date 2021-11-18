<?php

namespace App\Controllers;

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

    public function registration()
    {
        return $this->html([]);
    }

    public function createNewAccount()
    {
        if (isset($_POST['email']) && isset($_POST['password'])
            && isset($_POST['username']) && isset($_POST['fullName'])) {
            $newUser = new User();
            $newUser->Email = $_POST['email'];
            $newUser->Password = $_POST['password'];
            $newUser->Username = $_POST['username'];
            $newUser->FullName = $_POST['fullName'];
            $newUser->save();
        }

        header('Location: ?c=home');
    }
}