//  menu in mobile
let btnMenu = document.querySelector('.box_menu'),
    overlay = document.querySelector('.overlay'),
    navigation = document.querySelector('.navigation');
if(btnMenu) {
    btnMenu.addEventListener('click',function() {
        navigation.classList.add('active');
        overlay.classList.add('active');
    });
    overlay.addEventListener('click',function() {
        navigation.classList.remove('active');
        this.classList.remove('active');
    })
}
//  show all details for post to follow
let btnShowDetail = document.querySelectorAll('.bx-show-alt'),
    btnClose = document.querySelectorAll('.btn_close i'),
    overlayDetails = document.querySelectorAll('.overlay_show_post');
    function clickShowDetails(ele) {
        let tr = ele.parentElement.parentElement;
            let boxShow = tr.querySelector('.box_show_details'),
                overlayShowDetail = tr.querySelector('.overlay_show_post');
            boxShow.classList.add('active');
            overlayShowDetail.classList.add('active');
    }
    function closeShow() {
        if(document.querySelector('.box_show_details.active')) {
            document.querySelector('.box_show_details.active').classList.remove('active');
        } else {
            document.querySelector('.box_show_comment.active').classList.remove('active');
        }
        document.querySelector('.overlay_show_post.active').classList.remove('active');
    }
// show comment box for item post 
function clickShowComment(element) {
    var parent = element.parentElement;
    var boxComment = parent.querySelector('.box_show_comment');
    var overlayComment = parent.querySelector('.overlay_show_post');
    boxComment.classList.add('active');
    overlayComment.classList.add('active');
}
//  show form add post
const boxForm = document.querySelector('.box__form-add form.form__add');
function toggleShow(ele) {
    ele.classList.toggle('active');
    if(ele.classList.contains('active')) {
        ele.innerHTML = "Hide form add";
        boxForm.style.display = "flex";
    } else {
        ele.innerHTML = "Show form add";
        boxForm.style.display = "none";
    }
} 
//  change title web 
let title = document.querySelector('.header_app .title').innerText,
    listNav = document.querySelectorAll('.nav_item'),
    titleHeader = document.querySelector('title');
    listNav[0].classList.add('active');
    titleHeader.innerHTML = title;
switch (title) {
    case "Thống kê":
        document.querySelector('.nav_item.active').classList.remove("active");
        listNav[0].classList.add('active');
        break;
    case "Navigation":
        document.querySelector('.nav_item.active').classList.remove("active");
        listNav[1].classList.add('active');
        break;
    case "Update navigation":
        document.querySelector('.nav_item.active').classList.remove("active");
        listNav[1].classList.add('active');
        break;
    case "Banner":
        document.querySelector('.nav_item.active').classList.remove("active");
        listNav[2].classList.add('active');
        break;
    case "Update banner":
        document.querySelector('.nav_item.active').classList.remove("active");
        listNav[2].classList.add('active');
        break;
    case "Posts": 
        document.querySelector('.nav_item.active').classList.remove("active");
        listNav[3].classList.add('active');
        break;
    case "Update post": 
        document.querySelector('.nav_item.active').classList.remove("active");
        listNav[3].classList.add('active');
    break;
    case "Tài khoản": 
        document.querySelector('.nav_item.active').classList.remove("active");
        listNav[4].classList.add('active');
        break;
    case "Update tài khoản": 
        document.querySelector('.nav_item.active').classList.remove("active");
        listNav[4].classList.add('active');
    break;
    case "Introduction":
        document.querySelector('.nav_item.active').classList.remove("active");
        listNav[5].classList.add('active');
        break;
    case "Slogan":
        document.querySelector('.nav_item.active').classList.remove("active");
        listNav[6].classList.add('active');
        break;
    case "Advertise":
        document.querySelector('.nav_item.active').classList.remove("active");
        listNav[7].classList.add('active');
        break;
}

