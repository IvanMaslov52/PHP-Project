<?php
session_start();
$id = $_SESSION['user']['id'];
require "connect.php";

$query = pg_query($cn, "SELECT users_two,users.username,status FROM friends inner join users ON users_one = users_id  WHERE users_two = $id AND status = 'waiting'");
$result =array();
while ($row = pg_fetch_assoc($query))
{
    $user =array(
        "users_two"=>$row['users_two'],
        "username"=>$row['username'],
        "status"=>$row['status']
    );
    array_push($result,$user);
}

echo json_encode($result);
?>