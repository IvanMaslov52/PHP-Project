<?php
session_start();
if(isset($_SESSION['user']))
{

}
else
{
    header('Location: signup.php ');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>AddGroup</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.11.1/jquery.validate.js"></script>
    <script src="js/addGroup.js"></script>
    <link rel="stylesheet" href="css/styles.css" type="text/css">
</head>
<body class="container bg-light">

<h1>Создание группы</h1>
<div class=" addGroupDiv container mt-4 p-4 m-4 bg-white rounded-4">
    <div class="form-group p-1">
    </div>
    <form id="addGroup" action="addingGroup.php" method="post">
        <div>
            <input type="hidden" value="<?= $_SESSION['user']['id'] ?>" name="id" id="id">
        </div>
        <div class="form-group p-1">
            <input type="text" class="form-control" name="name" id="name" placeholder="Введите название группы">
            <span id="spanName"></span>
        </div>
        <div class="form-group p-1">
            <input type="text" class="form-control" name="description" id="description" placeholder="Введите краткое описание группы">
            <span id="spanDescription"></span>
        </div>
        <div class="form-group p-1">
        <button type="submit" class="submitButton">Создать</button>
        </div>
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
</body>
</html>