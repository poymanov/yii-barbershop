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
    })

    $('a.login').on('click',function () {
        $('#login-form input[type=text]').val('');
        $('.field-loginform-username .help-block.help-block-error').text('');
        $('.field-loginform-password .help-block.help-block-error').text('');
    });

    $('#remember').on('click',function () {
        $('label[for="remember"]').toggleClass('remember-checked');
    });

});
