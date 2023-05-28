$(function (){
    $.post("getGroup.php",
        {},
        function(data){
            data = JSON.parse(data);
           for(let i =0;i < data.length;i++)
           {
               console.log(data.length);
               var group =data[i];
               var groupBlock = $("#group .rowDiv").clone(true);
               groupBlock.appendTo("#table");
               groupBlock.find(".name").text( group.name);
               groupBlock.find(".status").text(group.partyStatus);
           }
        }
    );
});