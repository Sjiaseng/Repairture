let upper = document.getElementById("UpperDashboard");
let lower = document.getElementById("LowerDashboard");
upper.innerHTML="Dashboard";
lower.innerHTML="Dashboard";


const currentDate = document.querySelector(".current-date");
const daysTag = document.querySelector(".calendar-days");
const calendarIcon = document.querySelectorAll(".calendar-icon span")


let date = new Date();
currYear = date.getFullYear();
currMonth = date.getMonth();

const months = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];

const renderCalendar = () => {
    let firstDate = new Date(currYear, currMonth, 1).getDay();
    let lastDate = new Date (currYear, currMonth +1, 0).getDate();
    let lastDate2 = new Date (currYear, currMonth, 0).getDate();
    let lastDay = new Date (currYear, currMonth, lastDate2).getDay()
    let listTag= "";

    for (let i = firstDate; i > 0; i--){
        listTag += `<li class="inactivedate">${lastDate2 - i + 1}</li>`;
    }

    for (let i = 1; i <= lastDate; i++){
        let isToday = i ===date.getDate() && currMonth===new Date().getMonth() && currYear === new Date().getFullYear()? "activedate" : "";
        listTag += `<li class="${isToday}">${i}</li>`;
    }

    for (let i = lastDay; i < 6; i++){
        listTag += `<li class="inactivedate">${i - lastDay +1 } </li>`
    }


    currentDate.innerText = `${months[currMonth]} ${currYear}`;
    daysTag.innerHTML = listTag;
}

renderCalendar();

calendarIcon.forEach(icon => {
    icon.addEventListener("click", () => {
            currMonth = icon.id === "prev" ? currMonth - 1 : currMonth + 1;
            if (currMonth < 0 || currMonth > 11){
                date = new Date(currYear, currMonth);
                currYear = date.getFullYear();
                currMonth = date.getMonth();
            } else {
                date = new Date();
            }
            renderCalendar();
        });
})

