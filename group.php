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
</head>
<body>
<div class="add"><a class="link" href="/addGroup.php">Добавить проект</a></div>
<div class="task-container">
    <div class="task">
        <div class="task-group">Epam</div>
        <div class="task-deadline">Активная</div>
        <div class="task-description">Американская ИТ-компания, основанная в 1993 году. Производитель заказного программного обеспечения, специалист по консалтингу, резидент Белорусского парка высоких технологий.</div>
        <span class="doneTask">Задач выполнено : 25/50</span>
        <div class="progressContainer">
            <div class="progress"></div>
        </div>
        <div class="somepad"></div>
        <div><span>Количество участников :  </span><span>   30</span></div>
        <div class="somepad"></div>
        <div class="task-actions">
            <form action="groupInside.php" method="post">
                <button class="task-action">Подробнее</button>
            </form>
        </div>
    </div>
    <div class="task">
        <div class="task-group">Grid Dynamics</div>
        <div class="task-deadline">Активная</div>
        <div class="task-description">Лидер в области технологического консалтинга и цифровой трансформации бизнеса. Занимаемся построением высокотехнологичных масштабируемых решений, используя опыт работы с облачными сервисами c момента их создания, высоконагруженными системами, применяя передовые практики анализа данных и машинного обучения.</div>
        <span class="doneTask">Задач выполнено : 25/50</span>
        <div class="progressContainer">
            <div class="progress"></div>
        </div>
        <div class="somepad"></div>
        <div><span>Количество участников :  </span><span>   30</span></div>
        <div class="somepad"></div>
        <div class="task-actions">
            <button class="task-action">Подробнее</button>
        </div>
    </div>
    <div class="task">
        <div class="task-group">NetCracker</div>
        <div class="task-deadline"> Неактивная </div>
        <div class="task-description"> Дочерняя компания корпорации NEC, которая уже более 100 лет работает с сетевыми технологиями и инновациями. Netcracker отвечает за всё телекоммуникационное программное обеспечение и сервисные активы корпорации NEC. </div>
        <span class="doneTask">Задач выполнено : 25/50</span>
        <div class="progressContainer">
            <div class="progress"></div>
        </div>
        <div class="somepad"></div>
        <div><span>Количество участников :  </span><span>   30</span></div>
        <div class="somepad"></div>
        <div class="task-actions">
            <button class="task-action">Подробнее</button>
        </div>
    </div>
</div>
</body>
</html>