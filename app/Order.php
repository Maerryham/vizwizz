<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable =[
        'user_id', 'first_name', 'last_name','address', 'phone', 'email', 'products','subtotal','delivery_fee','total', 'reference','additional_information'
    ];

    public function setProductsAttribute($value){
        $this->attributes['products'] = json_encode($value);
    }
}
