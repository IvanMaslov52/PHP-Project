<?php
session_start();
$id = $_SESSION['user']['id'];
require "connect.php";

$query = pg_query($cn, "SELECT users.username FROM friends inner join users ON users_one = users_id  WHERE users_two = $id AND status = 'accepted'");
$result =array();
while ($row = pg_fetch_assoc($query))
{
    $user =array(
        "username"=>$row['username']
    );
    array_push($result,$user);
}
echo json_encode($result);
?>