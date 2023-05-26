$(function(){

    $('.who').bind("change keyup input click", function() {
        if(this.value.length >= 2){
            var value = $('#who').val();
            $.post("search.php",
                {"value": value},
                function(data){
                    $(".search_result").html(data).fadeIn();
                }
            );

        }
    })

    $(".search_result").hover(function(){
        $(".who").blur();
    })
    $(".search_result").on("click", "li", function(){
        s_user = $(this).text().trim();
        $(".who").val(s_user);
        $(".search_result").fadeOut();
    });
    $.post("findFriends.php",{}, function (data)
    {
        data = JSON.parse(data);
        console.log(data.length);
        if(data.length !=0) {
            for (let i = 0; i < data.length; i++) {
                $("#friends").append("<div class='p-4'>" +
                    "<div class='myRow'>" +
                    '<label class="p-1">' + data[i].username + '</label>' +
                    "<div class='flex'>"+
                    "<form action='acceptedFriends.php' method='post'>" +
                    '<input type="hidden" value="' + data[i].username + '" id="accepted" name="accepted">' +
                    "<button type='submit' class='submitButton'>Добавить</button>" +
                    "</form>" +
                    " <form action='deniedFriends.php' method='post'>" +
                    '<input type="hidden" value="' + data[i].username + '" id="denied" name="denied">' +
                    "<button type='submit' class='submitButton'>Отказать</button>" +
                    "</form>" +
                    "</div>"+
                    "</div>"+
                    "</div>");
            }
        }
        else
        {
            $("#friends").append("<div class='p-4 '>У вас пока нет заявок</div>");
        }
    });
    $.post("displayFriends.php",{}, function (data)
    {
        data = JSON.parse(data);
        if(data.length !=0){
        for(let i = 0;i < data.length;i++)
        {
            $("#displayFriends").append(
                "<form action='convChat.php' method='post' class='p-4'>" +
                "<div class='myRow'>" +
                "<label class='p-1'>"+ data[i].username+"</label>" +
                "<input type='hidden' name='username'  id='username' value='"+data[i].username +"'    >" +
                "<div class='dropdown'> "+
                "<button class='dropbtn'>Подробнее</button>"+
                "<div class='dropdown-content'>" +
                "<button type='submit' class='submitButton'>Написать сообщение</button>"+
                "</form>" +
                "<form action='deleteFriends.php' method='post'>" +
                "<div class='myRow'>" +
                "<input type='hidden' name='username'  id='username' value='"+data[i].username +"'    >" +
                "<button type='submit' class='submitButton'>Удалить друга</button>"+
                "</div>" +
                "</form>"+
                "</div>"+
                "</div>"


            );
        }}
        else
        {
            $("#displayFriends").append("<div class='p-4'>У вас пока нет друзей</div>");
        }

    });
});
