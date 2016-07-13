var modalLogin = document.querySelector('.modal-login');
var modalSignup = document.querySelector('.modal-signup');
var modalRequestPasswordLink = document.querySelector('a.forget-password');
var modalRequestPassword = document.querySelector('.modal-password-request');
var modalSuccessReg = document.querySelector('.modal-success-reg');
var modalConfirmEmail = document.querySelector('.modal-confirm-email');
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
            if (modalConfirmEmail && modalConfirmEmail.classList.contains('show-window')) {
                modalConfirmEmail.classList.remove('show-window')
            }
            if (modalRequestPassword && modalRequestPassword.classList.contains('show-window')) {
                modalRequestPassword.classList.remove('show-window')
            }
            if (modalSuccessReg && modalSuccessReg.classList.contains('show-window')) {
                modalSuccessReg.classList.remove('show-window')
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
            if (modalConfirmEmail && modalConfirmEmail.classList.contains('show-window')) {
                modalConfirmEmail.classList.remove('show-window')
            }
            if (modalRequestPassword && modalRequestPassword.classList.contains('show-window')) {
                modalRequestPassword.classList.remove('show-window')
            }
            if (modalSuccessReg && modalSuccessReg.classList.contains('show-window')) {
                modalSuccessReg.classList.remove('show-window')
            }
            modalSignup.classList.add('show-window');
        });
    }
}

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

if (modalConfirmEmail) {
    if (modalMap && modalMap.classList.contains('show-window')) {
        modalMap.classList.remove('show-window')
    }
    if (modalLogin && modalLogin.classList.contains('show-window')) {
        modalLogin.classList.remove('show-window')
    }
    modalConfirmEmail.classList.add('show-window');
}

if (modalRequestPassword) {
    if (modalRequestPasswordLink) {
        modalRequestPasswordLink.addEventListener('click', function (event) {
            event.preventDefault();

            if (modalMap && modalMap.classList.contains('show-window')) {
                modalMap.classList.remove('show-window')
            }

            if (modalSignup && modalSignup.classList.contains('show-window')) {
                modalSignup.classList.remove('show-window')
            }

            if (modalLogin && modalLogin.classList.contains('show-window')) {
                modalLogin.classList.remove('show-window')
            }

            if (modalConfirmEmail && modalConfirmEmail.classList.contains('show-window')) {
                modalConfirmEmail.classList.remove('show-window')
            }

            if (modalSuccessReg && modalSuccessReg.classList.contains('show-window')) {
                modalSuccessReg.classList.remove('show-window')
            }

            modalRequestPassword.classList.add('show-window');
        });
    }
}