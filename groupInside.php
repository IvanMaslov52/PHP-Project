<?php
session_start();
$id = $_SESSION['user']['id'];
$group = $_POST['group'];
require "connect.php";
$query  = pg_query($cn, "select party_id,users_party.users_id,name,description,status, role from users_party inner join party using (party_id) where users_party.users_id = $id and users_party.party_id = $group;");


$name = null;
$description = null;
$status = null;
$role  = null;



$result =array();
while ($row = pg_fetch_assoc($query))
{
     $name = $row['name'];
     $description = $row['description'];
     $status = $row['status'];
     $role = $row['role'];
}



?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Task Manager</title>
    <link type="text/css" rel="stylesheet" href="css/group.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.11.1/jquery.validate.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="js/displayParticipants.js"></script>
    <script src="/js/language.js" type="text/javascript"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.css" />
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/js/select2.min.js"></script>

</head>
<body>
<input type="hidden" id="nickname" name="nickname" value="<?php echo $_SESSION['user']['username'] ?>">
<input type="hidden" id="group" name="group" value="<?php echo $group ?>">
<input type="hidden" id="role" name="role" value="<?php echo $role ?>">
<div  class="task-container p-5">

<?php echo "<h1>".$name."</h1>" ?>  <!-- сюда передать как параметр -->
<div class="line p-1"></div>
    <div class="pt-3">
        <p class="fw-bold">Описание: </p>
    </div>
    <?php
    echo "<div class='border  border-2 rounded border-primary p-2'>".$description."</div>"
    ?>
    <div class="pt-3">
        <p class="fw-bold"> Статус группы: </p>
      <?php
      echo "<div>".$status."</div>";
      ?>
    </div>


    <div class="pt-3">
        <p class="fw-bold">Прогресс тасков: </p>
    </div>

    <span>Задач выполнено : 25/50</span>
    <div class="progressionContainer">
        <div class="progression"></div>
    </div>


            <?php
            if($role == 'lead')
            {
                echo ' <form action="changeGroup.php" method="post"> 
               <input type="hidden" id="groupId" name="groupId" value="'.$group.'">
                <div class="rightButton"><button type="submit" class="navButton">Изменить группу</button></div>
            </form>';
            }

            ?>

        <button type="button" class="imgButton" id="specialButton"><img class="icon" alt="logo_1" src="/image/plus.png"></button>

         <form id="member">
        <div>
             <div class="inline">
                 <p>Введите никнйем:</p>
                 <input ENGINE="text" name='referal' placeholder="Живой поиск" value="" class="searchInput" autocomplete="off">
                 <ul class="searchResult"></ul>
             </div>
             <div class="inline">
                 <p>Выбранные пользователи</p>
                 <ul id="selectedElem">
                 </ul>
                 <span id="error"></span>
             </div>
        </div>





             <select id="groupMembers" name="groupMembers[]" multiple class="visible">
             </select>
             <div class="pt-2">
             <div class="inlineButton p-2">
             <img id="hide" class="icon" alt="logo_1" src="/image/back.png">
             </div>
             <div class="inlineButton p-2">
             <button class="imgButton" type="submit"><img class="icon"  alt="logo_1" src="/image/disc.png"></button>
             </div>
             </div>
         </form>

            <form id="change">

                <div>
                <label id="formLabel" class="p-1 m-2"></label>
                <input type="hidden" id="formId" name="formId">
                <input type="hidden" id="formUsername" name="formUsername">

                <select class="customSelect p-1 m-1" id="formRole" name="formRole">
                    <option value="none">none</option>
                    <option value="backend">backend</option>
                    <option value="frontend">frontend</option>
                    <option value="architect">architect</option>
                </select>

                <select class="customSelect p-1 m-1" id="formStatus" name="formStatus">
                    <option value="active">active</option>
                    <option value="busy">busy</option>
                    <option value="excluded">excluded</option>
                    <option value="waiting">waiting</option>
                </select>
                </div>
<div class="right">
    <div class="inlineButton p-2">
               <img id="hideChange" class="icon" alt="logo_1" src="/image/back.png">
    </div>
    <div class="inlineButton p-2">
                <button class="imgButton" type="submit"><img class="icon"  alt="logo_1" src="/image/disc.png"></button>
    </div>
</div>
            </form>


<p class="pt-3 fw-bold"> Список участников: </p>

<div id="displayParticipants">





    </div>
</div>


</body>
</html>