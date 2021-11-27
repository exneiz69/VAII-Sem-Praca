window.onload = function () {
    let titleInput = document.getElementById("titleInput");
    let invalidTitleInput = document.getElementById("invalid-titleInput");
    let validTitleInput = document.getElementById("valid-titleInput");

    let contentInput = document.getElementById("contentInput");
    let invalidContentInput = document.getElementById("invalid-contentInput");
    let validContentInput = document.getElementById("valid-contentInput");

    let textInput = document.getElementById("textInput");
    let invalidTextInput = document.getElementById("invalid-textInput");
    let validTextInput = document.getElementById("valid-textInput");

    titleInput.addEventListener("focus", function() {
        invalidTitleInput.hidden = false;
    }, {once : true});

    contentInput.addEventListener("focus", function() {
        invalidContentInput.hidden = false;
    }, {once : true});

    textInput.addEventListener("focus", function() {
        invalidTextInput.hidden = false;
    }, {once : true});

    let isTitleInputValid = false;
    titleInput.onkeyup = function () {
        if (titleInput.value.length != 0 && titleInput.value.length < 256) {
            isTitleInputValid = true;
            invalidTitleInput.hidden = true;
            validTitleInput.hidden = false;
        }
        else {
            isTitleInputValid = false;
            invalidTitleInput.hidden = false;
            validTitleInput.hidden = true;
        }
    }

    let isContentInputValid = false;
    contentInput.onkeyup = function () {
        if (contentInput.value.length != 0) {
            isContentInputValid = true;
            invalidContentInput.hidden = true;
            validContentInput.hidden = false;
        }
        else {
            isContentInputValid = false;
            invalidContentInput.hidden = false;
            validContentInput.hidden = true;
        }
    }

    let isTextInputValid = false;
    textInput.onkeyup = function () {
        if (textInput.value.length != 0 && textInput.value.length <= 500) {
            isTextInputValid = true;
            invalidTextInput.hidden = true;
            validTextInput.hidden = false;
        }
        else {
            isTextInputValid = false;
            invalidTextInput.hidden = false;
            validTextInput.hidden = true;
        }
    }

    let uploadNewsForm = document.getElementById("uploadNewsForm");
    uploadNewsForm.addEventListener('submit', function (event) {
        if (!isTitleInputValid || !isContentInputValid) {
            event.preventDefault();
            event.stopPropagation();
        }
    });

    let addCommentForm = document.getElementById("addCommentForm");
    addCommentForm.addEventListener('submit', function (event) {
        if (!isTextInputValid) {
            event.preventDefault();
            event.stopPropagation();
        }
    });
}