<?php

namespace App\Models;

use App\Core\Model;

class News extends Model
{
    public $ID;
    public $UserID;
    public $Title;
    public $Content;

    static public function setDbColumns()
    {
        return ['ID', 'UserID', 'Title', 'Content'];
    }

    static public function setTableName()
    {
        return 'News';
    }

    /**
     * @return NewsComment[]
     * @throws \Exception
     */
    public function getComments()
    {
        return NewsComment::getAll("NewsID = ?", [intval($this->ID)]);
    }
}