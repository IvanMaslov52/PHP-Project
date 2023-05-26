<?php
session_start();
?>



<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.11.1/jquery.validate.js"></script>
    <script data-src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <link rel="stylesheet" href="css/authorize.css" type="text/css">

</head>
<body class="container bg-light">
<h1>Форма авторизации</h1>
<div class="boxshadow container mt-4 p-4 m-4 bg-white rounded-4">
    <form id="auth" action="login.php" method="post">
        <div class="form-group">
            <input type="text" class="form-control" name="login" id="login" placeholder="Введите логин">
            <input type="password" class="form-control" name="password" id="password" placeholder="Введите пароль">
        </div>
        <button type="submit" class="submitButton">Авторизироваться</button>
        <p class="p-1">
            У вас нет аккаунта ? - <a href="registr.php">Зарегестрируйтесь</a>
        </p>
        <?php
        if(isset($_SESSION['message']))
        {
            echo '<p>'.$_SESSION['message'].'</p>';
        }
        unset($_SESSION['message']);
        ?>
    </form>
</div>

</body>
</html>