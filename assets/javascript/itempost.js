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
    console.log(window.location.href);
    // shareIframe.src = "https://www.facebook.com/plugins/share_button.php?href=" + window.location.href + "&layout=button&size=large&width=87&height=28&appId";
    // console.log(shareIframe);
}


