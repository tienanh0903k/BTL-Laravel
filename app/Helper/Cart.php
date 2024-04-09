<?php

namespace App\Helper;

class Cart {
    public $itemCart = [];
    public $quantity = 0;
    public $totalPrice = 0;

    public function __construct() {
        $this->itemCart = session('cart') ?? [];
    }

    // Thêm sản phẩm vào giỏ hàng
    public function addToCart($product, $qty = 1) {
        $itemCart = session('cart') ?? [];

        if (array_key_exists($product->id, $itemCart)) {
            $itemCart[$product->id]['quantity'] += $qty;
        } else {
            $itemCart[$product->id] = [
                'id' => $product->id,
                'name' => $product->title,
                'image' => $product->thumbnail,
                'price' => $product->price,
                'quantity' => $qty
            ];
        }
        session()->put('cart', $itemCart);
        $this->itemCart = $itemCart;
    }




    public function listCart() {
        //dd($this->itemCart);
        return $this->itemCart;
    }

    public function countItems() {
        $totalItems = 0;
        foreach ($this->itemCart as $item) {
            $totalItems += $item['quantity'];
        }
        return $totalItems;
    }


    public function sumPrice() {
        $this->totalPrice = 0;
        foreach($this->itemCart as $item) {
            $this->totalPrice += $item['price'] * $item['quantity'];
        }
        return $this->totalPrice;
    }
}
