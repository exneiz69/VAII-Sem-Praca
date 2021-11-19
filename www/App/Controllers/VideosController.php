<?php

namespace App\Controllers;

use App\Authorization;
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
        if (Authorization::isLogged()) {
            $videoID = $this->request()->getValue('videoID');

            if ($videoID) {
                $newVideo = new Post();
                $newVideo->UserID = Authorization::getID();
                $newVideo->Source = 'https://www.youtube.com/embed/' . $videoID . '?rel=0';
                $newVideo->Description = $this->request()->getValue('description');
                $newVideo->save();
            }
        }
        header('Location: ?c=videos');
    }

    public function likeVideo()
    {
        if (Authorization::isLogged()) {
            $videoID = $this->request()->getValue('videoID');

            if ($videoID) {
                $video = Post::getOne($videoID);
                $video->like(Authorization::getID());
            }
        }
        header('Location: ?c=videos');
    }
}