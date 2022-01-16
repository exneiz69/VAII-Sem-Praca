import {validateOnFocusInitially, validate, preventSubmit} from './validation.js';

function validateLoginForm() {
    let usernameInput = document.getElementById("usernameInput");
    let invalidUsernameInput = document.getElementById("invalid-usernameInput");
    let validUsernameInput = document.getElementById("valid-usernameInput");

    let passwordInput = document.getElementById("passwordInput");
    let invalidPasswordInput = document.getElementById("invalid-passwordInput");
    let validPasswordInput = document.getElementById("valid-passwordInput");

    validateOnFocusInitially(usernameInput, invalidUsernameInput, validUsernameInput);

    validateOnFocusInitially(passwordInput, invalidPasswordInput, validPasswordInput);

    let isUsernameInputValid = false;
    usernameInput.addEventListener("input", function () {
        let pattern = /^(?=[a-zA-Z0-9._]{6,24}$)(?!.*[_.]{2})[^_.].*[^_.]$/;
        isUsernameInputValid = validate(usernameInput, invalidUsernameInput, validUsernameInput,
            () => usernameInput.value.match(pattern));
    });

    let isPasswordInputValid = false;
    passwordInput.addEventListener("input", function () {
        let pattern = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[A-Za-z\d@$!%*?&]{6,72}$/;
        isPasswordInputValid = validate(passwordInput, invalidPasswordInput, validPasswordInput,
            () => passwordInput.value.match(pattern));
    });

    let loginForm = document.getElementById("loginForm");

    preventSubmit(loginForm,
        () => !isUsernameInputValid || !isPasswordInputValid);
}

window.addEventListener("load", function () {
    validateLoginForm();
});