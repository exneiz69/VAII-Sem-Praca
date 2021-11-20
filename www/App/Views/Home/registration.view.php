<div class="container">
    <div class="row justify-content-center mb-3">
        <div class="col-10">
            <h3 class="text-start">If you already have an account, please <a class="a-custom" href="?c=home&a=login">sign in here.</a>
            </h3>
        </div>
    </div>

    <form method="post" action="?c=home&a=createNewAccount" class="row justify-content-center">
        <div class="col-5 mb-3">
            <label for="inputEmail" class="form-label">Email address</label>
            <input type="email" class="form-control" name="email" id="inputEmail" aria-describedby="emailHelp">
            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
        </div>
        <div class="col-5 mb-3">
            <label for="inputPassword" class="form-label">Password</label>
            <input type="password" class="form-control" name="password" id="inputPassword">
        </div>
        <div class="col-5 mb-3">
            <label for="inputUsername" class="form-label">Username</label>
            <input type="text" class="form-control" name="username" id="inputUsername">
        </div>
        <div class="col-5 mb-3">
            <label for="inputFullName" class="form-label">Full Name</label>
            <input type="text" class="form-control" name="fullName" id="inputFullName">
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
</div>