import {validateOnFocusInitially, validate, preventSubmit} from './validation.js';

function validateRegistrationForm () {
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

    validateOnFocusInitially(emailInput, invalidEmailInput, validEmailInput);

    validateOnFocusInitially(passwordInput, invalidPasswordInput, validPasswordInput);

    validateOnFocusInitially(usernameInput, invalidUsernameInput, validUsernameInput);

    validateOnFocusInitially(fullNameInput, invalidFullNameInput, validFullNameInput);

    let isEmailInputValid = false;
    emailInput.addEventListener("input", function () {
        let pattern = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
        isEmailInputValid = validate(emailInput, invalidEmailInput, validEmailInput,
            () => emailInput.value.match(pattern));
    });

    let isPasswordInputValid = false;
    passwordInput.addEventListener("input", function () {
        let pattern = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[A-Za-z\d@$!%*?&]{6,72}$/;
        isPasswordInputValid = validate(passwordInput, invalidPasswordInput, validPasswordInput,
            () => passwordInput.value.match(pattern));
    });

    let isUsernameInputValid = false;
    usernameInput.addEventListener("input", function () {
        let pattern = /^(?=[a-zA-Z0-9._]{6,24}$)(?!.*[_.]{2})[^_.].*[^_.]$/;
        isUsernameInputValid = validate(usernameInput, invalidUsernameInput, validUsernameInput,
            () => usernameInput.value.match(pattern));
    });

    let isFullNameInputValid = false;
    fullNameInput.addEventListener("input", function () {
        let pattern = /^[a-z ,.'-]{1,255}$/i;
        isFullNameInputValid = validate(fullNameInput, invalidFullNameInput, validFullNameInput,
            () => fullNameInput.value.match(pattern));
    });

    let registrationForm = document.getElementById("registrationForm");

    preventSubmit(registrationForm,
        () => !isEmailInputValid || !isPasswordInputValid
            || !isUsernameInputValid || !isFullNameInputValid);
}

window.addEventListener("load", function () {
    validateRegistrationForm();
});