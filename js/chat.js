$(function () {
    $("#send").click(function () {
            let text = $("#usermsg").val();
            $.post("addingChat.php", {"text": text}, function () {
                $("#usermsg").val("");
                display();
            });
        }
    );
    display();
    setInterval(function ()
    {
        $.post("getMessage.php", {}, function (data) {
            data = JSON.parse(data);
            $("#chatbox").empty();
            for (let i = 0; i < data.length; i++) {
                if (data[i].sender == $("#senderId").text()) {
                    $("#chatbox").append("<div> you : " + data[i].message +" </div>");
                } else {
                    $("#chatbox").append("<div>"+$("#receiverUsername").text() +" : " + data[i].message +" </div>");
                }
            }

        });
    },2000);

});

function display() {
    $.post("getMessage.php", {}, function (data) {
        data = JSON.parse(data);
        $("#chatbox").empty();
        for (let i = 0; i < data.length; i++) {
            if (data[i].sender == $("#senderId").text()) {
                $("#chatbox").append("<div> you : " + data[i].message +" </div>");
            } else {
                $("#chatbox").append("<div>"+$("#receiverUsername").text() +" : " + data[i].message +" </div>");
            }
        }

    });
};