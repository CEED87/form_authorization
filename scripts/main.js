
// Authorization form

const formAuth = document.querySelector('#authorization');
const formReg = document.querySelector('#register');
const btnReg = document.querySelector('#reg');



if (formAuth){
    const checkInput = () => {
        formAuth.addEventListener('click', (e) => {
            const inputs = formAuth.querySelectorAll('input');

            inputs.forEach(input => {
                if (input.value === '') {
                    input.classList.add('input');
                    input.nextElementSibling.innerHTML = "Field must not be empty";
                    e.preventDefault();
                } else {
                    input.classList.remove('input');
                    
                }
            })
        
        })
    }

    checkInput();
}


// Registration form

const checkLogin = (event, input) => {
    if (input.value.length < 6) {
        input.classList.add('input');
        input.nextElementSibling.innerHTML = "Must be at least 6 characters";
        input.value = ''
    } else {
        input.classList.remove('input');
        input.nextElementSibling.innerHTML = ''
    }
}

const checkPassword = (event, input) => {
    if (!/(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])[0-9a-zA-Z!@#$%^&*]{6,}/g.test(input.value)) {
        input.classList.add('input');
        input.nextElementSibling.innerHTML = "Must be at least 6 characters and contain numbers and letters";
        input.value = ''
    } else  {
        input.classList.remove('input');
        input.nextElementSibling.innerHTML = ''
    }
}

const checkPassConf = (event, input) => {
    const inputConf = input.previousElementSibling.previousElementSibling.previousElementSibling.value
    if (input.value !== inputConf || input.value === '') {
        input.classList.add('input');
        input.nextElementSibling.innerHTML = "Password and confirmation password do not match";
        input.value = ''
    } else  {
        input.classList.remove('input');
        input.nextElementSibling.innerHTML = ''
    }
}

const checkEmail = (event, input) => {
    if (!/^[A-Z0-9._%+-]+@[A-Z0-9-]+.+.[A-Z]{2,4}$/i.test(input.value)) {
        input.classList.add('input');
        input.nextElementSibling.innerHTML = "Invalid email entered";
        input.value = ''
    } else  {
        input.classList.remove('input');
        input.nextElementSibling.innerHTML = ''
    }
}

const checkName = (event, input) => {
    if (!/^[a-zA-Zа-яА-я]{3,16}$/.test(input.value)) {
        input.classList.add('input');
        input.nextElementSibling.innerHTML = "Must be at least 2 characters and consist of letters";
        input.value = ''
    } else  {
        input.classList.remove('input');
        input.nextElementSibling.innerHTML = ''
    }
}

if (formReg) {
    const checkInput = () => {
        btnReg.addEventListener('click', (e) => {
            const inputs = formReg.querySelectorAll('input');
            inputs.forEach(input => {
                if (input.name === 'login') {
                    checkLogin(e, input)
                } else if (input.name === 'password') {
                    checkPassword(e, input)
                } else if (input.name === 'password_confirm') {
                    checkPassConf(e, input)
                } else if (input.name === 'email') {
                    checkEmail(e, input)
                } else if (input.name === 'full_name') {
                    checkName(e, input)
                }
            })  
        })
    }
    
    checkInput()
}





