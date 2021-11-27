window.onload = function () {
    let emailInput = document.getElementById("emailInput");
    let invalidEmailInput = document.getElementById("invalid-emailInput");
    let validEmailInput = document.getElementById("valid-emailInput");

    let passwordInput = document.getElementById("passwordInput");
    let invalidPasswordInput = document.getElementById("invalid-passwordInput");
    let validPasswordInput = document.getElementById("valid-passwordInput");

    let usernameInput = document.getElementById("usernameInput");
    let invalidUsernameInput = document.getElementById("invalid-usernameInput");
    let validUsernameInput = document.getElementById("valid-usernameInput");

    let fullNameInput = document.getElementById("fullNameInput");
    let invalidFullNameInput = document.getElementById("invalid-fullNameInput");
    let validFullNameInput = document.getElementById("valid-fullNameInput");

    emailInput.addEventListener("focus", function () {
        invalidEmailInput.hidden = false;
    }, {once: true});

    passwordInput.addEventListener("focus", function () {
        invalidPasswordInput.hidden = false;
    }, {once: true});

    usernameInput.addEventListener("focus", function () {
        invalidUsernameInput.hidden = false;
    }, {once: true});

    fullNameInput.addEventListener("focus", function () {
        invalidFullNameInput.hidden = false;
    }, {once: true});

    let isEmailInputValid = false;
    emailInput.onkeyup = function () {
        let pattern = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
        if (emailInput.value.match(pattern) && emailInput.value.length < 256) {
            isEmailInputValid = true;
            invalidEmailInput.hidden = true;
            validEmailInput.hidden = false;
        } else {
            isEmailInputValid = false;
            invalidEmailInput.hidden = false;
            validEmailInput.hidden = true;
        }
    }

    let isPasswordInputValid = false;
    passwordInput.onkeyup = function () {
        let pattern = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[A-Za-z\d@$!%*?&]{6,72}$/;
        if (passwordInput.value.match(pattern)) {
            isPasswordInputValid = true;
            invalidPasswordInput.hidden = true;
            validPasswordInput.hidden = false;
        } else {
            isPasswordInputValid = false;
            invalidPasswordInput.hidden = false;
            validPasswordInput.hidden = true;
        }
    }

    let isUsernameInputValid = false;
    usernameInput.onkeyup = function () {
        let pattern = /^(?=[a-zA-Z0-9._]{6,24}$)(?!.*[_.]{2})[^_.].*[^_.]$/;
        if (usernameInput.value.match(pattern)) {
            isUsernameInputValid = true;
            invalidUsernameInput.hidden = true;
            validUsernameInput.hidden = false;
        } else {
            isUsernameInputValid = false;
            invalidUsernameInput.hidden = false;
            validUsernameInput.hidden = true;
        }
    }

    let isFullNameInputValid = false;
    fullNameInput.onkeyup = function () {
        let pattern = /^[a-z ,.'-]{1,255}$/i;
        if (fullNameInput.value.match(pattern)) {
            isFullNameInputValid = true;
            invalidFullNameInput.hidden = true;
            validFullNameInput.hidden = false;
        } else {
            isFullNameInputValid = false;
            invalidFullNameInput.hidden = false;
            validFullNameInput.hidden = true;
        }
    }

    let registrationForm = document.getElementById("registrationForm");
    registrationForm.addEventListener('submit', function (event) {
        if (!isEmailInputValid || !isPasswordInputValid
            || !isUsernameInputValid || !isFullNameInputValid) {
            event.preventDefault();
            event.stopPropagation();
        }
    });
}