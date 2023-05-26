$(function () {
    $("#addGroup").validate
    ({
        rules: {
            name: {
                required: true,
                minlength: 4,
                maxlength: 20
            },
            description: {
                required: true,
            }
        },
        messages: {
            name: {
                required: 'Название не может быть пустым',
                maxlength: 'Максимальная длина логина 20 символов',
                minlength: 'Минимальная длина логина 4 символа'
            },
            description: {
                required: 'Описание не может быть пустым',
            }
        },errorPlacement: function (error, element) {
            if (element.attr("name") == "name")
            {
                $("#spanName").text(error.text());
            }
            if (element.attr("name") == "description")
            {
                $("#spanDescription").text(error.text());
            }
        }
    });
});