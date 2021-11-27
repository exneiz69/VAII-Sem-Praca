<?php

namespace App\Controllers;

use App\Authorization;
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
        if (Authorization::isLogged()) {
            $description = $this->request()->getValue('description');

            if (strlen($description) != 0 && strlen($description) < 256
                && isset($_FILES['screenshot']) && $_FILES['screenshot']['error'] == UPLOAD_ERR_OK) {
                $tmp_path = $_FILES['screenshot']['tmp_name'];
                $name = $_FILES['screenshot']['name'];
                $new_path = Configuration::UPLOAD_SCREENSHOTS_DIR . "/$name";
                move_uploaded_file($tmp_path, $new_path);

                $newScreenshot = new Post();
                $newScreenshot->UserID = Authorization::getID();
                $newScreenshot->Source = $new_path;
                $newScreenshot->Description = $description;
                $newScreenshot->save();
            }
        }
        header('Location: ?c=screenshots');
    }

    public function likeScreenshot()
    {
        if (Authorization::isLogged()) {
            $screenshotID = $this->request()->getValue('screenshotID');

            if (ctype_digit($screenshotID)) {
                $screenshot = Post::getOne($screenshotID);

                if (!is_null($screenshot)) {
                    $screenshot->like(Authorization::getID());
                }
            }
        }
        header('Location: ?c=screenshots');
    }
}