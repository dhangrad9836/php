<?php
require_once('database.php');

//Get category ID
if(!isset($category_id)){ 
$category_id = filter_input(INPUT_GET, 'category_id',
                            FILTER_VALIDATE_INT);

if($category_id == NULL || $category_id == FALSE) {
    $category_id = 1;
    }
}

//Get name for selected category using prepared statement
//using named parameters :category_id
$queryCategory = 'SELECT * FROM  categories
                WHERE categoryID = :category_id';
$statement1 = $db->prepare($queryCategory);
$statement1->bindValue(':category_id', $category_id);
$statement1->execute();
//fetch() returns an array so $category is an array
$category = $statement1->fetch(); 
$category_name = $category['categoryName'];
$statement1->closeCursor();

//get all categories
$queryAllCategories = 'SELECT * FROM categories 
                      ORDER BY categoryID';

$statement2 = $db->prepare($queryAllCategories);
$statement2->execute();
$categories = $statement2->fetchAll();
$statement2->closeCursor();


//Get products for selected category
$queryProducts = 'SELECT * FROM products
                  WHERE categoryID = :category_id
                  ORDER BY productID';

$statement3 = $db->prepare($queryProducts);
$statement3->bindValue(':category_id', $category_id);
$statement3->execute();
$products = $statement3->fetchAll();
$statement3->closeCursor();

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="main.css" />
</head>
<body>
<header>My Guitar Shop</header>
    <main>
    <h1>Product List</h1>
    <aside>
        <!--display a list of categories-->
        <h2>Categories</h2>
        <nav>
            <ul>
                <?php foreach ($categories as $category) : ?>
                    <li>
                        <a href=". ?category_id=<?php echo $category['categoryID']; ?>">
                        <?php echo $category['categoryName']; ?>
                    </a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </nav>
    </aside>
    
    <section>
        <!--display a table of products -->
        <h2><?php echo $category_name; ?></h2>
        <table>
            <tr>
                <th>Code</th>
                <th>Name</th>
                <th class="right">Price</th>
            </tr>
            <?php foreach ($products as $product) : ?>
                <tr>
                    <td><?php echo $product['productCode']; ?></td>
                    <td><?php echo $product['productName']; ?></td>
                    <td class="right"><?php echo $product['listPrice']; ?></td>
                    <td><form action="delete_product.php" method="POST">
                        <input type="hidden" name="product_id" 
                        value="<?php echo $product['product_id']; ?> ">
                        <input type="hidden" name="category_id" 
                        value="<?php echo $product['categoryID']; ?> ">
                        <input type="submit" value="Delete">
                    </form></td>
                </tr>
            <?php endforeach; ?>
        </table>
        <p><a href="add_product_form.php">Add Product</a></p>
    </section>
      </main>
        <footer>
            <p>&copy; <?php echo date("Y"); ?> My Guitar Shop, Inc.</p>
        </footer>







</body>
</html>