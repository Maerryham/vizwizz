<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable =[
        'name', 'number', 'email', 'message', 'products'
    ];

    public function setProductsAttribute($value){
        $this->attributes['products'] = json_encode($value);
    }
}
