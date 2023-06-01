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

</head>
<body>
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
        <p class="fw-bold">Прогресс тасков: </p>
    </div>

    <span class="">Задач выполнено : 25/50</span>
    <div class="progressionContainer">
        <div class="progression"></div>
    </div>
<p class="pt-3 fw-bold"> Список участников: </p>

<div id="displayParticipants">





    </div>
</div>


</body>
</html>