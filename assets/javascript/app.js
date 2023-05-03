let backTop = document.querySelector('.back_to_top');

if(backTop) {
    window.onscroll = function() {
        if(document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
            backTop.classList.add("active");
        } else {
            backTop.classList.remove("active");
        }
        if(window.innerHeight + window.scrollY >= document.body.offsetHeight) { 
            backTop.style.color = "white";
        } else {
            backTop.style.color = "#000";
        }
    }
    backTop.onclick = function() {
        document.body.scrollIntoView({
            behavior: "smooth",
        });
    }
}

// advertisement

let boxAdver = document.querySelector('.box_advertisement'), 
    boxOverlay = document.querySelector('.overlay_ad'),
    btnCloseAdver = document.querySelector('.box_btn_close');

if(boxAdver) {
    setTimeout(function () {
        boxOverlay.classList.add('active');
        boxAdver.classList.add('active');
    }, 10000);
    
    boxOverlay.onclick = function() {
        boxOverlay.classList.remove('active');
        boxAdver.classList.remove('active');
    }
    btnCloseAdver.onclick = function() {
        boxOverlay.classList.remove('active');
        boxAdver.classList.remove('active');
    }
}
// check email 
const inputEmail  = document.querySelector('.input_email'),
      messageErrorEmail = document.querySelector('.message_error_email'),
      btnSubmitSendMessage = document.querySelector('.btn_submit_send_message'),
      inputPhone = document.querySelector('.input_phone'),
      messageErrorPhone = document.querySelector('.message_error_phone');

inputEmail.addEventListener('blur', (e) =>{
    const re = /^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i;
    regex(re,e.target.value, messageErrorEmail)
})
inputPhone.addEventListener('blur',(e)=> {
    const re = /(03|05|07|08|09|01[2|6|8|9])+([0-9]{8})\b/;
    regex(re, e.target.value, messageErrorPhone);
})
function regex(type, value, elementMessage) {
    if(type.test(value)) {
        btnSubmitSendMessage.disabled = false;
        elementMessage.style.display = 'none';
    } else {
        btnSubmitSendMessage.disabled = true;
        elementMessage.style.display = 'block';
    }
}

