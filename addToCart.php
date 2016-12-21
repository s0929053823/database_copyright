<?php
session_start();
$value = isset($_GET['value']) ? $_GET['value'] : "";
$price = isset($_GET['price']) ? $_GET['price'] : "";


/*
 * check if the 'cart' session array was created
 * if it is NOT, create the 'cart' session array
 */

// check if the item is in the array, if it is, do not add
// http://tw1.php.net/manual/zh/function.array-key-exists.php
if(array_key_exists($value, $_SESSION['cart_items'])){
    // redirect to product list and tell the user it was added to cart
    header("Location: solution.php?action=exists&value=".$value);
}

// else, add the item to the array
else{
    $_SESSION['cart_items'][$value] = $price;
    // redirect to product list and tell the user it was added to cart
    header("Location: solution.php?action=added&value=".$value);
}
?>