window.onload = function () {
    let videoIDInput = document.getElementById("videoIDInput");
    let invalidVideoIDInput = document.getElementById("invalid-videoIDInput");
    let validVideoIDInput = document.getElementById("valid-videoIDInput");

    let descriptionInput = document.getElementById("descriptionInput");
    let invalidDescriptionInput = document.getElementById("invalid-descriptionInput");
    let validDescriptionInput = document.getElementById("valid-descriptionInput");

    videoIDInput.addEventListener("focus", function() {
        invalidVideoIDInput.hidden = false;
    }, {once : true});

    descriptionInput.addEventListener("focus", function() {
        invalidDescriptionInput.hidden = false;
    }, {once : true});

    let isVideoIDInputValid = false;
    videoIDInput.onkeyup = function () {
        let pattern = /^[a-zA-Z0-9_-]{11,11}$/;
        if (videoIDInput.value.match(pattern)) {
            isVideoIDInputValid = true;
            invalidVideoIDInput.hidden = true;
            validVideoIDInput.hidden = false;
        }
        else {
            isVideoIDInputValid = false;
            invalidVideoIDInput.hidden = false;
            validVideoIDInput.hidden = true;
        }
    }

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

    let uploadVideoForm = document.getElementById("uploadVideoForm");
    uploadVideoForm.addEventListener('submit', function (event) {
        if (!isVideoIDInputValid || !isDescriptionInputValid) {
            event.preventDefault();
            event.stopPropagation();
        }
    });
}