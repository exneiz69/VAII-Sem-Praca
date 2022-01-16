import {validateOnFocusInitially, validate, preventSubmit} from './validation.js';

function validateVideoForm () {
    let videoIDInput = document.getElementById("videoIDInput");
    let invalidVideoIDInput = document.getElementById("invalid-videoIDInput");
    let validVideoIDInput = document.getElementById("valid-videoIDInput");

    let descriptionInput = document.getElementById("descriptionInput");
    let invalidDescriptionInput = document.getElementById("invalid-descriptionInput");
    let validDescriptionInput = document.getElementById("valid-descriptionInput");

    validateOnFocusInitially(videoIDInput, invalidVideoIDInput, validVideoIDInput);

    validateOnFocusInitially(descriptionInput, invalidDescriptionInput, validDescriptionInput);

    let isVideoIDInputValid = false;
    videoIDInput.addEventListener("input", function () {
        let pattern = /^[a-zA-Z0-9_-]{11,11}$/;
        isVideoIDInputValid = validate(videoIDInput, invalidVideoIDInput, validVideoIDInput,
            () => videoIDInput.value.match(pattern));
    });

    let isDescriptionInputValid = false;
    descriptionInput.addEventListener("input", function () {
        isDescriptionInputValid = validate(descriptionInput, invalidDescriptionInput, validDescriptionInput,
            () => descriptionInput.value.length !== 0 && descriptionInput.value.length < 256);
    });

    let uploadVideoForm = document.getElementById("uploadVideoForm");

    preventSubmit(uploadVideoForm,
        () => !isVideoIDInputValid || !isDescriptionInputValid);
}

window.addEventListener("load", function () {
    validateVideoForm();
});