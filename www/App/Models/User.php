<?php

namespace App\Models;

use App\Core\Model;

class User extends Model
{
    public $ID;
    public $Email;
    public $Password;
    public $Username;
    public $FullName;

    static public function setDbColumns()
    {
        return ['ID', 'Email', 'Password', 'Username', 'FullName'];
    }

    static public function setTableName()
    {
        return 'Users';
    }

    public static function getUser($username, $password)
    {
        $user = parent::getAll("Username = (?) AND Password = (?) LIMIT 1", [$username, $password]);

        return reset($user);
        /*$stmt = Connection::connect()
            ->prepare("SELECT * FROM Users WHERE Username = (?) AND Password = (?)");
        $stmt->execute([intval($username), intval($password)]);
        if ($stmt->rowCount() != 0) {
            return true;
        }
        else {
            return false;
        }*/
    }

}