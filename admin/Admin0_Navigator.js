//Navigator Animation
function dropdown(){
    let dropdown= document.getElementById("dropdown");
    let dropdown2= document.getElementById("dropdown2");
    let appointment= document.getElementById("innerappointment");
    let customer= document.getElementById("innercustomer");
    let moving= document.getElementById("moving");

    dropdown.onclick = function(){
        dropdown.style.transformOrigin= "6px";
        dropdown.style.transform= "rotate(-90deg)";
        dropdown.style.transitionDuration= "0.25s";
        appointment.style.display= "none";
        moving.style.transform= "translateY(-120px)";
        dropdown2.style.transform= "translateY(0px)";
        moving.style.transitionDuration= "0.5s";
        dropdown.style.transitionDuration= "0.5s";
    }
        
    dropdown.ondblclick = function(){
        dropdown.style.transform= "rotate(0deg)";
        appointment.style.display= "block";
        moving.style.transform= "translateY(0px)";
        dropdown2.style.transform= "translateY(0px)";
    }

    dropdown2.onclick = function(){
        dropdown2.style.transformOrigin= "6px";
        dropdown2.style.transform= "rotate(-90deg)";
        dropdown2.style.transitionDuration= "0.25s";
        customer.style.display= "none";
    }

    dropdown2.ondblclick = function(){
        dropdown2.style.transform= "rotate(0deg)";
        customer.style.display= "block";
    }
}

function arrow(){
    let arrow = document.getElementById("arrow_sticker");
    arrow.style.display="none"; 
}

function profiledropdown(){
    let profilecontent= document.getElementById("profiledropdown");
    let fadeInDown=document.getAnimations("fadeInDown");
    let cross=document.getElementById("cross");

    profilecontent.style.animation= "fadeInDown 1s";
    cross.style.animation= "fadeInDown 1s";
    setTimeout(profilecontent.style.display= "block", 1000);
    setTimeout(cross.style.display= "block", 1000);
}


function notificationdropdown(){
    let profilenotificationdropdown= document.getElementById("profilenotificationdropdown");
    let fadeInDown=document.getAnimations("fadeInDown");
    let cross2=document.getElementById("cross2");

    profilenotificationdropdown.style.animation= "fadeInDown 1s";
    cross2.style.animation= "fadeInDown 1s";
    setTimeout(profilenotificationdropdown.style.display= "block", 1000);
    setTimeout(cross2.style.display= "block", 1000);
}


function closeprofile(){
    let cross=document.getElementById("cross");
    let profilecontent= document.getElementById("profiledropdown");

    cross.onclick=function(){
        profilecontent.style.display="none";
        cross.style.display="none";
    }
}

function closenotification(){
    let cross2=document.getElementById("cross2");
    let notificationdropdown=document.getElementById("profilenotificationdropdown");

    cross2.onclick=function(){
        notificationdropdown.style.display="none";
        cross2.style.display="none";
    }
}

