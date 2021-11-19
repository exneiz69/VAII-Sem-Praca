<?php

/** @var App\Models\News[] $data */

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
            <form method="post" action="?c=news&a=uploadNews" class="row border mb-4">
                <div class="col-auto">
                    <label for="newsTitle" class="form-label">Title</label>
                    <input type="text" class="form-control" name="title" id="newsTitle" maxlength="250">
                    <label for="newsContent" class="form-label">Content</label>
                    <textarea class="form-control mb-3" name="content" id="newsContent" rows="10" cols="100"></textarea>
                    <button type="submit" class="btn mb-2">Continue</button>
                </div>
            </form>
            <?php } ?>

            <?php foreach ($data as $news) { ?>
                <div class="row justify-content-center mb-4">
                    <div class="col-11">
                        <h2 class="text-center mb-4"><?= $news->Title ?></h2>
                        <div class="text-justify">
                            <?= $news->Content ?>
                        </div>
                        <hr>
                    </div>

                    <div class="col-11">
                        <div class="row justify-content-center mb-4">
                            <?php foreach ($news->getComments() as $comment) { ?>
                            <div class="col-10">
                                <?= $comment->Text ?>
                                <hr class="my-2">
                            </div>
                            <?php } ?>
                        </div>
                        <?php if (\App\Authorization::isLogged()) { ?>
                        <form method="post" action="?c=news&a=addComment" class="row justify-content-end mb-4">
                            <div class="col-auto">
                                <textarea class="form-control mb-3" name="comment" rows="3" cols="60"></textarea>
                                <input type="hidden" name="newsID" value="<?= $news->ID ?>">
                            </div>
                            <div class="col-auto">
                                <button type="submit" class="btn mb-2">Add comment</button>
                            </div>
                        </form>
                        <?php } ?>
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