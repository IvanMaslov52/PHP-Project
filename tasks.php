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
    <link type="text/css" rel="stylesheet" href="css/task.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="task-container">
        <div class="mt-3 ">
        <a class="linkLeft m-3 p-1" href="/main.php">Назад</a></div>
        <div class="task">
            <div class="task-group">Группа 1</div>
            <div class="task-deadline">Дедлайн: 01.05.2023</div>
            <div class="task-description">Описание задачи 1</div>
            <div class="task-actions">
                <button class="task-action">Перейти к описанию</button>
            </div>
        </div>
        <div class="task">
            <div class="task-group">Группа 2</div>
            <div class="task-deadline">Дедлайн: 02.05.2023</div>
            <div class="task-description">Описание задачи 2</div>
            <div class="task-actions">
                <button class="task-action">Перейти к описанию</button>
            </div>
        </div>
        <div class="task">
            <div class="task-group">Группа 3</div>
            <div class="task-deadline">Дедлайн: 03.05.2023</div>
            <div class="task-description">Описание задачи 3</div>
            <div class="task-actions">
                <button class="task-action">Перейти к описанию</button>
            </div>
        </div>
    </div>
</body>
</html>