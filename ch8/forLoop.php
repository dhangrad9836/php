<?php



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <label for="">Interest Rate</label>
    <select name="rate">
    <?php for ($v = 5; $v <= 12; $v++) : ?>
    <option value="<?php echo $v; ?>">
    <?php echo $v; ?>
    </option>
    <?php endfor; ?>
</body>
</html>