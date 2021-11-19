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
                $news = new News();
                $news->UserID = Authorization::getID();
                $news->Title = $title;
                $news->Content = $content;
                $news->save();
            }
        }
        header('Location: ?c=news');
    }

    public function addComment()
    {
        if (Authorization::isLogged()) {
            $newsID = $this->request()->getValue('newsID');

            if ($newsID) {
                $comment = new NewsComment();
                $comment->NewsID = $newsID;
                $comment->UserID = Authorization::getID();
                $comment->Text = $this->request()->getValue('comment');
                $comment->save();
            }
        }
        header('Location: ?c=news');
    }
}