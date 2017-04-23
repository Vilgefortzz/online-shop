<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    public $products = array();
    public $totalQuantity = 0;
    public $totalPrice = 0;

    /**
     * Cart constructor.
     */
    public function __construct($oldCart)
    {
        if ($oldCart){
            $this->products = $oldCart->products;
            $this->totalQuantity = $oldCart->totalQuantity;
            $this->totalPrice = $oldCart->totalPrice;
        }
    }

    public function addProduct($product){

        $storedProduct = ['id' => 0, 'quantity' => 0, 'price' => $product->price, 'product' => $product];

        /**
         * Only one user can add one product to cart. Later he will decide how many items choose
         */
        if ($this->products){

            if (!array_key_exists($product->id, $this->products)){
                $storedProduct['id'] = $product->id;
                $storedProduct['quantity']++;
                $storedProduct['price'] = $product->price * $storedProduct['quantity'];
                $this->products[$product->id] = $storedProduct;
                $this->totalQuantity++;
                $this->totalPrice += $product->price;
            }
        }
        else{

            /**
             * Add first product to cart
             */
            $storedProduct['id'] = $product->id;
            $storedProduct['quantity']++;
            $storedProduct['price'] = $product->price * $storedProduct['quantity'];
            $this->products[$product->id] = $storedProduct;
            $this->totalQuantity++;
            $this->totalPrice += $product->price;
        }
    }

    public function deleteProduct($product){

        if ($this->products){

            if (count($this->products) == 1){
                if ($product->id == array_first($this->products)['id']){
                    unset($this->products[$product->id]);
                    $this->totalQuantity--;
                    $this->totalPrice -= $product->price;
                }
            }
            else{
                if (array_key_exists($product->id, $this->products)){
                    unset($this->products[$product->id]);
                    $this->totalQuantity--;
                    $this->totalPrice -= $product->price;
                }
            }
        }
    }

    public function setProductsQuantity($products_id, $newQuantity){

        foreach ($products_id as $product_id){
            if (array_key_exists($product_id, $this->products)){
                $this->products[$product_id]['quantity'] = $newQuantity;
            }
        }
    }
}
