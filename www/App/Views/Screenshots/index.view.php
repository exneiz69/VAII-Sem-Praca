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
            <form method="post" enctype="multipart/form-data" action="?c=screenshots&a=uploadScreenshot" class="row border mb-4">
                <div class="col-auto">
                    <label for="inputScreenshot" class="form-label">Select your screenshot file</label>
                    <input class="form-control mb-3" type="file" name="screenshot" id="inputScreenshot">
                    <label for="screenshotDescription" class="form-label">Description</label>
                    <textarea class="form-control mb-3" name="description" id="screenshotDescription" rows="3" maxlength="250"></textarea>
                    <button type="submit" class="btn btn-primary mb-2">Continue</button>
                </div>
            </form>
            <?php } ?>

            <?php foreach ($data as $screenshot) { ?>
            <div class="row justify-content-center mb-4">
                <div class="col-11">
                    <img src="<?= $screenshot->Source ?>" class="img-thumbnail screenshot mb-1" alt="...">
                    <br>
                    <a href="?c=screenshots&a=likeScreenshot&screenshotID=<?= $screenshot->ID ?>" type="button" class="btn me-3"><i class="bi bi-heart pe-2"></i><?= $screenshot->getLikesAmount() ?></a>
                    <span><?= $screenshot->Description ?></span>
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