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
<html>
<head>
    <title>Друзья</title>
    <link rel="stylesheet" href="css/friends.css" type="text/css">
    <meta charset="utf-8" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="js/search.js"></script>
</head>
<body class="bodyContainer">
<h1><?= $_SESSION['user']['username'] ?></h1>

<div class="block">
<div class="center">
    <button class='navButton p-1' id="requestFriendsButtton">Заявки в друзья</button>
    <button class='navButton p-1' id="friendsButton">Все друзья</button>
    <button class='navButton p-1' id="addFriendsButton">Добавить друга</button>
</div>

</div>
<div class="profile-description">
    <div class="contact-info">
        <div id="mainDiv">
            <form action='friendsScript.php' method='post'  style="display: none" class='p-4' id="friendsForm">
                      <label for='username'>Добавить друга:</label>
                       <input id='who' ENGINE='text' name='who' placeholder='Живой поиск'  class='who'  autocomplete='off'>
                       <ul class='search_result'></ul>
                       <button type='submit'>Добавить</button>
                    </form>
        </div>
    </div>
</div>

</body>
</html>
