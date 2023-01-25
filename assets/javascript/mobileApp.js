// show menu in mobile 
let btnShow = document.querySelector('.menu_btn'),
    btnClose = document.querySelector('.close_btn'),
    menu = document.querySelector('.navigation');

if(btnShow) {
    btnShow.addEventListener('click', function(e) {
        menu.classList.add('active');
    });
    btnClose.addEventListener('click', function(e) {
        menu.classList.remove('active');
    });
} 