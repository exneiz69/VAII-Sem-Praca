<script type="module" src="public/registrationValidation.js"></script>
<div class="container">
    <div class="row justify-content-center mb-3">
        <div class="col-10">
            <h3 class="text-start">If you already have an account, please <a class="a-custom" href="?c=home&a=login">sign
                    in here.</a>
            </h3>
        </div>
    </div>

    <form method="post" action="?c=home&a=createNewAccount" class="row justify-content-center" id="registrationForm"
          novalidate>
        <div class="col-5 mb-3">
            <label for="emailInput" class="form-label">Email address</label>
            <input type="email" class="form-control" name="email" id="emailInput" aria-describedby="emailHelp"
                   maxlength="255">
            <div id="invalid-emailInput" class="invalid" hidden>
                Invalid email format
            </div>
            <div id="valid-emailInput" class="valid" hidden>
                Looks good!
            </div>
            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
        </div>
        <div class="col-5 mb-3">
            <label for="passwordInput" class="form-label">Password</label>
            <input type="password" class="form-control" name="password" id="passwordInput" maxlength="72">
            <div id="invalid-passwordInput" class="invalid" hidden>
                Invalid password format
            </div>
            <div id="valid-passwordInput" class="valid" hidden>
                Looks good!
            </div>
        </div>
        <div class="col-5 mb-3">
            <label for="usernameInput" class="form-label">Username</label>
            <input type="text" class="form-control" name="username" id="usernameInput" maxlength="24">
            <div id="invalid-usernameInput" class="invalid" hidden>
                Invalid username format
            </div>
            <div id="valid-usernameInput" class="valid" hidden>
                Looks good!
            </div>
        </div>
        <div class="col-5 mb-3">
            <label for="fullNameInput" class="form-label">Full Name</label>
            <input type="text" class="form-control" name="fullName" id="fullNameInput" maxlength="255">
            <div id="invalid-fullNameInput" class="invalid" hidden>
                Invalid full name format
            </div>
            <div id="valid-fullNameInput" class="valid" hidden>
                Looks good!
            </div>
        </div>
        <div class="col-10 mb-3">
            <input type="checkbox" class="form-check-input" id="checkService">
            <label class="form-check-label" for="checkService">I have read and agree to the <a class="a-custom"
                                                                                               href="#">terms of
                    service</a></label>
        </div>
        <div class="col-10 mb-3">
            <button type="submit" class="btn">Continue</button>
        </div>
    </form>
    <div class="row">
        <div class="col-12">
            <h1 class="text-center">Footer</h1>
        </div>
    </div>
</div>