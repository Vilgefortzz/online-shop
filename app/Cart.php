<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    public $products = array();

    /*
     * Total quantity of products existed in cart
     */
    public $numberOfProducts = 0;

    /*
     * Total amount of money for all products and items
     */
    public $totalPrice = 0;

    /**
     * Cart constructor.
     */
    public function __construct($oldCart)
    {
        if ($oldCart){
            $this->products = $oldCart->products;
            $this->numberOfProducts = $oldCart->numberOfProducts;
            $this->totalPrice = $oldCart->totalPrice;
        }
    }

    public function addProduct(Product $product){

        $storedProduct = ['id' => 0, 'quantity' => 1,
            'priceForOneItem' => $product->price, 'priceForAllItems' => $product->price,
            'onStock' => $product->quantity, 'product' => $product];

        /**
         * Only one user can add one product to cart. Later he will decide how many items choose
         */
        if ($this->products){

            if (!array_key_exists($product->id, $this->products)){

                $storedProduct['id'] = $product->id;
                $storedProduct['priceForAllItems'] = $product->price * $storedProduct['quantity'];
                $this->products[$product->id] = $storedProduct;
                $this->numberOfProducts++;
                $this->totalPrice += $product->price;
            }
        }
        else{

            /**
             * Add first product to cart
             */
            $storedProduct['id'] = $product->id;
            $storedProduct['priceForAllItems'] = $product->price * $storedProduct['quantity'];
            $this->products[$product->id] = $storedProduct;
            $this->numberOfProducts++;
            $this->totalPrice += $product->price;
        }
    }

    public function deleteProduct(Product $product){

        if ($this->products){

            if (count($this->products) == 1){
                if ($product->id == array_first($this->products)['id']){
                    $this->numberOfProducts--;
                    $this->totalPrice -= $this->products[$product->id]['priceForAllItems'];
                    unset($this->products[$product->id]);
                }
            }
            else{
                if (array_key_exists($product->id, $this->products)){
                    $this->numberOfProducts--;
                    $this->totalPrice -= $this->products[$product->id]['priceForAllItems'];
                    unset($this->products[$product->id]);
                }
            }
        }

        return $this->totalPrice;
    }

    public function deleteAllProducts(){

        if ($this->products){
            unset($this->products);
            $this->numberOfProducts = 0;
            $this->totalPrice = 0;
        }
    }

    public function setQuantity(Product $product, int $newQuantityValue){

        if ($this->products){

            if (count($this->products) == 1){
                if ($product->id == array_first($this->products)['id']){
                    $this->products[$product->id]['quantity'] = $newQuantityValue;
                    $this->products[$product->id]['priceForAllItems'] = $product->price * $newQuantityValue;
                    $this->totalPrice = $this->products[$product->id]['priceForAllItems'];
                }
            }
            else{
                if (array_key_exists($product->id, $this->products)){
                    $this->products[$product->id]['quantity'] = $newQuantityValue;
                    $this->products[$product->id]['priceForAllItems'] = $product->price * $newQuantityValue;

                    $this->totalPrice = 0;

                    foreach ($this->products as $product){
                        $this->totalPrice += $product['priceForAllItems'];
                    }
                }
            }
        }

        return $this->totalPrice;
    }
}
