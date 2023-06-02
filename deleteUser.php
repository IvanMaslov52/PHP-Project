<?php
session_start();
$id = $_SESSION['user']['id'];
require "connect.php";


$group =$_POST['group'];
$userId = $_POST['userId'];

$query = pg_query($cn, "delete from users_party  where users_id=$userId and party_id =$group");



echo json_encode($userId);

?>