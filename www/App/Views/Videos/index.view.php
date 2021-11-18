<?php

/** @var App\Models\Post[] $data */

?>
<div class="container-fluid">
    <div class="row pb-5">
        <div class="col-12">
            <h1 class="text-center">Navigation</h1>
        </div>
    </div>
    <div class="row pt-4">
        <div class="col-12 col-md-9 col-lg-8">
            <?php if (\App\Authorization::isLogged()) { ?>
            <form method="post" action="?c=videos&a=uploadVideo" class="row border mb-4">
                <div class="col-auto">
                    <label for="basic-url" class="form-label">YouTube video ID</label>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon">https://youtu.be/</span>
                        <input type="text" class="form-control" name="videoID" id="basic-url" aria-describedby="basic-addon" maxlength="11">
                    </div>
                    <label for="videoDescription" class="form-label">Description</label>
                    <textarea class="form-control mb-3" name="description" id="videoDescription" rows="3" maxlength="250"></textarea>
                    <button type="submit" class="btn btn-primary mb-2">Continue</button>
                </div>
            </form>
            <?php } ?>

            <?php foreach ($data as $video) { ?>
            <div class="row justify-content-center mb-4">
                <div class="col-11">
                    <div class="ratio ratio-16x9 mb-1">
                        <iframe src="<?= $video->Source ?>" title="YouTube video"
                                allowfullscreen></iframe>
                    </div>
                    <a href="?c=videos&a=likeVideo&videoID=<?= $video->ID ?>" type="button" class="btn me-3"><i class="bi bi-heart pe-2"></i><?= $video->getLikesAmount() ?></a>
                    <span><?= $video->Description ?></span>
                </div>
            </div>
            <?php } ?>
        </div>
        <div class="col-12 col-md-3 order-md-first col-lg-2">
            <h1 class="text-center">Sidebar</h1>
        </div>
        <div class="col-12 col-md-3 col-lg-2">
            <h1 class="text-center">Ads</h1>
            <img src="public/img/tetris%20ad.jpeg" class="img-thumbnail ads mx-auto d-block" alt="...">
        </div>
        <div class="col-12 col-md-9 col-lg-12">
            <h1 class="text-center">Footer</h1>
        </div>
    </div>
</div>