let upper = document.getElementById("UpperDashboard");
let lower = document.getElementById("LowerDashboard");
upper.innerHTML="Technician";
lower.innerHTML="Dashboard >> Technician";

function opentechverify(){
    document.getElementById("verifytechpage").style.display="block";
}


function closetechverify(){
    document.getElementById("verifytechpage").style.display="none";
}