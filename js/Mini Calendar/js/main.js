let date = new Date();
let dayNum = date.getDay();
let active = document.querySelector(".week li:nth-child(" + dayNum + ")");
active.classList.add('current');