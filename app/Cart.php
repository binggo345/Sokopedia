<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $fillable = [
        'users_id', 'products_id', 'quantity'
    ];

    public function items(){
        return $this->hasMany(Product::class);
    }
}
