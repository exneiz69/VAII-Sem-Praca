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
}