<?php
session_start();
$id = $_SESSION['user']['id'];
require "connect.php";

$username = filter_var(trim($_POST['username']), FILTER_SANITIZE_STRING);
$query = pg_query($cn, "SELECT users_id from users WHERE username = '$username'");
$index = 0;
while ($row = pg_fetch_object($query))
{
    $index = $row->users_id;
}
pg_query($cn, "DELETE FROM friends WHERE (users_one = $index  and users_two =$id  and status = 'accepted' ) or (users_one = $id and users_two =$index  and status = 'accepted' )");
header('Location: friends.php ');
?>