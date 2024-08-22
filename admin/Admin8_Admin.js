let upper = document.getElementById("UpperDashboard");
let lower = document.getElementById("LowerDashboard");
upper.innerHTML="Admin";
lower.innerHTML="Dashboard >> Admin";


let registerform = document.getElementById("registeradmin");

function registeradmin(){
    registerform.style.display="block";
}

function closeadmin(){
    registerform.style.display="none";
}


