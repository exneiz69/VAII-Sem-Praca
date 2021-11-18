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
            <form method="post" action="?c=news&a=uploadNews" class="row border mb-4">
                <div class="col-auto">
                    <label for="newsTitle" class="form-label">Title</label>
                    <input type="text" class="form-control" name="title" id="newsTitle" maxlength="250">
                    <label for="newsContent" class="form-label">Content</label>
                    <textarea class="form-control mb-3" name="content" id="newsContent" rows="10" cols="100"></textarea>
                    <button type="submit" class="btn btn-primary mb-2">Continue</button>
                </div>
            </form>

            <?php foreach ($data as $news) { ?>
                <div class="row justify-content-center mb-4">
                    <div class="col-11">
                        <h2 class="text-center mb-4"> <?= $news->Title ?> </h2>
                        <?= $news->Content ?>
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