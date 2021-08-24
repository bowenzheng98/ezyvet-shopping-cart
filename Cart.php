<?php 

include 'CartItem.php';

class Cart {
    private array $products =  [];

    public function addProductToCart(string $product, float $price) {
        $cartItem = new CartItem($product, $price);
        if (isset($this->products[$product])) {
            $cartItem = $this->products[$product];
            $cartItem->incrementQuantity();
            $this->products[$product] = $cartItem;
        } else {
            $this->products[$product] = $cartItem;
        }
    }

    public function removeProductFromCart(string $product) {
        if (isset($this->products[$product])) {
            unset($this->products[$product]);
        }
    }

    public function getProducts() {
        return $this->products;
    }
}

?>