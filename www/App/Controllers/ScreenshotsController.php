<?php

namespace App\Controllers;

use App\Config\Configuration;
use App\Core\AControllerBase;
use App\Models\Post;

/**
 * Class ScreenshotsController
 * @package App\Controllers
 */
class ScreenshotsController extends AControllerBase
{
    public function index()
    {
        $screenshot = Post::getAllScreenshots();

        return $this->html($screenshot);
    }

    public function uploadScreenshot()
    {
        if (\App\Authorization::isLogged()) {
            if (isset($_FILES['screenshot']) && $_FILES['screenshot']['error'] == UPLOAD_ERR_OK) {
                $tmp_path = $_FILES['screenshot']['tmp_name'];
                $name = $_FILES['screenshot']['name'];
                $new_path = Configuration::UPLOAD_SCREENSHOTS_DIR . "/$name";
                move_uploaded_file($tmp_path, $new_path);

                $newScreenshot = new Post();
                $newScreenshot->UserID = 1;
                $newScreenshot->Source = $new_path;
                $newScreenshot->Description = $_POST['description'];
                $newScreenshot->save();
            }
        }
        header('Location: ?c=screenshots');
    }

    public function likeScreenshot()
    {
        if (\App\Authorization::isLogged()) {
            $screenshotID = $this->request()->getValue('screenshotID');

            if ($screenshotID) {
                $screenshot = Post::getOne($screenshotID);
                $screenshot->like(1);
            }
        }
        header('Location: ?c=screenshots');
    }
}