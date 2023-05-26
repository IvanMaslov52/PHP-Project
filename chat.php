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
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "https://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Chat - Customer Module</title>
    <link type="text/css" rel="stylesheet" href="css/chat.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="js/chat.js"></script>
</head>
<body class="bodyContainer">
<div class="display" id="senderUsername"><?= $_SESSION['user']['username'] ?></div>
<div class="display" id="senderId"><?= $_SESSION['user']['id'] ?></div>
<div class="display" id="receiverId"><?= $_SESSION['user']['senderId'] ?></div>
<div class="display" id="receiverUsername"><?= $_SESSION['user']['senderUsername'] ?></div>

<div id="wrapper">
    <div id="menu">
        <p class="welcome">Welcome, <b><?= $_SESSION['user']['username'] ?></b></p>
        <p class="logout"><a id="exit" href="friends.php">Exit Chat</a></p>
        <div style="clear:both"></div>
    </div>
    <div id="chatbox"></div>

<div class="rowDiv">
    <input name="usermsg" type="text" id="usermsg" size="63" />
    <button type="button" id="send">Отправить</button>
    </div>
</div>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3/jquery.min.js"></script>
<script type="text/javascript">
    // jQuery Document
    $(document).ready(function(){
    });
</script>
</body>
</html>
