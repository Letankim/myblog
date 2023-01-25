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

let pass = document.querySelector('.pass'),
    conform = document.querySelector('.conform'),
    signUp = document.querySelector('.submit');
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