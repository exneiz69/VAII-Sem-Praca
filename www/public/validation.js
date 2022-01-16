export function validateOnFocusInitially(input, invalidInput, validInput) {
    input.addEventListener("focus", function () {
        invalidInput.hidden = false;
        validInput.hidden = true;
    }, {once: true});
}

export function validate(input, invalidInput, validInput, conditionHandler) {
    let isInputValid;
    if (conditionHandler()) {
        isInputValid = true;
        invalidInput.hidden = true;
        validInput.hidden = false;
    } else {
        isInputValid = false;
        invalidInput.hidden = false;
        validInput.hidden = true;
    }
    return isInputValid;
}

export function preventSubmit(form, conditionHandler) {
    form.addEventListener('submit', function (event) {
        if (conditionHandler()) {
            event.preventDefault();
            event.stopPropagation();
        }
    });
}