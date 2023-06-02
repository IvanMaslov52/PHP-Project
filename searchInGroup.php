<?php


session_start();
require "connect.php";

$referal =  filter_var(trim($_POST['value']), FILTER_SANITIZE_STRING);

$group =$_POST['group'];
$db_referal = pg_query($cn,"select  * from users full outer join users_party using (users_id) where (party_id != $group or party_id is null)  and username  like '%$referal%'" );

$result = array();
while ($row = pg_fetch_assoc($db_referal)) {
    if($_SESSION['user']['username']!= $row['username']) {
        echo "\n<li id='" . $row["users_id"] . "'>" . $row["username"] . "</li>"; //$row["name"] - имя поля таблицы
    }
}

?>