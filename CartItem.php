<?php

class CartItem {

    private string $name;
    private float $price;
    private int $quantity;

    public function __construct(string $name, float $price) {
        $this->name = $name;
        $this->price = $price;
        $this->quantity = 1;
    }

    public function getProductName() {
        return $this->name;
    }

    public function getPrice() {
        return $this->price;
    }

    public function getQuantity() {
        return $this->quantity;
    }

    public function incrementQuantity() {
        $this->quantity += 1;
    }

}

?>