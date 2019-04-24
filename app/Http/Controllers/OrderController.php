<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function placeOrder(Request $request){
        $cart = session()->get('cart');
        $products = [];
        foreach($cart as $item){
            $products[$item['id']] = $item['title'];
        }
        $order = Order::create([
            'name' => request('name'), 'email' => request('email'),
            'number' => request('number'), 'message' => request('message'),
            'products' => $products
        ]);

        if ($order){
            session()->forget('cart');
            return redirect()->back()
                ->with('order_success','Your order has been recieved we will get in touch with you shortly');
        }

        return redirect()->back()->with('order_error', "Unable to place order at this time , try again");

    }
}
