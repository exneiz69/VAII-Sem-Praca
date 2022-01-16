import {validateOnFocusInitially, validate, preventSubmit} from './validation.js';

function validateMyAccountForm() {
    let currentPasswordInput = document.getElementById("currentPasswordInput");
    let invalidCurrentPasswordInput = document.getElementById("invalid-currentPasswordInput");
    let validCurrentPasswordInput = document.getElementById("valid-currentPasswordInput");

    let newPasswordInput = document.getElementById("newPasswordInput");
    let invalidNewPasswordInput = document.getElementById("invalid-newPasswordInput");
    let validNewPasswordInput = document.getElementById("valid-newPasswordInput");

    let retypedNewPasswordInput = document.getElementById("retypedNewPasswordInput");
    let invalidRetypedNewPasswordInput = document.getElementById("invalid-retypedNewPasswordInput");
    let validRetypedNewPasswordInput = document.getElementById("valid-retypedNewPasswordInput");

    validateOnFocusInitially(currentPasswordInput, invalidCurrentPasswordInput, validCurrentPasswordInput);

    validateOnFocusInitially(newPasswordInput, invalidNewPasswordInput, validNewPasswordInput);

    validateOnFocusInitially(retypedNewPasswordInput, invalidRetypedNewPasswordInput, validRetypedNewPasswordInput);

    let isCurrentPasswordInputValid = false;
    currentPasswordInput.addEventListener("input", function () {
        let pattern = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[A-Za-z\d@$!%*?&]{6,72}$/;
        isCurrentPasswordInputValid = validate(currentPasswordInput, invalidCurrentPasswordInput, validCurrentPasswordInput,
            () => currentPasswordInput.value.match(pattern));
    });

    let isNewPasswordInputValid = false;
    newPasswordInput.addEventListener("input", function () {
        let pattern = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[A-Za-z\d@$!%*?&]{6,72}$/;
        isNewPasswordInputValid = validate(newPasswordInput, invalidNewPasswordInput, validNewPasswordInput,
            () => newPasswordInput.value.match(pattern));
    });

    let isRetypedNewPasswordInputValid = false;
    retypedNewPasswordInput.addEventListener("input", function () {
         isRetypedNewPasswordInputValid = validate(retypedNewPasswordInput, invalidRetypedNewPasswordInput, validRetypedNewPasswordInput,
            () => retypedNewPasswordInput.value === newPasswordInput.value);
    });

    let myAccountForm = document.getElementById("myAccountForm");

    preventSubmit(myAccountForm,
        () => !isCurrentPasswordInputValid || !isNewPasswordInputValid || !isRetypedNewPasswordInputValid);
}

window.addEventListener("load", function () {
    validateMyAccountForm();
});