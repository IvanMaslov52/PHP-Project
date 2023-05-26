<?php
session_start();
$id = $_SESSION['user']['id'];
$index = $_SESSION['user']['senderId'];
$text = filter_var(trim($_POST['text']), FILTER_SANITIZE_STRING);
require "connect.php";

pg_query($cn,"INSERT INTO chat (sender,receiver, message) VALUES ($id,$index, '$text')");
?>