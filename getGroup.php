<?php
session_start();
$id = $_SESSION['user']['id'];
require "connect.php";

$query = "SELECT party.party_id,name,description,party.status FROM party inner join users_party using(users_id) where users_id = $id group by party.party_id;";
$queryResult = pg_query($cn, $query);
$result = array();
while ($row = pg_fetch_assoc($queryResult)) {
    $party =array(
        "id"=>$row['party_id'],
        "name"=>$row['name'],
        "description"=>$row['description'],
        "status"=>$row['status']
    );
    array_push($result,$party);
}
echo json_encode($result);
?>
