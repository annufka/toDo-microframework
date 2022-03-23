"use strict";

document.addEventListener("DOMContentLoaded", function () {

    const saveButton = document.getElementById("btn-submit");
    if (saveButton) {
        saveButton.addEventListener("click", function () {
            var oReq = new XMLHttpRequest();
            let user_input = document.getElementById("user-input");
            oReq.addEventListener("load", function () {
                let responce = JSON.parse(this.responseText);
                document.getElementById("list-will-do").innerHTML = generatePage(responce, false);
                document.getElementById("list-done").innerHTML = generatePage(responce, true);
            });
            let newItem = user_input.value;
            user_input.value = "";
            let data = new FormData();
            data.append('new_task', newItem);
            oReq.open("POST", "/todos", true);
            oReq.send(data);
       });
    }
    if (document.getElementById("list-will-do")) {
        document.getElementById("list-will-do").addEventListener("click", function (event) {
            actionWithItem(event);
        });
    }
    if (document.getElementById("list-will-do")) {
        document.getElementById("list-done").addEventListener("click", function (event) {
            actionWithItem(event);
        });
    }
})


function generatePage(responceArray, bool) {
    let listUl = "";
    for (let item in responceArray) {
        if (Boolean(Number(responceArray[item]['done'])) === bool) {
            listUl += generateHTML(responceArray[item]);
        }
    }
    return listUl
}


function generateHTML(task) {
    let HTML = `<div class="todo-item">
                    <li class="d-flex justify-content-start align-items-center">
                        <input id="${task['task_id']}" class="form-check-input done" type="checkbox" value="${Boolean(Number(task['done'])) ? 'checked' : ''}">
                        ${task['description']}
                        <button id="${task['task_id']}" class="btn btn-delete"><i id="${task['task_id']}" class="fa fa-trash-o" style="font-size:1pem"></i></button>
                    </li>
                </div>`;
    return HTML
}


function actionWithItem(event) {
    var oReq = new XMLHttpRequest();
    oReq.addEventListener("load", function () {
        let responce = JSON.parse(this.responseText);
        document.getElementById("list-will-do").innerHTML = generatePage(responce, false);
        document.getElementById("list-done").innerHTML = generatePage(responce, true);
    });
    let data = new FormData();
    data.append('task_id', event.target.id);
    if (event.target.tagName == "INPUT") {
        oReq.open("PATCH", `/todos?id=${event.target.id}`, true);
    }
    if (event.target.tagName == "I" || event.target.tagName == "BUTTON") {
        oReq.open("DELETE", `/todos?id=${event.target.id}`, true);
    }
    oReq.send(data);
}