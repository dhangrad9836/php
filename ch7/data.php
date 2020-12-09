<?php
$user_name = filter_input(INPUT_GET, 'user_name');
$passord = filter_input(INPUT_GET, 'password');
$action = filter_input(INPUT_GET, 'action');


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <input type="text" name="user_name" value="rharris">
    <input type="password" name="password">
    <input type="hidden" name="action" value="login">
</body>
</html>