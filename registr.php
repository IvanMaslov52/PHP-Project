<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Registration</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.11.1/jquery.validate.js"></script>
    <script src="js/registration.js"></script>
    <link rel="stylesheet" href="css/authorize.css" type="text/css">
</head>
<body class=" container bg-light">
<h1>Форма регистрации</h1>
<div class="boxshadow container mt-4 p-4 m-4 bg-white rounded-4">
  <form id="registration" action="registration.php" method="post">
      <div class="form-group">
      <input type="text" class="form-control" name="login" id="login" placeholder="Введите логин">
      <span id="spanLogin"></span>
      </div>
      <div class="form-group">
      <input type="text" class="form-control" name="username" id="username" placeholder="Введите имя пользователя">
      <span id="spanUsername"></span>
      </div>
      <div class="form-group">
      <input type="password" class="form-control" name="password" id="password" placeholder="Введите пароль">
      <span id="spanPassword"></span>
      </div>
      <button type="submit" class="submitButton">Зарегистрироваться</button>
      <p class="p-1">
          У вас уже есть аккаунт? - <a href="signup.php">Авторизируйтесь</a>
      </p>
      <p>
          <?php
          if(isset($_SESSION['message']))
          {
              echo '<p>'.$_SESSION['message'].'</p>';
          }
          unset($_SESSION['message']);
          ?>

      </p>
  </form>

</div>
</body>
</html>