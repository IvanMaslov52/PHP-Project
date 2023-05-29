<?php
session_start();
$id = $_SESSION['user']['id'];
require "connect.php";

$query = "select  party_id,party.name,party.status,party.description,role,users_party.position from users_party inner join party using (party_id) where users_party.users_id  = $id";
$queryResult = pg_query($cn, $query);
$result = array();
while ($row = pg_fetch_assoc($queryResult)) {
    $party =array(
        "id"=>$row['party_id'],
        "name"=>$row['name'],
        "description"=>$row['description'],
        "status"=>$row['status'],
        "role"=>$row['role'],
        "position"=>$row['position']
    );
    array_push($result,$party);
}
echo json_encode($result);
?>
