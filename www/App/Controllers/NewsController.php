<?php

namespace App\Controllers;

use App\Core\AControllerBase;
use App\Models\News;

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
        if (isset($_POST['title']) && isset($_POST['content'])) {
            $news = new News();
            $news->UserID = 1;
            $news->Title = $_POST['title'];
            $news->Content = $_POST['content'];
            $news->save();
        }

        header('Location: ?c=news');
    }
}