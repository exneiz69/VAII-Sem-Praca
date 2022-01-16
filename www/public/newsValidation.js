import {validateOnFocusInitially, validate, preventSubmit} from './validation.js';

function validateNewsForm() {
    let titleInput = document.getElementById("titleInput");
    let invalidTitleInput = document.getElementById("invalid-titleInput");
    let validTitleInput = document.getElementById("valid-titleInput");

    let contentInput = document.getElementById("contentInput");
    let invalidContentInput = document.getElementById("invalid-contentInput");
    let validContentInput = document.getElementById("valid-contentInput");

    let commentsAddBoxes = document.getElementsByClassName("comments-add-box");

    validateOnFocusInitially(titleInput, invalidTitleInput, validTitleInput);

    validateOnFocusInitially(contentInput, invalidContentInput, validContentInput);

    let isTitleInputValid = false;
    titleInput.addEventListener("input", function () {
        isTitleInputValid = validate(titleInput, invalidTitleInput, validTitleInput,
            () => titleInput.value.length !== 0 && titleInput.value.length < 256);
    });

    let isContentInputValid = false;
    contentInput.addEventListener("input", function () {
        isContentInputValid = validate(contentInput, invalidContentInput, validContentInput,
            () => contentInput.value.length !== 0);
    });

    for (let commentsAddBox of commentsAddBoxes) {
        let textInput = commentsAddBox.getElementsByTagName("textarea").item(0);
        let invalidTextInput = commentsAddBox.getElementsByClassName("invalid").item(0);
        let validTextInput = commentsAddBox.getElementsByClassName("valid").item(0);
        validateOnFocusInitially(textInput, invalidTextInput, validTextInput);
        textInput.addEventListener("input", function () {
            validate(textInput, invalidTextInput, validTextInput,
                () => textInput.value.length !== 0 && textInput.value.length <= 500);
        });
    }

    let uploadNewsForm = document.getElementById("uploadNewsForm");

    preventSubmit(uploadNewsForm,
        () => !isTitleInputValid || !isContentInputValid);
}

window.addEventListener("load", function () {
    validateNewsForm();
});

export function revalidateCommentsAddBox(commentsAddBox) {
    let textInput = commentsAddBox.getElementsByTagName("textarea").item(0);
    let invalidTextInput = commentsAddBox.getElementsByClassName("invalid").item(0);
    let validTextInput = commentsAddBox.getElementsByClassName("valid").item(0);
    invalidTextInput.hidden = true;
    validTextInput.hidden = true;
    validateOnFocusInitially(textInput, invalidTextInput, validTextInput);
}