<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    public $products = null;
    public $totalprice = 0;
    public $qty = 0;

    public function __construct($cart)
    {
        if($cart){
            $this->products = $cart->products;
            $this->totalprice = $cart->price;
            $this->qty = $cart->qty;
        }
    }

    public function addCart($product, $id){
        $newProduct = ['qty' => 0, 'price' => $product->price, 'productInfo' => $product];
        if($this->products){
            if(array_key_exists($id, $this->products)){
                $newProduct = $this->products[$id];
            }
        }
        $newProduct['qty']++;
        $newProduct['price'] = $newProduct['qty'] * $product->price;
        $this->products[$id] = $newProduct;
        $this->totalprice += $product->price;
        $this->qty++;
    }
}
