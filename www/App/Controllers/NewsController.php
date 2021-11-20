<?php

namespace App\Controllers;

use App\Authorization;
use App\Core\AControllerBase;
use App\Models\News;
use App\Models\NewsComment;

/**
 * Class NewsController
 * @package App\Controllers
 */
class NewsController extends AControllerBase
{
    public function index()
    {
        $news = News::getAll();

        return $this->html($news);
    }

    public function uploadNews()
    {
        if (Authorization::isLogged()) {
            $title = $this->request()->getValue('title');
            $content = $this->request()->getValue('content');

            if ($title && $content) {
                $newNews = new News();
                $newNews->UserID = Authorization::getID();
                $newNews->Title = $title;
                $newNews->Content = $content;
                $newNews->save();
            }
        }
        header('Location: ?c=news');
    }

    public function addComment()
    {
        if (Authorization::isLogged()) {
            $newsID = $this->request()->getValue('newsID');

            if ($newsID) {
                $newComment = new NewsComment();
                $newComment->NewsID = $newsID;
                $newComment->UserID = Authorization::getID();
                $newComment->Text = $this->request()->getValue('comment');
                $newComment->save();
            }
        }
        header('Location: ?c=news');
    }
}