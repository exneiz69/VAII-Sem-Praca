<?php

/** @var App\Models\Post[] $data */

?>
<script type="module" src="public/videosValidation.js"></script>
<div class="container-fluid">
    <div class="row pb-5">
        <div class="col-12">
            <h1 class="text-center">Navigation</h1>
        </div>
    </div>
    <div class="row pt-4">
        <div class="col-12 col-md-9 col-lg-8">
            <?php if (\App\Authorization::isLogged()) { ?>
                <form method="post" action="?c=videos&a=uploadVideo" class="row form-custom rounded mb-4"
                      id="uploadVideoForm"
                      novalidate>
                    <div class="col-auto">
                        <label for="videoIDInput" class="form-label">YouTube video ID</label>
                        <div class="input-group">
                            <span class="input-group-text" id="basic-addon">https://youtu.be/</span>
                            <input type="text" class="form-control" name="videoID" id="videoIDInput"
                                   aria-describedby="basic-addon" maxlength="11">
                        </div>
                        <div id="invalid-videoIDInput" class="invalid" hidden>
                            Invalid video ID format
                        </div>
                        <div id="valid-videoIDInput" class="valid" hidden>
                            Looks good!
                        </div>
                        <label for="descriptionInput" class="form-label mt-3">Description</label>
                        <textarea class="form-control" name="description" id="descriptionInput" rows="3"
                                  maxlength="255"></textarea>
                        <div id="invalid-descriptionInput" class="invalid" hidden>
                            Invalid description format
                        </div>
                        <div id="valid-descriptionInput" class="valid" hidden>
                            Looks good!
                        </div>
                        <button type="submit" class="btn mt-3 mb-2">Continue</button>
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
                        <a href="?c=videos&a=likeVideo&videoID=<?= $video->ID ?>" class="btn me-3">
                            <i class="bi bi-heart pe-2"></i><?= $video->getLikesAmount() ?></a>
                        <?php if ($video->UserID == \App\Authorization::getID()) { ?>
                            <a href="?c=videos&a=deleteVideo&videoID=<?= $video->ID ?>"
                               class="btn me-3"><i class="bi bi-x-lg"></i></a>
                        <?php } ?>
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