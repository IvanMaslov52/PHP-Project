<?php
session_start();
$id = $_SESSION['user']['id'];
$index = $_SESSION['user']['senderId'];
require "connect.php";

$query = "select sender,receiver,message from chat where (sender = $id and receiver = $index) or (sender = $index and receiver = $id)";
$queryResult = pg_query($cn, $query);
$result = array();
while ($row = pg_fetch_assoc($queryResult)) {
    $message =array(
        "sender"=>$row['sender'],
        "receiver"=>$row['receiver'],
        "message"=>$row['message']
    );
    array_push($result,$message);
}
echo json_encode($result);
?>