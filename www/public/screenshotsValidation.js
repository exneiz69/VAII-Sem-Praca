window.onload = function () {
    let screenshotInput = document.getElementById("screenshotInput");
    let invalidScreenshotInput = document.getElementById("invalid-screenshotInput");
    let validScreenshotInput = document.getElementById("valid-screenshotInput");

    let descriptionInput = document.getElementById("descriptionInput");
    let invalidDescriptionInput = document.getElementById("invalid-descriptionInput");
    let validDescriptionInput = document.getElementById("valid-descriptionInput");

    descriptionInput.addEventListener("focus", function() {
        invalidDescriptionInput.hidden = false;
    }, {once : true});

    let isDescriptionInputValid = false;
    descriptionInput.onkeyup = function () {
        if (descriptionInput.value.length != 0 && descriptionInput.value.length < 256) {
            isDescriptionInputValid = true;
            invalidDescriptionInput.hidden = true;
            validDescriptionInput.hidden = false;
        }
        else {
            isDescriptionInputValid = false;
            invalidDescriptionInput.hidden = false;
            validDescriptionInput.hidden = true;
        }
    }

    let uploadScreenshotForm = document.getElementById("uploadScreenshotForm");
    uploadScreenshotForm.addEventListener('submit', function (event) {
        if (!isDescriptionInputValid) {
            event.preventDefault();
            event.stopPropagation();
        }
    });
}