<?php

namespace App\Http\Controllers;
use App\Product;

use Illuminate\Http\Request;

class CartController extends Controller
{
    public function addToCart(Request $request){
        $product_id = request('product_id');
//      $product_id = 1;
        $product = Product::where('id', '=', $product_id)->first();
        $added_to_cart = false;
        if ($product){

            if(session()->has('cart')){
                if(!array_key_exists($product_id, session()->get('cart'))){
                    $cart = (session()->get('cart'));
                    $cart[$product_id] = [
                        'image_link' => $product->image_link,
                        'price' => $product->price,
                        'title' => $product->title,
                        'qty' => 1,
                        'total' => $product->price * 1,
                        'id' => $product->id
                    ];

                    session(['cart' => $cart]);
                    $added_to_cart = true;

                }
            }
            else{
                session(['cart' => [
                    $product_id => [
                        'image_link' => $product->image_link,

                        'price' => $product->price,
                        'title' => $product->title,
                        'qty' => 1,
                        'total' => $product->price * 1,
                        'id' => $product->id
                    ]
                ]
                ]);

                $added_to_cart = true;
            }

            if (!$added_to_cart){
                $cart = (session()->get('cart'));
                $counter = count($cart);
                return response()->json([
                    'status' => false,
                    'count' => $counter,
                    'cart' => $cart,
                    'message' => "{$product->title} is already in your cart <a href='shopping-cart' class='btn btn-info'>View Cart</a>"
                ], 200);
            }
            $cart = (session()->get('cart'));
            $counter = count($cart);
            return response()->json(['status' => true, 'count' => $counter, 'cart' => $cart, 'message' => "{$product->title} has been added to cart"]);
        }

        $cart = (session()->get('cart'));
        $counter = count($cart);
        return response()->json(['status' => false, 'count' => $counter, 'cart' => $cart, 'message' => 'item does not exist'],404);
    }

    public function removeItem($product_id){
        session()->forget("cart.{$product_id}");
        return redirect()->route('shopping-cart');
    }
    public function updateAllCart(Request $request){
        $product_id = request('product_id');
        $newqty = request('newqty');
//        $product_id = 2;
//        $newqty = 8;

        $items = session()->get('cart');

        foreach ($items as &$item) {
            if ($item['id'] == $product_id) {
                $item['qty'] = $newqty;
                $item['total'] = $item['price'] * $newqty;
            }
        }

        session()->put('cart', $items);
        $cart = (session()->get('cart'));
        return response()->json(['status' => true,  'message' => "Your Cart has been updated",'cart' => $cart]);
    }

}
