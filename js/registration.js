$(function () {
    $("#registration").validate
    ({
        rules: {
            login: {
                required: true,
                minlength: 4,
                maxlength: 20
            },
            username: {
                required: true,
                minlength: 4,
                maxlength: 20
            },
            password: {
                required: true,
                minlength: 6
            }
        },
        messages: {
            login: {
                required: 'Логин не может быть пустым',
                maxlength: 'Максимальная длина логина 20 символов',
                minlength: 'Минимальная длина логина 4 символа'
            },
            username: {
                required: 'Имя пользователя не может быть пустым',
                maxlength: 'Максимальная длина имени пользователя 20 символов',
                minlength: 'Минимальная длина имени пользователя 4 символа'
            },
            password: {
                required: 'Пароль не может быть пустым',
                minlength: 'Минимальная длина пароля 6 символов'
            }
        },errorPlacement: function (error, element) {
            if (element.attr("name") == "password")
            {
                $("#spanPassword").text(error.text());
            }
            if (element.attr("name") == "login")
            {
                $("#spanLogin").text(error.text());
            }
            if (element.attr("name") == "username")
            {
                $("#spanUsername").text(error.text());
            }

        }
    });
});
