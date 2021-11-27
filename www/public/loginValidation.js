window.onload = function () {
    let usernameInput = document.getElementById("usernameInput");
    let invalidUsernameInput = document.getElementById("invalid-usernameInput");
    let validUsernameInput = document.getElementById("valid-usernameInput");

    let passwordInput = document.getElementById("passwordInput");
    let invalidPasswordInput = document.getElementById("invalid-passwordInput");
    let validPasswordInput = document.getElementById("valid-passwordInput");

    usernameInput.addEventListener("focus", function() {
        invalidUsernameInput.hidden = false;
    }, {once : true});

    passwordInput.addEventListener("focus", function() {
        invalidPasswordInput.hidden = false;
    }, {once : true});

    let isUsernameInputValid = false;
    usernameInput.onkeyup = function () {
        let pattern = /^(?=[a-zA-Z0-9._]{6,24}$)(?!.*[_.]{2})[^_.].*[^_.]$/;
        if (usernameInput.value.match(pattern)) {
            isUsernameInputValid = true;
            invalidUsernameInput.hidden = true;
            validUsernameInput.hidden = false;
        }
        else {
            isUsernameInputValid = false;
            invalidUsernameInput.hidden = false;
            validUsernameInput.hidden = true;
        }
    }

    let isPasswordInputValid = false;
    passwordInput.onkeyup = function () {
        let pattern = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[A-Za-z\d@$!%*?&]{6,72}$/;
        if (passwordInput.value.match(pattern)) {
            isPasswordInputValid = true;
            invalidPasswordInput.hidden = true;
            validPasswordInput.hidden = false;
        }
        else {
            isPasswordInputValid = false;
            invalidPasswordInput.hidden = false;
            validPasswordInput.hidden = true;
        }
    }

    let loginForm = document.getElementById("loginForm");
    loginForm.addEventListener('submit', function (event) {
        if (!isUsernameInputValid || !isPasswordInputValid) {
            event.preventDefault();
            event.stopPropagation();
        }
    });
}