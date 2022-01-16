<?php

$user = reset($data);

?>
<script type="module" src="public/myAccountValidation.js"></script>
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
    <form method="post" action="?c=home&a=changePassword" class="row justify-content-center" id="myAccountForm"
          novalidate>
        <div class="col">
            <div class="row justify-content-center mb-3">
                <div class="col-5">
                    <label for="currentPasswordInput" class="form-label">Current Password</label>
                    <input type="password" class="form-control" name="currentPassword" id="currentPasswordInput"
                           maxlength="72">
                    <div id="invalid-currentPasswordInput" class="invalid" hidden>
                        Invalid password format
                    </div>
                    <div id="valid-currentPasswordInput" class="valid" hidden>
                        Looks good!
                    </div>
                </div>
            </div>
            <div class="row justify-content-center mb-3">
                <div class="col-5">
                    <label for="newPasswordInput" class="form-label">New Password</label>
                    <input type="password" class="form-control" name="newPassword" id="newPasswordInput" maxlength="72">
                    <div id="invalid-newPasswordInput" class="invalid" hidden>
                        Invalid password format
                    </div>
                    <div id="valid-newPasswordInput" class="valid" hidden>
                        Looks good!
                    </div>
                </div>
            </div>
            <div class="row justify-content-center mb-3">
                <div class="col-5">
                    <label for="retypedNewPasswordInput" class="form-label">Retype New Password</label>
                    <input type="password" class="form-control" name="retypedNewPassword" id="retypedNewPasswordInput"
                           maxlength="72">
                    <div id="invalid-retypedNewPasswordInput" class="invalid" hidden>
                        Passwords must match
                    </div>
                    <div id="valid-retypedNewPasswordInput" class="valid" hidden>
                        Looks good!
                    </div>
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
            <a href="?c=home&a=logout"class="btn">Logout</a>
        </div>
    </div>
    <div class="row justify-content-center mb-3">
        <div class="col-auto">
            <a href="?c=home&a=deleteAccount" class="btn">Delete account</a>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <h1 class="text-center">Footer</h1>
        </div>
    </div>
</div>