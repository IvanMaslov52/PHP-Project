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
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Main</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.11.1/jquery.validate.js"></script>
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <script src="js/displayGroup.js"></script>
</head>
<body class="container bg-light">
<div class="container row m-auto">

    <div class="nav float left bg-white rounded-4 col-2 p-1 m-3 ">
        <ul class="align-middle list-unstyled w-100">
            <li class="p-3"><a class="link" href="main.php">Главная</a></li>
            <li class="p-3"><a class="link" href="group.php">Проекты</a></li>
            <li class="p-3"><a class="link" href="tasks.php">Мои задачи </a></li>
            <li class="p-3 "><a class="link" href="">Настройки </a></li>
        </ul>
    </div>
    <div class=" col p-1 m-3">
        <div class="somediv bg-white rounded-3 w-100h-100 row">
            <div class="form-group col-md-2 m-1 p-2 ">
                <form class="flex">
                <input class="inputSize  rounded-3 form-control" placeholder="Введите группу"/>
                    <div class="buttonPadding"> <button type="submit" class="submitButton">Поиск</button></div>
                </form>
            </div>
            <div class="imageDiv">
                <img class="p-3" src="image/bell.png"/>
                <div class="dropdown">
                <button class="dropbtn"> <?= $_SESSION['user']['username'] ?></button>
                <div class="dropdown-content">
                    <a href="profile.php">Личный кабинет</a>
                    <a href="friends.php">Друзья</a>
                    <form  action="logout.php" method="post"><button class="exitButton" type="submit">Выход</button></form>
                </div>
            </div>
        </div>
        </div>
        <div class="add"><a class="link" href="/addGroup.php">Добавить группу</a></div>


        <div id="group">
        <div  class="row rowDiv pb-1">
            <div class="addGroupDiv col-5 bg-white rounded-3 p-2">
                <div class="p-1">
                <div class="myRow pb-1">
                <span class="name fw-bold"> </span>
                    <img src="image/vertical_point.png">
                </div>
                <span class="doneTask pb-2">Задач выполнено : 25/50</span>
                <div class="progressContainer">
                    <div class="progress"></div>
                </div>
                <div class="pb-2"></div>
                <div>
                <span class="status"></span>
                </div>
                </div>
            </div>
            <div class="addGroupDiv col-5 bg-white rounded-3 p-2">
                <div  class="p-1">
                <span class="fw-bold pb-1">Задачи :</span>
                    <ol>
                        <li>Формирование метода добавления</li>
                        <li>Разработка сервиса для переводов денег</li>
                        <li>Исправление верстки страницы</li>
                    </ol>
            </div>
            </div>
        </div>
        </div>
        <div id="table"></div>
    </div>


</div>
</body>
</html>