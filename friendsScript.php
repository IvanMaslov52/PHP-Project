<?php
session_start();
$id = $_SESSION['user']['id'];
$username = filter_var(trim($_POST['who']), FILTER_SANITIZE_STRING);
require "connect.php";

$query = pg_query($cn, "SELECT users_id from users  where username = '$username'");
$row = pg_fetch_object($query);
$result = pg_query($cn,"SELECT * FROM friends where (users_one = $id and users_two = $row->users_id and(status = 'accepted' or status = 'waiting')) OR (users_two = $id and users_one = $row->users_id and(status = 'accepted' or status = 'waiting'))");
if($row->users_id != $id){
    if(pg_num_rows($result) == 0) {
        pg_query($cn, "INSERT INTO friends (users_one,users_two,status) VALUES ($id,$row->users_id,'waiting')");
    }

}
header('Location: main.php ');
?>