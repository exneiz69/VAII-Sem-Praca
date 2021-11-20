<?php

$user = reset($data);

?>
<div class="container">
    <div class="row justify-content-center mb-3">
        <div class="col-auto">
            <span>Username: <?= $user->Username ?></span>
        </div>
    </div>
    <div class="row justify-content-center mb-3">
        <div class="col-auto">
            <span>Email: <?= $user->Email ?></span>
        </div>
    </div>
    <div class="row justify-content-center mb-3">
        <div class="col-auto">
            <span>Full name: <?= $user->FullName ?></span>
        </div>
    </div>
    <form method="post" action="?c=home&a=changePassword" class="row justify-content-center">
        <div class="col">
            <div class="row justify-content-center mb-3">
                <div class="col-5">
                    <label for="inputCurrentPassword" class="form-label">Current Password</label>
                    <input type="password" class="form-control" name="currentPassword" id="inputCurrentPassword">
                </div>
            </div>
            <div class="row justify-content-center mb-3">
                <div class="col-5">
                    <label for="inputNewPassword" class="form-label">New Password</label>
                    <input type="password" class="form-control" name="newPassword" id="inputNewPassword">
                </div>
            </div>
            <div class="row justify-content-center mb-3">
                <div class="col-5">
                    <label for="inputRetypedNewPassword" class="form-label">Retype New Password</label>
                    <input type="password" class="form-control" name="retypedNewPassword" id="inputRetypedNewPassword">
                </div>
            </div>
            <div class="row justify-content-center mb-3">
                <div class="col-5">
                    <button type="submit" class="btn">Change password</button>
                </div>
            </div>
        </div>
    </form>
    <div class="row justify-content-center mb-3">
        <div class="col-auto">
            <a href="?c=home&a=logout" type="submit" class="btn">Logout</a>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <h1 class="text-center">Footer</h1>
        </div>
    </div>
</div>
</div>