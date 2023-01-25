let btnChange = document.querySelector('.change_info'),
    infoPersonal = document.querySelector('.info_personal'),
    updateInfo = document.querySelector('.update_information');
btnChange.addEventListener('click', function() {
    infoPersonal.classList.remove('active');
    updateInfo.classList.toggle('active');
})

let inputAvatar = document.querySelector('.input_avatar'),
    boxShowImgDemo = document.querySelector('.show_img_avatar_demo');

if(inputAvatar) {
    inputAvatar.addEventListener('change', function(e) {
        var srcImg = e.target.files[0];
        var src = URL.createObjectURL(srcImg);
        boxShowImgDemo.innerHTML = `<img src="${src}" alt="" class="show_img_demo">`;
    });
}