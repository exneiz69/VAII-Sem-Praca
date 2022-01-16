<?php

namespace App\Models;

use App\Core\DB\Connection;
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

    /**
     * @throws \Exception
     */
    public static function getUser($username)
    {
        $user = parent::getAll("Username = (?) LIMIT 1", [$username]);

        return $user ? reset($user) : null;
    }

    public function delete() : bool
    {
        $stmt = Connection::connect()
            ->prepare("DELETE FROM Users WHERE ID = (?)");
        $stmt->execute([intval($this->ID)]);
        if ($stmt->rowCount() != 0) {
            return true;
        }
        else {
            return false;
        }
    }
}