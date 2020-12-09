<?php
//to access the dropdown list
$card_type = filter_input(INPUT_POST, 'card_type');

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <select name="card_type" id="">
        <option value="visa">Visa</option>
        <option value="mastercard">MasterCard</option>
        <option value="discover">Discover</option>
    </select>
</body>
</html>