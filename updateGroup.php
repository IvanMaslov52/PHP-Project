<?php
session_start();
require "connect.php";
$group = $_POST['groupId'];

$status = filter_var(trim($_POST['status']), FILTER_SANITIZE_STRING);
$description = filter_var(trim($_POST['description']), FILTER_SANITIZE_STRING);

pg_query($cn, "UPDATE party SET status ='$status' , description = '$description' WHERE party_id = $group");

header('Location: group.php ');
?>
