require('./bootstrap');

require('alpinejs');

var buttonswitch = document.getElementsByClassName('switch-button');

if( buttonswitch.length > 0 ){
    
    document.querySelector('.switch-button').addEventListener('click', () => {
    
        var register, login, button;
        
        button = document.querySelector('.switch-button');    
        register = document.querySelector('#register_form');
        login = document.querySelector('#login_form');
        card = document.querySelector('.auth-card');
        
        
        if(register.classList.contains('hide')) {
            card.style = 'min-height: 600px;'
            login.classList.remove('show');
            login.classList.add('hide');
            register.classList.remove('hide');
            register.classList.add('show');
            button.innerHTML= 'Login';
           

        } else if (login.classList.contains('hide')) {
            card.style = 'min-height: 370px;'
            register.classList.remove('show');
            register.classList.add('hide');
            login.classList.remove('hide');
            login.classList.add('show');
            button.innerHTML = 'Register';
            
        }
    });
}
