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
}
