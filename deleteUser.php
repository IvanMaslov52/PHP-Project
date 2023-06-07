<?php
session_start();
$id = $_SESSION['user']['id'];
require "connect.php";


$group =$_POST['group'];
$userId = $_POST['userId'];

$somequery = pg_query($cn, "SELECT username,users_id  from users_party inner join users using(users_id) where users_id=$userId and party_id =$group");
$user= array();
while ($row = pg_fetch_assoc($somequery))
{
    $part = array(
        "id"=>$row['users_id'],
        "username"=>$row['username']);
    array_push($user,$part);
}
$query = pg_query($cn, "delete from users_party  where users_id=$userId and party_id =$group");

echo json_encode($user);
?>