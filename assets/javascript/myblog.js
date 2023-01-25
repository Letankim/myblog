var btnSearch = document.querySelector('.bx-search'),
    boxSearch = document.querySelector('.search'),
    inputSearch = document.querySelector('.input_search');
if(btnSearch) {
    btnSearch.addEventListener('click',function() {
        boxSearch.classList.toggle('active');
    })
}

let duongdan = document.querySelector('.href'),
    dir = document.querySelector('.item_post');
if(duongdan) {
    window.onload = function() {
        dir.href = duongdan.value;
    }
}

