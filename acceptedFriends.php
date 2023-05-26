<?php
session_start();
$id = $_SESSION['user']['id'];
require "connect.php";

$username = filter_var(trim($_POST['accepted']), FILTER_SANITIZE_STRING);
$query = pg_query($cn, "SELECT users_id from users WHERE username = '$username'");
$index = 0;
while ($row = pg_fetch_object($query))
{
    $index = $row->users_id;
}

//pg_query($cn,"UPDATE friends SET status = 'accepted' WHERE users_one = $id AND users_two=$index AND status = 'waiting';");
pg_query($cn,"UPDATE friends SET status = 'accepted'  WHERE users_one = $index AND users_two=$id AND status = 'waiting';");
pg_query($cn, "INSERT INTO friends (users_one,users_two,status) VALUES ($id,$index,'accepted')");
header('Location: main.php ');
?>
