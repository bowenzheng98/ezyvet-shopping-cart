<?php

include 'Cart.php';

session_start();

if (empty($_SESSION['cart'])) {
    $_SESSION['cart'] = new Cart();
}

// ######## please do not alter the following code ########
$products = [
 [ "name" => "Sledgehammer", "price" => 125.75 ],
 [ "name" => "Axe", "price" => 190.50 ],
 [ "name" => "Bandsaw", "price" => 562.131 ],
 [ "name" => "Chisel", "price" => 12.9 ],
 [ "name" => "Hacksaw", "price" => 18.45 ],
];
// ########################################################

function formatPrice(float $price) {
   return number_format($price, 2, '.', '');
}

echo '<div>Product List</div>';
foreach ($products as $product) {
    echo '<div>'.
        '<div style="display: inline-block; padding: 5px">'.$product['name'].'</div>'.
        '<div style="display: inline-block; padding: 5px">'.formatPrice($product['price']).'</div>'.
        '<a href="add-to-cart.php?product='.$product['name'].'&price='.$product['price'].'">Add to cart</a>'.
        '</div>';
}
?>
<div style="padding-top: 10px">Shopping Cart</div>
<?php

$cartItems = array_values($_SESSION['cart']->getProducts());

$total = 0;

foreach ($cartItems as $item) {

    $itemTotal = $item->getPrice()*$item->getQuantity();
    echo '<div>'.
        '<div style="display: inline-block; padding: 5px">'.$item->getProductName().'</div>'.
        '<div style="display: inline-block; padding: 5px">'.formatPrice($item->getPrice()).'</div>'.
        '<div style="display: inline-block; padding: 5px">'.$item->getQuantity().'</div>'.
        '<div style="display: inline-block; padding: 5px">'.formatPrice($itemTotal).'</div>'.
        '<a href="remove-from-cart.php?product='.$item->getProductName().'">Remove</a>'.
        '</div>';

    $total += $itemTotal;
}
echo '<div> Total: '.formatPrice($total).'</div>';
?>




