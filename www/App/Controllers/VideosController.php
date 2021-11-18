<?php

namespace App\Controllers;

use App\Core\AControllerBase;
use App\Models\Post;

/**
 * Class VideosController
 * @package App\Controllers
 */
class VideosController extends AControllerBase
{
    public function index()
    {
        $video = Post::getAllVideos();

        return $this->html($video);
    }

    public function uploadVideo()
    {
        if (isset($_POST['videoID'])) {
            $newVideo = new Post();
            $newVideo->UserID = 1;
            $newVideo->Source = 'https://www.youtube.com/embed/' . $_POST['videoID'] . '?rel=0';
            $newVideo->Description = $_POST['description'];
            $newVideo->save();
        }

        header('Location: ?c=videos');
    }
}