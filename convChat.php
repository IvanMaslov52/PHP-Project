<?php
session_start();
$username = filter_var(trim($_POST['username']), FILTER_SANITIZE_STRING);
require "connect.php";

$query = pg_query($cn, "SELECT users_id,username from users WHERE username = '$username'");
$index = 0;
$senderUsername = "";
while ($row = pg_fetch_object($query))
{
    $senderUsername = $row->username;
    $index = $row->users_id;
}
$_SESSION['user']['senderId'] = $index;
$_SESSION['user']['senderUsername'] = $senderUsername;
header('Location: chat.php ');
?>