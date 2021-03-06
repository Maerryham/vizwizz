<?php

namespace App;
//use Illuminate\Database\Eloquent\Relations\HasOne;
use Storage;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'title', 'slug', 'image', 'status', 'description',
        'price', 'category_id', 'brand_id'
    ];

//    public function getImageLinkAttribute($value)
//    {
//        return Storage::url($value);
//    }

    public function category()
    {
        return $this->belongsTo('App\Category');
    }
    public function brand()
    {
        return $this->belongsTo('App\Brand');
    }

    public static function product_counter($brand_id){
        $product = Product::where('brand_id', $brand_id)->get();
        $count = count($product);
//        dd($count);
        return $count;
    }

    public static function category_product_counter($category_id){
        $product = Product::where('category_id', $category_id)->get();
        $count = count($product);
//        dd($count);
        return $count;
    }
}
