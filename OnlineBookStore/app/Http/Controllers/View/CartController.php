<?php
/**
 * Created by PhpStorm.
 * User: majiwei
 * Date: 7/09/2017
 * Time: 12:18 PM
 */

namespace App\Http\Controllers\View;

use App\Entity\Product;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Entity\CartItem;

class CartController extends Controller{
    public function toCart(Request $request) {
        $bk_cart = $request->cookie('bk_cart');
        $bk_cart_arr = ($bk_cart!=null ? explode(',', $bk_cart) : array());
        $cart_items = array();

        foreach ($bk_cart_arr as $key => $value) { //&为添加引用即可改变数组内的值
            $index = strpos($value, ':');

            $cart_item = new CartItem();
            $cart_item->id = $key;
            $cart_item->product_id = substr($value, 0, $index);
            $cart_item->count = (int)substr($value, $index+1);
            $cart_item->product = Product::find($cart_item->product_id);
            if($cart_item->product != null) {
                array_push($cart_items, $cart_item);
            }
        }

        return view('cart')->with('cart_items', $cart_items);
    }
}





































