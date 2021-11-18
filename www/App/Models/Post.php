<?php

namespace App\Models;

use App\Config\Configuration;
use App\Core\Model;

class Post extends Model
{
    public $ID;
    public $UserID;
    public $Source;
    public $Description;

    static public function setDbColumns()
    {
        return ['ID', 'UserID', 'Source', 'Description'];
    }

    static public function setTableName()
    {
        return 'Posts';
    }

    public static function getAllScreenshots()
    {
        return parent::getAll("Source LIKE '" . Configuration::UPLOAD_SCREENSHOTS_DIR . "/%'");
    }

    public static function getAllVideos()
    {
        return parent::getAll("Source LIKE 'https://www.youtube.com/embed/%'");
    }
}