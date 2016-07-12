var modalLogin = document.querySelector('.modal-login');
var modalLoginLink = document.querySelector('a.login');
var modalClose = document.querySelectorAll('.modal-close');
var modalMapLink = document.querySelector('.map-link');
var modalMap = document.querySelector('.modal-map');

if (modalLogin) {
    var modalForm = modalLogin.querySelector('form');
    var modalUserName = modalLogin.querySelector('[name=user-login]');
    var storage = localStorage.getItem('login');

    if (modalLoginLink) {
        modalLoginLink.addEventListener('click', function(event) {
            event.preventDefault();
            if (modalMap && modalMap.classList.contains('show-window')) {
                modalMap.classList.remove('show-window')
            }
            modalLogin.classList.add('show-window');
        });
    }

    modalClose[0].addEventListener('click', function(event) {
        event.preventDefault();
        modalLogin.classList.remove('show-window');
        modalLogin.classList.remove('error');
    });
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
    modalMapLink.addEventListener('click', function(event) {
        event.preventDefault();
        if (modalLogin.classList.contains('show-window')) {
            modalLogin.classList.remove('show-window');
        }
        modalMap.classList.add('show-window');
    });
    modalClose[1].addEventListener('click', function(event) {
        event.preventDefault();
        modalMap.classList.remove('show-window');
    });
}
