$(function (){
      if($("#role").val() == "lead")
      {
          $("#displayParticipants").append("<table id='myTable'  class=\"table  table-striped table-hover\">\n" +
              "            <thead>\n" +
              "            <th>Никнейм участника</th>\n" +
              "            <th>Роль в группе</th>\n" +
              "            <th>Статус</th>\n" +
              "            <th>Редактирование</th>\n" +
              "            </thead>\n" +
              "            <tbody></tbody>\n" +
              "        </table>");
      }
      else {

          $("#displayParticipants").append("<table id='myTable'  class=\"table  table-striped table-hover\">\n" +
              "            <thead>\n" +
              "            <th>Никнейм участника</th>\n" +
              "            <th>Роль в группе</th>\n" +
              "            <th>Статус</th>\n" +
              "            </thead>\n" +
              "            <tbody></tbody>\n" +
              "        </table>");
      }





    $.post("displayParticipants.php",
        {"group": $("#group").val()},
        function(data){
            data = JSON.parse(data);
            if($("#role").val() == "lead")
            {
                var arr = [];
                for (let i = 0; i < data.length; i++) {
                    arr.push(
                        {
                            "DT_RowId": data[i].id,
                            "username": data[i].username,
                            "role": data[i].role,
                            "position": data[i].position,
                            "redac":

                                '<button type="submit" class="navButton">Подробнее</button>'
                        });
                }
                var table = $('#myTable').DataTable(
                    {
                        "columns": [
                            {
                                "title": "Никнейм участника", "data": "username", "visible": true,
                            },
                            {
                                "title": "Роль в группе", "data": "role", "visible": true,
                            },
                            {
                                "title": "Статус", "data": "position", "visible": true,
                            },
                            {
                                "title": "Редактирование", "data": "redac", "visible": true,
                            }
                        ], "language": language(),
                        data: arr,
                        responsive: true
                    });




            }
            else
            {


                var arr = [];
                for (let i = 0; i < data.length; i++) {
                    arr.push(
                        {
                            "DT_RowId": data[i].id,
                            "username": data[i].username,
                            "role": data[i].role,
                            "position": data[i].position
                        });
                }
                var table = $('#myTable').DataTable(
                    {
                        "columns": [
                            {
                                "title": "Никнейм участника", "data": "username", "visible": true,
                            },
                            {
                                "title": "Роль в группе", "data": "role", "visible": true,
                            },
                            {
                                "title": "Статус", "data": "position", "visible": true,
                            }
                        ], "language": language(),
                        data: arr,
                        responsive: true
                    });
            }

        }
    );
});