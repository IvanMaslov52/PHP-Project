<?php
session_start();
require "connect.php";

$referal =  filter_var(trim($_POST['value']), FILTER_SANITIZE_STRING);


$db_referal = pg_query($cn,"SELECT * from users WHERE username LIKE '%$referal%'" );
$result = array();
while ($row = pg_fetch_assoc($db_referal)) {
    if($_SESSION['user']['username']!= $row['username']) {
        echo "\n<li id='" . $row["users_id"] . "'>" . $row["username"] . "</li>"; //$row["name"] - имя поля таблицы
    }

}


?>