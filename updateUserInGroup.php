<?php
session_start();
require "connect.php";
$group = $_POST['group'];
$role= $_POST['role'];
$username = $_POST['username'];
$status = $_POST['status'];
$id = $_POST['id'];
$result = array(
    "id"=>$id,
    "username"=>$username,
    "role"=>$role,
    "position"=>$status
);
pg_query($cn, "UPDATE users_party SET role ='$role' , position = '$status' WHERE party_id = $group and users_id = $id");
echo json_encode($result)

?>