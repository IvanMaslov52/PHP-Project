$(function () {
    $("#changeGroup").validate
    ({
        rules: {
            description: {
                required: true

            },
            status: {
                required: true
            }
        },
        messages: {
            description: {
                required: 'Описание не может быть пустым'
            },
            status: {
                required: 'Статус не может быть пустым',
            }
        },errorPlacement: function (error, element) {
            if (element.attr("name") == "status")
            {
                $("#spanStatus").text(error.text());
            }
            if (element.attr("name") == "description")
            {
                $("#spanDescription").text(error.text());
            }
        }
    });
});