<?php
session_start();
require "connect.php";

$login = filter_var(trim($_POST['login']), FILTER_SANITIZE_STRING);
$password = filter_var(trim($_POST['password']), FILTER_SANITIZE_STRING);
$query = "SELECT * FROM users  WHERE login = '$login' AND password='$password'";
$result = pg_query($cn, $query);
$user = pg_fetch_assoc($result);
if(pg_num_rows($result)>0)
{
    $_SESSION['message']='Авторизация успешна';
    $_SESSION['user']=[
        'id'=> $user['users_id'],
        'username'=>$user['username'],
        'login'=>$user['login']
    ];
    header('Location: main.php ');
}
else{
    $_SESSION['message']='Неверный логин и пароль';
    header('Location: signup.php ');
}
?>