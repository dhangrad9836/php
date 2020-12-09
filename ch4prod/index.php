<?php
require_once('database.php');

//Get categoryID
if(!isset($category_id)){
    $category_id = filter_input(INPUT_GET, 'category_id',
    FILTER_VALIDATE_INT);
}
$category_id = filter_input(INPUT_GET, 'category_id',
                            FILTER_VALIDATE_INT);
//Set the category ID to 1 as it will be the first run
//and no one has clicked on a category_id yet
if($category_id == NULL || $category_id == FALSE){
    $category_id = 1;
}

//Get the name for the selected category
$queryCategory = 'SELECT * FROM categories
                WHERE categoryID = :category_id';
$statement1 = $db->prepare($queryCategory);
$statement1->bindValue(':category_id', $category_id);
$statement1->execute();
$category = $statement1->fetch();
$category_name = $category['categoryName'];
$statement1->closeCursor();

//Get all categories and store in $categories variable
$queryAllCategories = 'SELECT * FROM categories
                    ORDER BY categoryID';
$statement2 = $db->prepare($queryAllCategories);
//note that we are not using prepared statement b/c we
//are not getting any selected names by all categories
//so we just skip and execute it
$statement2->execute();
$categories = $statement2->fetchAll();
$statement2->closeCursor();

//Get products for selected category and store in $products 
$queryProducts = 'SELECT * FROM products
                WHERE categoryID = :category_id
                ORDER BY productID';
$statement3 = $db->prepare($queryProducts);
$statement3->bindvalue(':category_id', $category_id);
$statement3->execute();
$products = $statement3->fetchAll();
$statement3->closeCursor();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Guitar Shop</title>
    <link rel="stylesheet" href="main.css" type="text/css">
</head>
<body>
    <main>
        <h1>Product List</h1>
        <aside>
            <!-- display a list of categories -->
            <h2>Categories</h2>
            <nav>
                <ul>
                    <?php foreach ($categories as $category) : ?>
                    <li>
                        <a href="?category_id=<?php echo $category['categoryID']; ?>">
                            <?php echo $category['categoryName']; ?>
                        </a>
                    </li>
                    <?php endforeach; ?>
                </ul>
            </nav>
        </aside>

       <section>
           <!-- display a table of products -->
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

                    <!-- this is the form with delete_product.php -->
                    <td><form action="delete_product.php" method="post">

                    <input type="hidden" name="product_id"
                    value="<?php echo $product['productID']; ?>">

                    <input type="hidden" name="category_id"
                    value="<?php echo $product['categoryID']; ?>">

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