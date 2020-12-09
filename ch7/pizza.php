<?

$toppings = filter_input(INPUT_POST, 'top',
FILTER_SANITIZE_SPECIAL_CHARS, FILTER_REQUIRE_ARRAY);

// if($toppings !== Null){
//     $top1 = $toppings[0];   //$top1 is pep
//     $top2 = $toppings[1];   //$top2 is msh
//     $top3 = $toppings[2];   //$top3 is olive
// }

//foreach loop to process the array
if($toppings !== Null){
    foreach($toppings as $key => $value){
        echo $key. ' = ' . $value . '<br>';
    }
}   else {
    echo 'No toppings selected.';
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
    <input type="checkbox" name="top[]" value="pep">Pepperoni<br>
    <input type="checkbox" name="top[]" value="msh">Mushrooms<br>
    <input type="checkbox" name="top[]" value="olv">Olives<br>
</body>
</html>