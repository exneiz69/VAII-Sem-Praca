<?php

namespace App\Models;

use App\Core\Model;

class NewsComment extends Model
{
    public $ID;
    public $NewsID;
    public $UserID;
    public $Text;

    static public function setDbColumns()
    {
        return ['ID', 'NewsID', 'UserID', 'Text'];
    }

    static public function setTableName()
    {
        return 'NewsComments';
    }
}