<?php

include 'Cart.php';

session_start();

if (empty($_SESSION['cart'])) {
    $_SESSION['cart'] = new Cart();
}

$_SESSION['cart']->removeProductToCart($_GET['product']);

echo '<div>Removed '.$_GET['product'].' from the cart</div>';

?>

<a href="shopping-cart.php">Return to Product List/Shopping Cart</a>