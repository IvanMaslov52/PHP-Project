<?php
session_start();
$id = filter_var(trim($_POST['id']), FILTER_SANITIZE_NUMBER_INT);
$name = filter_var(trim($_POST['name']), FILTER_SANITIZE_STRING);
$description = filter_var(trim($_POST['description']), FILTER_SANITIZE_STRING);
require "connect.php";

$query = "INSERT INTO party (users_id,name,description,status) VALUES ($id,'$name','$description','Created')";
$result = pg_query($cn, $query);
$party_id = "SELECT party_id from party where name = '$name'";
$party = pg_query($cn, $party_id);
$index = 0;
while ($row = pg_fetch_object($party))
{
    $index = $row->party_id;
}
pg_query($cn, "INSERT INTO users_party (party_id,users_id,position,role) VALUES ($index,$id ,'active','lead')");
header('Location: main.php ');
?>
