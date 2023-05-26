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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.11.1/jquery.validate.js"></script>
    <script src="js/displayParticipants.js"></script>
</head>
<body>
<h1>Epam</h1>  <!-- сюда передать как параметр -->
Описание: <p>
    <!-- сюда передать как параметр -->
Американская ИТ-компания, основанная в 1993 году. Производитель заказного программного обеспечения,
специалист по консалтингу, резидент Белорусского парка высоких технологий.
<p>
Список участников: <p>
<div id="displayParticipants"></div>
</body>
</html>