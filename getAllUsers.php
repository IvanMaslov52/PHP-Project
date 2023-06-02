<?php
session_start();
$id = $_SESSION['user']['id'];
require "connect.php";

$query = pg_query($cn, "select users_id,username from users");
// на строке выше вместо party_id = 1 вставить номер нынешней группы
$result = array();
// В цикле проходимся по ассоциативному массиву и заносим его в обычные, чтобы отправить на "фронт":
while ($row = pg_fetch_assoc($query)) {
    if($row['username'] != $_SESSION['user']['username'])
    {
    $part = array(
        "id"=>$row['users_id'],
        "username"=>$row['username']
    );
    array_push($result,$part);
    }
}
echo json_encode($result);

?>