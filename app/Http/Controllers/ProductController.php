<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Product;
use App\Helpers\General;

class ProductController extends Controller
{

    public function products($limit=null){
        if ($limit){
            return Product::limit($limit)->get();
        }
        return Product::all();
    }

    public function addProduct(Request $request){
        $this->validate($request, [
            'title' => 'required',
            'description' => 'nullable',
            'image' => 'required|file|mimes:jpeg,png,jpg|max:5140',
            'status' => 'nullable'
        ]);

        $slug = General::convertToSlug('-',request('title'));
        $image = $request->file('image');
        $filename = $slug;
        $image_link = General::uploadFile('products', $filename, $image);
        $product = Product::create([
            'title' => request('title'), 'slug' => $slug,
            'description' => request('description'),
            'image_link' => $image_link, 'status' => request('status')
        ]);

        if(!$product){
            return response()->json([
                'status' => false,
                'message' => 'Unable to process request ,Try again'
            ], 200);
        }

        return response()->json([
            'status' => true,
            'message' => 'product added',
            'data' => $product
        ],201);


    }
}
