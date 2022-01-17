import {revalidateCommentsAddBox} from "./newsValidation.js";

function getComments(newsID) {
    fetch("?c=news&a=getComments&newsID=" + newsID)
        .then(response => response.json())
        .then(data => {
            let html = "";
            for (let comment of data) {
                html += "<div class=\"col-10\">" + comment.Text + "<hr class=\"my-2\"></div>"
            }
            document.getElementById("commentsBox" + newsID).innerHTML = html;
        });
}

function getAllComments() {
    let commentsBoxes = document.getElementsByClassName("comments-box");
    for (let commentsBox of commentsBoxes) {
        getComments(commentsBox.id.replace("commentsBox", ""));
    }
}

function processCommentsSending() {
    let commentsAddBoxes = document.getElementsByClassName("comments-add-box");

    for (let commentsAddBox of commentsAddBoxes) {
        let button = commentsAddBox.getElementsByTagName("button").item(0);
        let textInput = commentsAddBox.getElementsByTagName("textarea").item(0);
        let newsID = commentsAddBox.id.replace("addCommentForm", "")
        button.addEventListener("click", function () {
            if (textInput.value.length !== 0 && textInput.value.length <= 500) {
                sendComment(newsID, textInput.value);
                textInput.value = "";
                revalidateCommentsAddBox(commentsAddBox);
            }
        })
    }
}

function sendComment(newsID, text) {
    fetch("?c=news&a=addComment", {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded'
        },
        body: "newsID=" + newsID + "&text=" + text
    });
}

window.addEventListener("load", function () {
    getAllComments();
    setInterval(() => getAllComments(), 2000);
    processCommentsSending();
});