var modalLogin = document.querySelector('.modal-login');
var modalSignup = document.querySelector('.modal-signup');
var modalLoginLink = document.querySelector('a.login');
var modalSignupLink = document.querySelector('a.signup');
var modalClose = document.querySelectorAll('.modal-close');
var modalMapLink = document.querySelector('.map-link');
var modalMap = document.querySelector('.modal-map');

if (modalLogin) {
    var modalForm = modalLogin.querySelector('form');
    var modalUserName = modalLogin.querySelector('[name=user-login]');

    if (modalLoginLink) {
        modalLoginLink.addEventListener('click', function(event) {
            event.preventDefault();
            if (modalMap && modalMap.classList.contains('show-window')) {
                modalMap.classList.remove('show-window')
            }
            if (modalSignup && modalSignup.classList.contains('show-window')) {
                modalSignup.classList.remove('show-window')
            }
            modalLogin.classList.add('show-window');
        });
    }
}

if (modalSignup) {
    if (modalSignupLink) {
        modalSignupLink.addEventListener('click', function(event) {
            event.preventDefault();
            if (modalMap && modalMap.classList.contains('show-window')) {
                modalMap.classList.remove('show-window')
            }
            if (modalLogin && modalLogin.classList.contains('show-window')) {
                modalLogin.classList.remove('show-window')
            }
            modalSignup.classList.add('show-window');
        });
    }
}

window.addEventListener('keydown', function(event) {
    if (event.keyCode == 27) {
        if (modalLogin.classList.contains('show-window')) {
            modalLogin.classList.remove('show-window');
        }
        if (modalLogin.classList.contains('error')) {
            modalLogin.classList.remove('error');
        }
        if (modalMap.classList.contains('show-window')) {
            modalMap.classList.remove('show-window')
        }
    }
});

if (modalMap) {
    if (modalMapLink) {
        modalMapLink.addEventListener('click', function (event) {
            event.preventDefault();
            if (modalLogin.classList.contains('show-window')) {
                modalLogin.classList.remove('show-window');
            }
            modalMap.classList.add('show-window');
        });
    }
}
