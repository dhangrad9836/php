<?

$card_type = filter_input(INPUT_POST, 'card_type');
if($card_type == NULL) {
    $card_type = 'unknown';
}



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <input type="radio" name="card_type" value="visa" checked> Visa<br>
    <input type="radio" name="card_type" value="mastercard" > MasterCard<br>
    <input type="radio" name="card_type" value="discover" > Discover<br>


</body>
</html>