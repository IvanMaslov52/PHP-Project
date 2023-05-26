<?php
session_start();
require "connect.php";

$id =  $_SESSION['user']['id'];
$username = filter_var(trim($_POST['username']), FILTER_SANITIZE_STRING);
$password = filter_var(trim($_POST['password']), FILTER_SANITIZE_STRING);
$new_password = filter_var(trim($_POST['new-password']), FILTER_SANITIZE_STRING);
$query = "SELECT * FROM users  WHERE users_id = $id AND password='$password'";
$result = pg_query($cn, $query);
$user = pg_fetch_assoc($result);
if(pg_num_rows($result)>0)
{
    $_SESSION['user']=[
        'id'=> $user['users_id'],
        'username'=>$username,
        'login'=>$user['login']
    ];


    if(strcmp($new_password, '') == 0)
    {

        pg_query($cn, "UPDATE users SET username = '$username'  WHERE users_id = $id AND password='$password';");
        header('Location: main.php ');
    }
    else{
        pg_query($cn, "UPDATE users SET password= '$new_password' , username = '$username'  WHERE users_id = $id AND password='$password';");
        header('Location: main.php ');
    }



}
else{
    $_SESSION['profileInf']='Неверный пароль';
    header('Location: profile.php ');
}

header('Location: main.php ');
?>