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
    <title>Профиль пользователя</title>
    <link rel="stylesheet" href="css/styles.css" type="text/css">
    <meta charset="utf-8" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="js/profile.js"></script>
</head>
<body class="bodyContainer">
<div class="p-2"><a class="imgLink" href="/main.php"><img class="icon" src="image/exit.png"></a></div>
    <h1>Профиль пользователя</h1>
    <div class="profile-description">
        <div class="avatar-container">
            <div class="avatar">
                <img src="https://via.placeholder.com/200x200" alt="Аватар" />
            </div>
            <div class="avatar-overlay">
                <label for="avatar-upload" class="avatar-link">Изменить аватар</label>
                <input type="file" id="avatar-upload" style="display: none;">
            </div>
        </div>
        <div class="contact-info">
            <p><?= $_SESSION['user']['login'] ?></p>
            <p><?= $_SESSION['user']['username'] ?></p>
        </div>
    </div>
    <h1>Изменение имени пользователя и пароля</h1>
    <div class="form-container">
        <form action="profileScript.php" method="post">
            <label for="username">Имя пользователя:</label>
            <input type="text" id="username" name="username" placeholder="Введите новое имя пользователя" value="<?= $_SESSION['user']['username'] ?>">
            <label for="password">Пароль:</label>
            <input type="password" id="password" name="password" placeholder="Введите старый пароль" required>
            <label for="new-password">Новый пароль: (Необязательно)</label>
            <input type="password" id="new-password" name="new-password" placeholder="Введите новый пароль">
            <button type="submit">Сохранить</button>
        </form>
    </div>


    <p>
        <?php
        if(isset($_SESSION['profileInf']))
        {
            echo '<p>'.$_SESSION['profileInf'].'</p>';
        }
        unset($_SESSION['profileInf']);
        ?>
    </p>
</body>
</html>
