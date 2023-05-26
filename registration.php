<?php
session_start();
$login = filter_var(trim($_POST['login']), FILTER_SANITIZE_STRING);
$username = filter_var(trim($_POST['username']), FILTER_SANITIZE_STRING);
$password = filter_var(trim($_POST['password']), FILTER_SANITIZE_STRING);
$query = "INSERT INTO users (login,username,password) VALUES ('$login','$username','$password')";
require "connect.php";
$result = pg_query($cn, $query);
$_SESSION['message']='Регистрация прошла успешно';
header('Location: signup.php');

?>


