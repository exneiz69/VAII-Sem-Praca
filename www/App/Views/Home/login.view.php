<script src="public/loginValidation.js"></script>
<div class="container">
    <div class="row">
        <form method="post" action="?c=home&a=authentication" class="col" id="loginForm" novalidate>
            <div class="row justify-content-center mb-3">
                <div class="col-5">
                    <label for="usernameInput" class="form-label">Username</label>
                    <input type="text" class="form-control" name="username" id="usernameInput" maxlength="24">
                    <div id="invalid-usernameInput" class="invalid" hidden>
                        Invalid username format
                    </div>
                    <div id="valid-usernameInput" class="valid" hidden>
                        Looks good!
                    </div>
                </div>
            </div>
            <div class="row justify-content-center mb-3">
                <div class="col-5">
                    <label for="passwordInput" class="form-label">Password</label>
                    <input type="password" class="form-control" name="password" id="passwordInput" maxlength="72">
                    <div id="invalid-passwordInput" class="invalid" hidden>
                        Invalid password format
                    </div>
                    <div id="valid-passwordInput" class="valid" hidden>
                        Looks good!
                    </div>
                </div>
            </div>
            <div class="row justify-content-center mb-3">
                <div class="col-auto">
                    <button type="submit" class="btn">Continue</button>
                </div>
            </div>
        </form>
    </div>

    <div class="row">
        <div class="col-12">
            <h1 class="text-center">Footer</h1>
        </div>
    </div>
</div>