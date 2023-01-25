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