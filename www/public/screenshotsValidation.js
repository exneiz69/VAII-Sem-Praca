window.onload = function () {
    let screenshotInput = document.getElementById("screenshotInput");
    let invalidScreenshotInput = document.getElementById("invalid-screenshotInput");
    let validScreenshotInput = document.getElementById("valid-screenshotInput");

    let descriptionInput = document.getElementById("descriptionInput");
    let invalidDescriptionInput = document.getElementById("invalid-descriptionInput");
    let validDescriptionInput = document.getElementById("valid-descriptionInput");

    descriptionInput.addEventListener("focus", function () {
        invalidDescriptionInput.hidden = false;
    }, {once: true});

    const allowedExtensions = ['jpg', 'jpeg', 'png'];
    const sizeLimit = 5_000_000; // 5 megabyte
    let isScreenshotInputValid = false;
    screenshotInput.onchange = function () {
        const {name: fileName, size: fileSize} = this.files[0];

        const fileExtension = fileName.split(".").pop();

        if (allowedExtensions.includes(fileExtension) && fileSize <= sizeLimit) {
            isScreenshotInputValid = true;
            invalidScreenshotInput.hidden = true;
            validScreenshotInput.hidden = false;
        } else {
            isScreenshotInputValid = false;
            invalidScreenshotInput.hidden = false;
            validScreenshotInput.hidden = true;
            this.value = null;
        }
    }

    let isDescriptionInputValid = false;
    descriptionInput.onkeyup = function () {
        if (descriptionInput.value.length != 0 && descriptionInput.value.length < 256) {
            isDescriptionInputValid = true;
            invalidDescriptionInput.hidden = true;
            validDescriptionInput.hidden = false;
        } else {
            isDescriptionInputValid = false;
            invalidDescriptionInput.hidden = false;
            validDescriptionInput.hidden = true;
        }
    }

    let uploadScreenshotForm = document.getElementById("uploadScreenshotForm");
    uploadScreenshotForm.addEventListener('submit', function (event) {
        if (!isScreenshotInputValid || !isDescriptionInputValid) {
            event.preventDefault();
            event.stopPropagation();
        }
    });
}