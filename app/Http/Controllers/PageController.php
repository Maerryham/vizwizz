<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function  indexPage(){
        $product_contrl = new  ProductController();
        $products = $product_contrl->products(8);
        $cart = session()->get('cart');
        return view('index', ['products' => $products, 'cart' =>$cart]);
    }

    public function servicesPage(){
        return view('services');
    }

    public function productsPage(){
        $product_contrl = new  ProductController();
        $products = $product_contrl->products();
        return view('products', ['products' => $products]);
    }

    public function bookingListPage(){
        $cart = session()->get('cart');
        return view('shopping_cart', ['cart' =>$cart]);
    }

    public function checkout(){
        $cart = session()->get('cart');
        return view('shopping_checkout', ['cart' =>$cart]);
    }
}
