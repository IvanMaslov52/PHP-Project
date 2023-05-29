<?php
session_start();
$id = $_SESSION['user']['id'];
require "connect.php";
$group =$_POST['group'];
//$query = pg_query($cn, "SELECT users.username FROM friends inner join users ON users_one = users_id  WHERE users_two = $id AND status = 'accepted'");
//select username from users inner join users_party using (users_id) where party_id = 2;
$query = pg_query($cn, "select users_id,username,role,position from users_party inner join users using(users_id) where party_id =$group");
// на строке выше вместо party_id = 1 вставить номер нынешней группы
$result = array();
// В цикле проходимся по ассоциативному массиву и заносим его в обычные, чтобы отправить на "фронт":
while ($row = pg_fetch_assoc($query)) {
    $part = array(
        "id"=>$row['users_id'],
        "username"=>$row['username'],
        "role"=>$row['role'],
        "position"=>$row['position']
    );
    array_push($result,$part);
}
echo json_encode($result);
//echo pg_fetch_assoc($query);
?>