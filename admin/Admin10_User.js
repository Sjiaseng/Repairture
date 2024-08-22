let upper = document.getElementById("UpperDashboard");
let lower = document.getElementById("LowerDashboard");
upper.innerHTML="User";
lower.innerHTML="Dashboard >> User";

function openuserverify(){
    document.getElementById("verifyuserpage").style.display="block";
}


function closeuserverify(){
    document.getElementById("verifyuserpage").style.display="none";
}