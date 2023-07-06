<?php

use App\Models\Cart;
use App\Models\Product;



 function cartArray(){
    $cart=Cart::all();
    // foreach ($carts as $carts) {
    //     $product_id= $carts->product_id;
    //     $total= $carts->qty*$carts->price;
    //     };
     //     $cart =Cart::all();//('product_id','=',$product_id)->get();
       
        
    return $cart;
}


function tota_price(){
     $cart=Cart::all();
     foreach ($cart as $cart) {
          $totals=$cart->price*$cart->qty;
          return $totals;
     }
     
     
}

?>