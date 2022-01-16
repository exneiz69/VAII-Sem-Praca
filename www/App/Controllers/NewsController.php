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
    /**
     * @throws \Exception
     */
    public function index()
    {
        $news = News::getAll();

        return $this->html($news);
    }

    /**
     * @throws \Exception
     */
    public function uploadNews()
    {
        if (Authorization::isLogged()) {
            $title = $this->request()->getValue('title');
            $content = $this->request()->getValue('content');

            if (strlen($title) != 0 && strlen($title) < 256 && strlen($content) != 0) {
                $newNews = new News();
                $newNews->UserID = Authorization::getID();
                $newNews->Title = $title;
                $newNews->Content = $content;
                $newNews->save();
            }
        }
        header('Location: ?c=news');
    }

    /**
     * @throws \Exception
     */
    public function getComments()
    {
        $newsID = $this->request()->getValue('newsID');
        $comments = array();
        if (ctype_digit($newsID)) {
            $news = News::getOne($newsID);
            if (!is_null($news)) {
                $comments = $news->getComments();
            }
        }
        return $this->json($comments);
    }

    /**
     * @throws \Exception
     */
    public function addComment()
    {
        $reply = array("Reply" => "ERROR");
        if (Authorization::isLogged()) {
            $newsID = $this->request()->getValue('newsID');
            $text = $this->request()->getValue('text');

            if (ctype_digit($newsID)) {
                $news = News::getOne($newsID);

                if (!is_null($news) && strlen($text) != 0 && strlen($text) <= 500) {
                    $newComment = new NewsComment();
                    $newComment->NewsID = $newsID;
                    $newComment->UserID = Authorization::getID();
                    $newComment->Text = $text;
                    $newComment->save();
                    $reply = array("Reply" => "OK");
                }
            }
        }
        return $this->json($reply);
    }
}