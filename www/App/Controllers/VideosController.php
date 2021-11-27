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
            $description = $this->request()->getValue('description');

            $videoIDPattern = '/^[a-zA-Z0-9_-]{11,11}$/';

            if (preg_match($videoIDPattern, $videoID)
                && strlen($description) != 0 && strlen($description) < 256) {
                $newVideo = new Post();
                $newVideo->UserID = Authorization::getID();
                $newVideo->Source = 'https://www.youtube.com/embed/' . $videoID . '?rel=0';
                $newVideo->Description = $description;
                $newVideo->save();
            }
        }
        header('Location: ?c=videos');
    }

    public function likeVideo()
    {
        if (Authorization::isLogged()) {
            $videoID = $this->request()->getValue('videoID');

            if (ctype_digit($videoID)) {
                $video = Post::getOne($videoID);

                if (!is_null($video)) {
                    $video->like(Authorization::getID());
                }
            }
        }
        header('Location: ?c=videos');
    }
}