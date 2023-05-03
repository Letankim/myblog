let btnShow = document.querySelectorAll('.interact'),
    inputPass = document.querySelector('.input_pass'),
    boxInputPass = document.querySelector('.box_input_pass');

if (btnShow) {
    [...btnShow].forEach(function(item) {
        item.addEventListener('click', function() {
            if(inputPass.type == "password") {
                inputPass.type = 'text';
                boxInputPass.classList.remove('active');
            } else {
                inputPass.type = 'password';
                boxInputPass.classList.add('active');
            }
        })
    })
}

const pass = document.querySelector('.pass'),
    conform = document.querySelector('.conform'),
    signUp = document.querySelector('.submit');
    inputEmail = document.querySelector('.input_email');
    messageError = document.querySelector('.message__error');
inputEmail.addEventListener('blur', (e)=> {
    const re = /^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i;
    if(re.test(e.target.value)) {
        signUp.disabled = false;
        messageError.innerHTML = "";
    } else {
        signUp.disabled = true;
        messageError.innerHTML = "Email không hợp lệ.";
    }
});
if(conform) {
    signUp.addEventListener('click', function(e) {
        if(pass.value != conform.value) {
            alert("Confirmation password is incorrect.");
            pass.value = "";
            conform.value = "";
            e.preventDefault();
        }
    })
}