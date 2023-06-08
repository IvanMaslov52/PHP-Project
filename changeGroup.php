<?php
session_start();
require "connect.php";
$id = $_SESSION['user']['id'];
$group = $_POST['groupId'];
$query  = pg_query($cn, "select party_id,users_party.users_id,name,description,status, role from users_party inner join party using (party_id) where users_party.users_id = $id and users_party.party_id = $group;");


$name = null;
$description = null;
$status = null;
$role  = null;



$result =array();
while ($row = pg_fetch_assoc($query))
{
    $name = $row['name'];
    $description = $row['description'];
    $status = $row['status'];
    $role = $row['role'];
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>ChangeGroup</title>
    <link type="text/css" rel="stylesheet" href="css/group.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.11.1/jquery.validate.js"></script>
    <script src="js/changeGroup.js"></script>
    <link rel="stylesheet" href="css/authorize.css" type="text/css">
</head>
<body class="bg-light">
<form  action="groupInside.php" method='POST' class="p-2">
    <input type='hidden' name='group'  id='group' value='<?php echo $group ?> '>
    <button type="submit" class="imgButton"><img class="icon" src="image/exit.png"></button>

</form>
<div class="container">
<h1>Изменение группы</h1>
<div class=" boxshadow mt-4 p-4 m-4 bg-white rounded-4">
    <div class="form-group p-1">
    </div>
    <form id="changeGroup" action="updateGroup.php" method="post">

        <div class="form-group p-1">
            <input type="text" class="form-control" name="description" id="description" value="<?php echo $description ?>">
            <span id="spanDescription"></span>
        </div>
        <div class="form-group p-1">
            <input type="text" class="form-control" name="status" id="status" value="<?php echo $status ?>">
            <span id="spanStatus"></span>
        </div>
        <input type="hidden" class="form-control" name="groupId" id="groupId" value="<?php echo $group ?>" >


            <button type="submit" class="submitButton">Изменить</button>

    </form>


    <p>
        <?php
        if(isset($_SESSION['inform']))
        {
            echo '<p>'.$_SESSION['inform'].'</p>';
        }
        unset($_SESSION['inform']);
        ?>
    </p>
</div>
</div>
</body>
</html>