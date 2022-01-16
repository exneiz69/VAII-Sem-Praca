import {validateOnFocusInitially, validate, preventSubmit} from './validation.js';

function validateScreenshotForm () {
    let screenshotInput = document.getElementById("screenshotInput");
    let invalidScreenshotInput = document.getElementById("invalid-screenshotInput");
    let validScreenshotInput = document.getElementById("valid-screenshotInput");

    let descriptionInput = document.getElementById("descriptionInput");
    let invalidDescriptionInput = document.getElementById("invalid-descriptionInput");
    let validDescriptionInput = document.getElementById("valid-descriptionInput");

    validateOnFocusInitially(descriptionInput, invalidDescriptionInput, validDescriptionInput);

    let isScreenshotInputValid = false;
    screenshotInput.addEventListener("change", function () {
        const allowedExtensions = ['jpg', 'jpeg', 'png'];
        const sizeLimit = 5_000_000;
        const {name: fileName, size: fileSize} = this.files[0];
        const fileExtension = fileName.split(".").pop();
        isScreenshotInputValid = validate(screenshotInput, invalidScreenshotInput, validScreenshotInput,
            () => allowedExtensions.includes(fileExtension) && fileSize <= sizeLimit);
        if (!isScreenshotInputValid) {
            this.value = null;
        }
    });

    let isDescriptionInputValid = false;
    descriptionInput.addEventListener("input", function () {
        isDescriptionInputValid = validate(descriptionInput, invalidDescriptionInput, validDescriptionInput,
            () => descriptionInput.value.length !== 0 && descriptionInput.value.length < 256);
    });

    let uploadScreenshotForm = document.getElementById("uploadScreenshotForm");

    preventSubmit(uploadScreenshotForm,
        () => !isScreenshotInputValid || !isDescriptionInputValid);
}

window.addEventListener("load", function () {
    validateScreenshotForm();
});