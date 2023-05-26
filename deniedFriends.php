<?php
session_start();
$id = $_SESSION['user']['id'];
require "connect.php";

$username = filter_var(trim($_POST['denied']), FILTER_SANITIZE_STRING);
$query = pg_query($cn, "SELECT users_id from users WHERE username = '$username'");
$index = 0;
while ($row = pg_fetch_object($query))
{
    $index = $row->users_id;
}
pg_query($cn,"DELETE FROM friends WHERE users_one = $index AND users_two=$id AND status = 'waiting';");
header('Location: main.php ');
?>
