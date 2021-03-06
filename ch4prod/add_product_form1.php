<?php
require('database.php');

//get all categories from database and store in categories variable
$query = 'SELECT * 
        FROM categories
        ORDER BY categoryID';
$statement = $db->prepare($query);
$statement->execute();
//store in categories variable by fetchALl()
$categories = $statement->fetchAll();
$statement->closeCursor();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="main.css" type="text/css">
</head>
<body>
    <header><h1>Product Manager</h1></header>
    <main>
        <h1>Add Product</h1>
        <form action="add_product.php" method="post"
        id="add_product_form">

        <label>Category:</label>
        <select name="category_id">
        <?php foreach ($categories as $category) : ?>
            <option value="<?php echo $category['categoryID']; ?>">
            <?php echo $category['categoryName']; ?>
            </option>
        <?php endforeach; ?>
        </select><br>

        <label>Code:</label>
        <input type="text" name"code"><br>

        <label>Name:</label>
        <input type="text" name"name"><br>

        <label>List Price:</label>
        <input type="text" name"price"><br>

        <label>&nbsp;</label>
        <input type="submit" value="Add Product"><br>
        </form>
        
        <p><a href="index.php">View Product</a></p>
    </main>

    <footer>
        <p>&copy; <?php echo date("Y"); ?> My Guitar Shop, Inc.</p>
    </footer>
</body>
</html>




