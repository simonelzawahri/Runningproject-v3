
// Time element
const time = document.querySelector('header div #time');
setInterval(() => {
    let d = new Date();
    time.innerHTML = d.toLocaleTimeString();
}, 1000)