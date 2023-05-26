$(function (){
    $.post("displayParticipants.php",
        {},
        function(data){
            data = JSON.parse(data);
           for(let i =0;i < data.length;i++)
           {
               $("#displayParticipants").append("<div>"+ data[i].username+"</div>")
           }
        }
    );
});