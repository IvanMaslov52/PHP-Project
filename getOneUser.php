<?php
session_start();
$id = $_SESSION['user']['id'];
require "connect.php";


$group =$_POST['group'];
$userId = ($_POST['id']);

$query = pg_query($cn, "select users_id,username,role,position from users_party inner join users using(users_id) where users_id=$userId and party_id =$group");


$result = array();
while ($row = pg_fetch_assoc($query)) {

        $part = array(
            "username"=>$row['username'],
            "users_id"=>$row['users_id'],
            "role"=>$row['role'],
            "position"=>$row['position']);
        array_push($result,$part);
}
echo json_encode($result);

?>
