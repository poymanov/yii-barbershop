$( document ).ready(function() {

    $('#login-form').on('submit',function (e) {
        e.preventDefault();

        // Очистка полей с ошибками
        $('.field-loginform-username .help-block.help-block-error').text('');
        $('.field-loginform-password .help-block.help-block-error').text('');
        $('.modal-login').removeClass("error");

        $.ajax({
            url: '/site/user-login',
            type: 'POST',
            data: $(this).serialize(),
            success: function(res){

                var errors = JSON.parse(res);

                if (errors) {
                    // Ошибки, связанные с логином
                    if (errors.username) {
                        $('.field-loginform-username').addClass('has-error');
                        $('.field-loginform-username .help-block.help-block-error').text(errors.username);
                    }

                    // Ошибки, связанные с паролем
                    if (errors.password) {
                        $('.field-loginform-password').addClass('has-error');
                        $('.field-loginform-password .help-block.help-block-error').text(errors.password);
                    }
                }

                $('.modal-login').addClass("error");
            }
        });
    });

    $('#signup-form').on('submit',function (e) {
        e.preventDefault();

        // Очистка полей с ошибками
        $('.field-signupform-username .help-block.help-block-error').text('');
        $('.field-signupform-email .help-block.help-block-error').text('');
        $('.field-signupform-password .help-block.help-block-error').text('');
        $('.modal-signup').removeClass("error");

        $.ajax({
            url: '/site/user-signup',
            type: 'POST',
            data: $(this).serialize(),
            success: function(res){

                var data = JSON.parse(res);

                if (data) {

                    if (data.success) {
                        $('.modal-signup').toggleClass('show-window');
                        $('.modal-success-reg').toggleClass('show-window');
                        $('.modal-success-reg-message').text(data.success);
                    } else {

                        // Ошибки, связанные с логином
                        if (data.username) {
                            $('.field-signupform-username').addClass('has-error');
                            $('.field-signupform-username .help-block.help-block-error').text(data.username);
                        }

                        // Ошибки, связанные с e-mail
                        if (data.email) {
                            $('.field-signupform-email').addClass('has-error');
                            $('.field-signupform-email .help-block.help-block-error').text(data.email);
                        }

                        // Ошибки, связанные с паролем
                        if (data.password) {
                            $('.field-signupform-password').addClass('has-error');
                            $('.field-signupform-password .help-block.help-block-error').text(data.password);
                        }

                        $('.modal-signup').addClass("error");
                    }

                }


            }
        });
    });

    $('#password-request-form').on('submit',function (e) {
        e.preventDefault();

        $('.field-passwordresetrequestform-email .help-block.help-block-error').text('');
        $('.modal-password-request').removeClass("error");

        $.ajax({
            url: '/site/user-password-reset-request',
            type: 'POST',
            data: $(this).serialize(),
            success: function(res){

                var data = JSON.parse(res);

                if (data) {

                    if (data.success) {
                        $('.modal-password-request').toggleClass('show-window');
                        $('.modal-success-reg').toggleClass('show-window');
                        $('.modal-success-reg-message').text(data.success);
                        $('.modal-success-reg-header').text(data.successHeader);
                    } else {
                        
                        // Ошибки, связанные с e-mail
                        if (data.email) {
                            $('.field-passwordresetrequestform-email').addClass('has-error');
                            $('.field-passwordresetrequestform-email .help-block.help-block-error').text(data.email);
                        }
                        
                        $('.modal-password-request').addClass("error");
                    }

                }


            }
        });
    });




    $('a.login').on('click',function () {
        $('#login-form input[type=text]').val('');
        $('.field-loginform-username .help-block.help-block-error').text('');
        $('.field-loginform-password .help-block.help-block-error').text('');
    });

    $('a.signup').on('click',function () {
        $('#signup-form input[type=text]').val('');
        $('#signup-form input[type=password]').val('');
        $('.field-signupform-username .help-block.help-block-error').text('');
        $('.field-signupform-email .help-block.help-block-error').text('');
        $('.field-signupform-password .help-block.help-block-error').text('');
    });

    $('#remember').on('click',function () {
        $('label[for="remember"]').toggleClass('remember-checked');
    });

    $('.modal-close').on('click',function () {
        $('.modal-user').removeClass('show-window');
        $('.modal-user').removeClass('error');
    });

    $('.forget-password').on('click',function () {
        $('#password-request-form input[type=text]').val('');
        $('.field-passwordresetrequestform-email .help-block.help-block-error').text('');
    })

});
