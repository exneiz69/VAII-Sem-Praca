<?php

namespace App\Models;

use App\Config\Configuration;
use App\Core\DB\Connection;
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

    public function like($userID)
    {
        if ($this->hasLike($userID)) {
            Connection::connect()
                ->prepare("DELETE FROM PostsLikes WHERE PostID = (?) AND UserID = (?)")
                ->execute([intval($this->ID), intval($userID)]);
        }
        else {
            Connection::connect()
                ->prepare("INSERT INTO PostsLikes (PostID, UserID) values (?, ?)")
                ->execute([intval($this->ID), intval($userID)]);
        }
    }

    public function hasLike($userID) : bool
    {
        $stmt = Connection::connect()
            ->prepare("SELECT * FROM PostsLikes WHERE PostID = (?) AND UserID = (?) LIMIT 1");
        $stmt->execute([intval($this->ID), intval($userID)]);
        if ($stmt->rowCount() != 0) {
            return true;
        }
        else {
            return false;
        }
    }

    public function getLikesAmount() : int
    {
        $stmt = Connection::connect()
            ->prepare("SELECT * FROM PostsLikes WHERE PostID = (?)");
        $stmt->execute([intval($this->ID)]);
        return $stmt->rowCount();
    }
}