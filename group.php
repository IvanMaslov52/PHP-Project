<?php
session_start();
if(isset($_SESSION['user']))
{

}
else
    {
        header('Location: signup.php ');
    }
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Task Manager</title>
    <link type="text/css" rel="stylesheet" href="css/group.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="js/group.js"></script>
    <script src="/js/language.js" type="text/javascript"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.css" />
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.js"></script>

</head>
<body>
<div class="p-2 "><a class="imgLink" href="/main.php"><img class="icon" src="image/exit.png"></a></div>
<h1 class="text-center">Группы</h1>
<div class="task-container">

    <div class="m-3 p-1 inline"></div><div class="m-3 p-1 inline wightadd"><a class="linkRight" href="/addGroup.php">Добавить группу</a></div>
    <div class="m-3 p-3">
    <table id='myTable'  class="table  m-3 p-3 table-striped table-hover">
        <thead>
        <th>Название группы</th>
        <th>Описание группы</th>
        <th>Статус группы</th>
        <th>Роль в группе</th>
        <th>Ваш статус в группе</th>
        <th> </th>
        </thead>
        <tbody></tbody>
    </table>
    </div>
</div>
</body>
</html>