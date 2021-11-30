window.onload = function () {
    let currentPasswordInput = document.getElementById("currentPasswordInput");
    let invalidCurrentPasswordInput = document.getElementById("invalid-currentPasswordInput");
    let validCurrentPasswordInput = document.getElementById("valid-currentPasswordInput");

    let newPasswordInput = document.getElementById("newPasswordInput");
    let invalidNewPasswordInput = document.getElementById("invalid-newPasswordInput");
    let validNewPasswordInput = document.getElementById("valid-newPasswordInput");

    let retypedNewPasswordInput = document.getElementById("retypedNewPasswordInput");
    let invalidRetypedNewPasswordInput = document.getElementById("invalid-retypedNewPasswordInput");
    let validRetypedNewPasswordInput = document.getElementById("valid-retypedNewPasswordInput");

    currentPasswordInput.addEventListener("focus", function () {
        invalidCurrentPasswordInput.hidden = false;
    }, {once: true});

    newPasswordInput.addEventListener("focus", function () {
        invalidNewPasswordInput.hidden = false;
    }, {once: true});

    retypedNewPasswordInput.addEventListener("focus", function () {
        invalidRetypedNewPasswordInput.hidden = false;
    }, {once: true});

    let isCurrentPasswordInputValid = false;
    currentPasswordInput.onkeyup = function () {
        let pattern = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[A-Za-z\d@$!%*?&]{6,72}$/;
        if (currentPasswordInput.value.match(pattern)) {
            isCurrentPasswordInputValid = true;
            invalidCurrentPasswordInput.hidden = true;
            validCurrentPasswordInput.hidden = false;
        } else {
            isCurrentPasswordInputValid = false;
            invalidCurrentPasswordInput.hidden = false;
            validCurrentPasswordInput.hidden = true;
        }
    }

    let isNewPasswordInputValid = false;
    newPasswordInput.onkeyup = function () {
        let pattern = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[A-Za-z\d@$!%*?&]{6,72}$/;
        if (newPasswordInput.value.match(pattern)) {
            isNewPasswordInputValid = true;
            invalidNewPasswordInput.hidden = true;
            validNewPasswordInput.hidden = false;
        } else {
            isNewPasswordInputValid = false;
            invalidNewPasswordInput.hidden = false;
            validNewPasswordInput.hidden = true;
        }
    }

    let isRetypedPasswordInputValid = false;
    retypedNewPasswordInput.onkeyup = function () {
        if (retypedNewPasswordInput.value === newPasswordInput.value) {
            isRetypedPasswordInputValid = true;
            invalidRetypedNewPasswordInput.hidden = true;
            validRetypedNewPasswordInput.hidden = false;
        } else {
            isRetypedPasswordInputValid = false;
            invalidRetypedNewPasswordInput.hidden = false;
            validRetypedNewPasswordInput.hidden = true;
        }
    }

    let myAccountForm = document.getElementById("myAccountForm");
    myAccountForm.addEventListener('submit', function (event) {
        if (!isCurrentPasswordInputValid || !isNewPasswordInputValid || !isRetypedPasswordInputValid) {
            event.preventDefault();
            event.stopPropagation();
        }
    });
}