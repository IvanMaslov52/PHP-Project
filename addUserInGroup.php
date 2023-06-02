<?php
session_start();
require "connect.php";
$selected_colors = $_POST['groupMembers'];
$group =$_POST['group'];
$result=array();
foreach($selected_colors AS $key=>$values)
{

    $query = pg_query($cn, "select username from users where users_id =$values");
    $username  =null;
    while ($row = pg_fetch_assoc($query)) {
        $username  = $row['username'];
    }
    $part = array(
        "username"=>$username,
        "id"=>$values);
    array_push($result,$part);
    pg_query($cn, "INSERT INTO users_party (party_id,users_id,position,role) VALUES ($group,$values ,'active','none')");
}
echo json_encode($result);
?>