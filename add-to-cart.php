<?php

include 'Cart.php';

session_start();

if (empty($_SESSION['cart'])) {
    $_SESSION['cart'] = new Cart();
}

$_SESSION['cart']->addProductToCart($_GET['product'],  $_GET['price']);

echo '<div>Added '.$_GET['product'].' to the cart</div>';

?>

<a href="shopping-cart.php">Return to Product List/Shopping Cart</a>