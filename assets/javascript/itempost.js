let hre = document.querySelector('.share_item_link');
if(hre) {
    hre.addEventListener('click', function(e) {
        e.preventDefault();
        let link = window.location.href;
        let input = document.createElement('input');
        document.body.appendChild(input) ;
        input.value = link;
        input.select();
        document.execCommand('copy'); 
        input.remove();
    })
}

let shareIframe = document.querySelector('.share_post_frame');

window.onload = function() {
    const hr = document.URL;
    shareIframe.src = 'https://www.facebook.com/plugins/share_button.php?href='+hr+'&layout=button_count&size=large&mobile_iframe=true&width=83&height=28&appId';
}






