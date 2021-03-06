<?php

/** @var App\Models\News[] $data */

?>
<script type="module" src="public/newsValidation.js"></script>
<script type="module" src="public/newsComments.js"></script>
<div class="container-fluid">
    <div class="row pb-5">
        <div class="col-12">
            <h1 class="text-center">Navigation</h1>
        </div>
    </div>
    <div class="row pt-4">
        <div class="col-12 col-md-9 col-lg-8">
            <?php if (\App\Authorization::isLogged()) { ?>
                <form method="post" action="?c=news&a=uploadNews" class="row form-custom rounded mb-4" id="uploadNewsForm"
                      novalidate>
                    <div class="col-auto">
                        <label for="titleInput" class="form-label">Title</label>
                        <input type="text" class="form-control" name="title" id="titleInput" maxlength="255">
                        <div id="invalid-titleInput" class="invalid" hidden>
                            Invalid title format
                        </div>
                        <div id="valid-titleInput" class="valid" hidden>
                            Looks good!
                        </div>
                        <label for="contentInput" class="form-label">Content</label>
                        <textarea class="form-control" name="content" id="contentInput" rows="10" cols="100"></textarea>
                        <div id="invalid-contentInput" class="invalid" hidden>
                            Invalid content format
                        </div>
                        <div id="valid-contentInput" class="valid" hidden>
                            Looks good!
                        </div>
                        <button type="submit" class="btn mt-3 mb-2">Continue</button>
                    </div>
                </form>
            <?php } ?>

            <?php foreach ($data as $news) { ?>
                <div class="row justify-content-center mb-4 border rounded">
                    <div class="col-11">
                        <h2 class="text-center mb-4"><?= $news->Title ?></h2>
                        <div class="text-justify">
                            <?= $news->Content ?>
                        </div>
                        <hr>
                    </div>

                    <div class="col-11">
                        <div class="comments-box row justify-content-center mb-4" id="commentsBox<?= $news->ID ?>">
                        </div>
                        <?php if (\App\Authorization::isLogged()) { ?>
                            <div class="comments-add-box row justify-content-end mb-4" id="addCommentForm<?= $news->ID ?>">
                                <div class="col-auto mb-3">
                                    <textarea class="form-control" name="text" id="textInput<?= $news->ID ?>" rows="3" cols="60"
                                              maxlength="500"></textarea>
                                    <div id="invalid-textInput<?= $news->ID ?>" class="invalid" hidden>
                                        Invalid text format
                                    </div>
                                    <div id="valid-textInput<?= $news->ID ?>" class="valid" hidden>
                                        Looks good!
                                    </div>
                                </div>
                                <div class="col-auto mb-2">
                                    <button class="btn">Add comment</button>
                                </div>
                            </div>
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