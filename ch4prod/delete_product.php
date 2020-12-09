<?php
require_once('database.php');

//get the id for product and category from POST array using filter_input
$product_id = filter_input(INPUT_POST, 'product_id', FILTER_VALIDATE_INT);
$category_id = filter_input(INPUT_POST, 'category_id', FILTER_VALIDATE_INT);

//Delete the product from the database
//first check to see if the values returned from the 
//filter_input didn't fail meaning false
if($product_id != false && $category_id != false){
    $query = 'DELETE FROM products
            WHERE productID = :product_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':product_id', $product_id);
    $success = $statement->execute();
    $statement->closeCursor();
}

//Display back the Product List page
include('index.php');