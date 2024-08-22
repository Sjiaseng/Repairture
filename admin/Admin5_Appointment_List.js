appointment=document.getElementById("appointment");
appointment.className="active";

let upper = document.getElementById("UpperDashboard");
let lower = document.getElementById("LowerDashboard");
upper.innerHTML="Appointment";
lower.innerHTML="Dashboard >> Appointment >> Appointment Lists";


function showpop(){
    document.getElementById("appointmentpopup").style.display = "block";
}

function unshowpop(){
    document.getElementById("appointmentpopup").style.display = "none";
}