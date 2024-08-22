let upper = document.getElementById("UpperDashboard");
let lower = document.getElementById("LowerDashboard");
upper.innerHTML="To-Do Lists";
lower.innerHTML="Dashboard >> To-Do Lists";

const delete_todo = document.querySelector("#deletingtodo");
const delete_todo_alert = document.querySelector("#to-do-alert");

const todoyes = document.querySelector("#to-do-yes");
const todono = document.querySelector("#to-do-no");


function todo_show(){
    delete_todo_alert.style.display= "block";
}

function todo_hidden(){
    delete_todo_alert.style.display= "none";
}

const todoform = document.getElementById("to-do-form");

function addtodo(){
    todoform.style.display="block";
}

function closetodo(){
    todo_form.style.display="none";
}

function closingform(){
    document.getElementById("to-do-form").style.display = "none";
}
